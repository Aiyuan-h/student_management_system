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

namespace WebApplication1
{
    public partial class WebForm1 : System.Web.UI.Page
    {
        private Socket socket;
        private IPAddress _ipAddr = null;
        private Thread threadReceive = null;


        protected void Button2_Click(object sender, EventArgs e)
        {
            mysocket();

            byte[] bytesSendtoServer = new byte[7];
            bytesSendtoServer[0] = 0x40;
            bytesSendtoServer[1] = 0x00;
            bytesSendtoServer[2] = 0x22;
            bytesSendtoServer[3] = 0x01;
            bytesSendtoServer[4] = 0x0A;
            bytesSendtoServer[5] = 0x00;
            bytesSendtoServer[6] = 0x03;
            SendByteToServer(bytesSendtoServer);
        }
        protected void Button1_Click(object sender, EventArgs e)
        {
            mysocket();
            byte[] bytesSendtoServer = new byte[7];
            bytesSendtoServer[0] = 0x40;
            bytesSendtoServer[1] = 0x01;
            bytesSendtoServer[2] = 0x22;
            bytesSendtoServer[3] = 0x01;
            bytesSendtoServer[4] = 0x0A;
            bytesSendtoServer[5] = 0x00;
            bytesSendtoServer[6] = 0x03;
            SendByteToServer(bytesSendtoServer);
        }

        protected void Button3_Click(object sender, EventArgs e)
        {
           mysocket();

            /*byte[] bytesSendtoServer = new byte[19];
            bytesSendtoServer[0] = 0x54;
            bytesSendtoServer[1] = 0x68;
            bytesSendtoServer[2] = 0x72;
            bytesSendtoServer[3] = 0x65;
            bytesSendtoServer[4] = 0x65;
            bytesSendtoServer[5] = 0x2D;
            bytesSendtoServer[6] = 0x74;
            bytesSendtoServer[7] = 0x61;
            bytesSendtoServer[8] = 0x6E;
            bytesSendtoServer[9] = 0x6B;
            bytesSendtoServer[10] = 0x73;
            bytesSendtoServer[11] = 0x2D;
            bytesSendtoServer[12] = 0x43;
            bytesSendtoServer[13] = 0x6F;
            bytesSendtoServer[14] = 0x6E;
            bytesSendtoServer[15] = 0x6E;
            bytesSendtoServer[16] = 0x65;
            bytesSendtoServer[17] = 0x63;
            bytesSendtoServer[18] = 0x74;
            SendByteToServer(bytesSendtoServer);*/
           string sendStr = "Three-tanks-Connect";
           SendToServer(sendStr);
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

                //string sendStr = "Three-tanks" + hostName + ";" + textBoxServerPort.Text + "on-line";

                //string sendStr = "Three-tanks-Connect";
                //SendToServer(sendStr);

               /* byte[] bytesSendtoServer = new byte[1024];
                bytesSendtoServer[0] = 0x40;
                bytesSendtoServer[1] = 0x00;
                bytesSendtoServer[2] = 0x22;
                bytesSendtoServer[3] = 0x01;
                bytesSendtoServer[4] = 0x0A;
                bytesSendtoServer[5] = 0x00;
                bytesSendtoServer[6] = 0x03;
                SendByteToServer(bytesSendtoServer);

                bytesSendtoServer[0] = 0x40;
                bytesSendtoServer[1] = 0x01;
                bytesSendtoServer[2] = 0x22;
                bytesSendtoServer[3] = 0x01;
                bytesSendtoServer[4] = 0x0A;
                bytesSendtoServer[5] = 0x00;
                bytesSendtoServer[6] = 0x03;
                SendByteToServer(bytesSendtoServer);


                 threadReceive = new Thread(ReceiveMsg);
                 threadReceive.IsBackground = true;
                 threadReceive.Start();*/
            }
            catch (Exception se)
            {
            }
        }
        protected void Page_Load(object sender, EventArgs e)
        {
           // mysocket();
            
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

            private void SendToServer(string strMessage)
            {
                if (socket!=null)
                {
                    //创建 bytes 字节数组以转换发送串   
                    byte[] bytesSendStr = new byte[1024];
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

            private void ReceiveMsg()
            {
                string recvStr = "";   //声明接收返回内容的字符串 

                byte[] recvBytes = new byte[1024];   //声明字节数组，一次接收数据的长度为 1024 字节 

                int bytes = 0;            //返回实际接收内容的字节数

                while (true)             //循环读取，直到接收完所有数据
                {
                    try
                    {
                        bytes = socket.Receive(recvBytes, recvBytes.Length, 0);

                        if (bytes <= 0)        //读取完成后 退出循环
                            break;

                        recvStr = Encoding.ASCII.GetString(recvBytes, 0, bytes);   //将读取的字节数转换为字符串

                        byte[] content = Encoding.ASCII.GetBytes(recvStr);                //将所读取的字符串转换为字节数组 

                        if (content[0] == 0x41)           //客户端和服务端连接成功
                        {                                 //服务端发送0x41+x66+液位标定
                            if (content[1] == 0x66)
                            {
                                change.Text = Convert.ToString(content[0]);
                                text.Text = "连接";
                                Label1.Text = Convert.ToString(content[0]);
                            }
                            else if (content[1] == 0x88)   //0x41+0x88说明服务器要求关闭服务
                            {
                                socket.Close();         //关闭 Socket 
                                if (threadReceive != null)
                                {
                                    threadReceive.Abort();
                                }
                            }
                        }
                        else if (content[0] == 0x40 && bytes == 10)     //收到服务端0x40打头的10个字节内容
                        {
                        }
                    }
                    catch (Exception se)
                    {
                        //MessageBox.Show("客户端数据接收出错！" + se.Message, "提示信息", MessageBoxButtons.OK, MessageBoxIcon.Information);

                        socket.Close();     //关闭 Socket
                        socket = null;

                        if (threadReceive != null)
                        {
                            threadReceive.Abort();
                        }
                    }
                }
              }





           /* protected void Button1_Click(object sender, EventArgs e)
            {

              
                string hostName = "192.168.253.1";    //远程主机IP 

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

                    //string sendStr = "Three-tanks" + hostName + ";" + textBoxServerPort.Text + "on-line";
                    string sendStr = "Three-tanks-Connect";
                    SendToServer(sendStr);

                   /* threadReceive = new Thread(ReceiveMsg);
                    threadReceive.IsBackground = true;
                    threadReceive.Start();
                }
                catch (Exception se)
                {
                }

            }*/



    }
}
    