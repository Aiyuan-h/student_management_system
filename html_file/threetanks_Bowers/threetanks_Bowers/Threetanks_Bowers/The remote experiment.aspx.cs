using System;
using System.Collections;
using System.Configuration;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.Configuration;
using System.Xml.Linq;
using System.Text;
using System.Xml;
using System.Data;
using System.Data.Sql;
using System.Data.SqlClient;
using System.Threading;
using System.Net;
using System.Net.Sockets;

namespace Threetanks_Bowers
{

    public partial class The_remote_experiment : System.Web.UI.Page
    {

        DataAccess dataaccess = new DataAccess();
        DataTable ExpTable = new DataTable();
        DataTable NumTable = new DataTable();

        XmlDocument xmldoc = new XmlDocument();
        XmlNode xln;
        XmlElement xmlele;

        private Socket socket;
        private IPAddress _ipAddr = null;
        private Thread threadReceive = null;
         

        public void Page_Load(object sender, EventArgs e)
        {
            string username;
            string tablename;

            ExpTable = dataaccess.SearchData("LoadUser");
            username = ExpTable.Rows[ExpTable.Rows.Count - 1][0].ToString();
            this.user.Text = username;
            //Exp = ExpTable.Rows[ExpTable.Rows.Count - 1][2].ToString();
            //this.Exp.Text = Exp;

            try
            {
                tablename = ExpTable.Rows[ExpTable.Rows.Count - 1][3].ToString();
                NumTable = dataaccess.SearchData(tablename);
            }
            catch { }

            string path = Server.MapPath(Request.ApplicationPath) + "WaterTank.xml";
            xmldoc.Load(path);
            xln = xmldoc.DocumentElement;
            xmlele = (XmlElement)xln.SelectSingleNode("states");



            if (!IsPostBack)
            {
                LoadInit();
                //Using();
                information();
                DisplayLine();
            }
        }

        private void mysocket()
        {
            string hostName = "192.168.1.102";    //远程主机IP 

            int port = Int32.Parse("1259");   //端口

            IPHostEntry ipInfo = Dns.GetHostByName(hostName);         //得到主机信息 

            IPAddress[] ipAddr = ipInfo.AddressList;              //取得 IPAddress[]

            //得到 ip   
            IPAddress ip = ipAddr[0];

            IPEndPoint hostEP = new IPEndPoint(ip, port);      //组合出远程终结点 
            //创建 Socket  实例   
            socket = new Socket(AddressFamily.InterNetwork, SocketType.Stream, ProtocolType.Tcp);
            try
            {

                socket.Connect(hostEP);   //尝试连接，如果连接不成功会调到catch中   

                string sendStr = "Three-tanks-Connect";
                SendToServer(sendStr);

            }
            catch (Exception se)
            {
            }
        }


        private void SendToServer(string strMessage)
        {
            if (socket != null)
            {
                //创建 bytes 字节数组以转换发送串   
                byte[] bytesSendStr = new byte[4];
                //将发送内容字符串转换成字节 byte 数组 
                bytesSendStr = Encoding.ASCII.GetBytes(strMessage);
                try
                {
                    byte[] bytesSendtoServer = new byte[1024];
                    socket.Send(bytesSendStr, bytesSendStr.Length, 0);   //向主机发送请求  



                }
                catch (Exception ce)
                {
                    //MessageBox.Show("发送错误:" + ce.Message, "提示信息"
                    //, MessageBoxButtons.OK, MessageBoxIcon.Information);
                }
            }

        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            mysocket();
            byte[] bytesSendtoServer = new byte[7];
            bytesSendtoServer[0] = 0x42;
            bytesSendtoServer[1] = 0x02;
            SendByteToServer(bytesSendtoServer);
            
            //information();

        }

        private void SendByteToServer(byte[] bytesSendtoServer)
        {
            if (socket != null)
            {

                try
                {
                    socket.Send(bytesSendtoServer, bytesSendtoServer.Length, 0);   //向主机发送请求  
                }
                catch (Exception ce)
                {
                    //MessageBox.Show("发送错误:" + ce.Message, "提示信息"
                    //, MessageBoxButtons.OK, MessageBoxIcon.Information);
                }
            }

        }
        private void LoadInit()
        {
            try
            {
                //加载flash
                string path = Server.MapPath(Request.ApplicationPath) + "Flash\\" + "320200001.swf";
                string scripStr = string.Format("LoadFlash('{0}');", "320200001");
                Page.ClientScript.RegisterStartupScript(this.GetType(), "flash", scripStr, true);

            }
            catch { }
        }

        private void information()
        {
            string high1;
            string flu1;
            string Ball1;
            string Kp;
            string Ki;
            string Kd;

            try
            {
                switch (Convert.ToInt16(NumTable.Rows[0][0]))
                {
                    case 0x11:      //水泵1特性检测
                        xmlele.SetAttribute("PumpLeft", "1");
                        xmlele.SetAttribute("Valve2", "1");
                        xmldoc.Save(Server.MapPath(Request.ApplicationPath) + "WaterTank.xml");

                        high1 = NumTable.Rows[NumTable.Rows.Count - 1][1].ToString();
                        this.high1_value.Text = high1;
                        this.high1.Text = high1;
                        break;

                    case 0x12:      //水泵2特性检测

                        break;

                    case 0x13:      //水箱2加热特性

                        break;

                    case 0x14:      //电动阀1特性检测

                        break;

                    case 0x15:      //电动阀2特性检测

                        break;

                    case 0x16:      //电动阀3特性检测

                        break;

                    case 0x17:      //一阶水箱特性检测

                        break;

                    case 0x18:      //二阶水箱特性检测

                        break;

                    case 0x21:      //水泵1流量特性

                        break;

                    case 0x22:      //水箱1一阶液位控制
                        xmlele.SetAttribute("PumpLeft", "1");
                        xmlele.SetAttribute("Valve2", "1");
                        xmlele.SetAttribute("EV1", "1");
                        xmldoc.Save(Server.MapPath(Request.ApplicationPath) + "WaterTank.xml");

                        this.Exp.Text = "简单一阶PID液位控制";

                        high1 = NumTable.Rows[NumTable.Rows.Count - 1][1].ToString();
                        this.high1.Text = high1;
                        flu1 = NumTable.Rows[NumTable.Rows.Count - 1][2].ToString();
                        this.flow1.Text = flu1;
                        Ball1 = NumTable.Rows[NumTable.Rows.Count - 1][4].ToString();
                        this.Ball1_value.Text = Ball1;
                        Kp = NumTable.Rows[NumTable.Rows.Count - 1][5].ToString();
                        this.Kp_value.Text = Kp;
                        Ki = NumTable.Rows[NumTable.Rows.Count - 1][6].ToString();
                        this.Ki_value.Text = Ki;
                        Kd = NumTable.Rows[NumTable.Rows.Count - 1][7].ToString();
                        this.Kd_value.Text = Kd;

                        break;

                    case 0x23:      //水箱2二阶液位控制

                        break;

                    case 0x24:      //水箱3三阶液位控制

                        break;

                    case 0x25:      //水箱2温度控制

                        break;

                    case 0x31:      //水箱1复杂液位控制

                        break;

                    case 0x32:      //水箱2复杂液位控制

                        break;

                    case 0x33:      //水箱3复杂液位控制

                        break;

                    case 0x34:      //水箱2复杂温度控制

                        break;

                    case 0x41:      //水箱1串级液位控制

                        break;

                    case 0x42:      //水箱2串级液位控制

                        break;

                    case 0x51:      //单水箱前馈-反馈液位控制

                        break;

                    case 0x52:      //二阶系统前馈-反馈液位控制

                        break;


                }
            }
            catch { }
        }

        public void DisplayLine()
        {
            try
            {
                List<string> CollectPointsNameList = new List<string>();

                if (0 == ModifyDataXML("", "", "液位高度（mm）", NumTable))
                {
                    string Name = "UpdateChart()";
                    ScriptManager.RegisterStartupScript(this, this.GetType(), "myScript1", Name, true);
                }
            }
            catch { }
        }

        private int ModifyDataXML(string titleName, string subTitleName, string seriesName, DataTable dtData)
        {
            try
            {
                string path = Server.MapPath(Request.ApplicationPath) + "DataZoom.xml";
                XmlDocument xd = new XmlDocument();
                xd.Load(path);

                XmlNode root = xd.DocumentElement;

                XmlElement rootXE = xd.DocumentElement;
                rootXE.SetAttribute("caption", titleName);
                rootXE.SetAttribute("subcaption", subTitleName);

                int childCount = root.ChildNodes.Count;

                for (int i = 0; (i < childCount) && (root.ChildNodes.Count > 1); i++)
                {
                    XmlNodeList rootChildList = root.ChildNodes;
                    foreach (XmlNode xn in rootChildList)
                    {
                        if (xn.Name == "dataset")
                        {
                            root.RemoveChild(xn);
                            break;
                        }
                        if ((xn.Name == "categories") && (xn.InnerText != ""))
                        {
                            xn.InnerText = "";
                        }
                    }
                }

                XmlElement xe = xd.CreateElement("dataset");
                xe.SetAttribute("seriesName", seriesName);
                root.AppendChild((XmlNode)xe);

                XmlNodeList childList = root.ChildNodes;//根节点的子节点

                for (int i = 0; i < dtData.Rows.Count; i++)//一次取出每一行的数据
                {
                    foreach (XmlNode xn in childList)//依次检索子节点
                    {
                        if (xn.Name == "categories")//x轴数据
                        {
                            xn.InnerText += dtData.Rows[i][3].ToString() + "|";//添加x轴数据
                        }
                    }
                }

                for (int i = 0; i < dtData.Rows.Count; i++)
                {
                    foreach (XmlNode xn in childList)//为每个指标遍历子节点
                    {
                        if (xn.Name == "dataset")
                        {
                            if (xn.Attributes["seriesName"].Value == "液位高度（mm）")//找到对应的子节点
                            {
                                xn.InnerText += dtData.Rows[i][1].ToString() + "|";//添加对应的数据
                                break;
                            }
                        }
                    }
                }

                xd.Save(path);
                return 0;

            }
            catch
            { return 1; }
        }





    }
}