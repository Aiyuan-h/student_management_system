using System;
using System.Data;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;
using System.Data.Sql;
using System.Data.SqlClient;

namespace Threetanks_Bowers
{
    public class DataAccess
    {
        string connstring = "";
        public SqlConnection conn;

        public DataAccess()
        {
            connstring = @"server=CAESAR_FU\SQLEXPRESS; integrated security=true; database=tanks";
            conn = new SqlConnection(connstring);
        }

        //直接对SQL进行操作
        public int ExeSQL(string sql)
        {
            SqlCommand cmd = new SqlCommand(sql, conn);
            try
            {
                conn.Open();
                cmd.ExecuteNonQuery();
                return 0;
             }
            catch
            {
                return -1;
            }
            finally
            {
                cmd.Dispose();   //释放资源
                conn.Close();    //关闭连接
            }
        }

        public bool Read(string sql)
        {
            SqlCommand cmd = new SqlCommand(sql, conn);
            SqlDataReader dr = cmd.ExecuteReader();
            try
            {
                conn.Open();
                if (dr.Read())
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            catch
            {
                return false;
            }
            finally
            {
                dr.Close();
                cmd.Dispose();
                this.conn.Close();
            }
        }

        public List<string> Read_DeviceNum(string sql)
        {
            conn.Open();
            SqlCommand cmd = new SqlCommand(sql, conn);
            SqlDataReader dr = cmd.ExecuteReader();

            List<string> devicename = new List<string>();
            try
            {
                while (dr.Read())
                {
                    devicename.Add(dr.GetString(dr.GetOrdinal("DeviceNum")));
                }
                return devicename;
            }
            catch
            {
                return devicename;
            }
            finally
            {
                dr.Close();
                cmd.Dispose();
                this.conn.Close();
            }
        }

        //创建数据表
        public int CreateTable(string tablename, string SQL)
        {
            int Flag = 0;
            if (TableExist(tablename) == true)
            {
                return -1;
            }
            else
            {
                string SQLCreate = @"create table" + " " + tablename + " " + "(" + SQL + ")";
                Flag = ExeSQL(SQLCreate);
                return Flag;
            }
        }


        //判断数据库中是否存在数据表
        public bool TableExist(string tablename)
        {
            string Existsql = @"select count(*) from sysobjects where name ='" + tablename + "'";
            SqlCommand cmd = new SqlCommand(Existsql, conn);
            try
            {
                conn.Open();
                if ((int)cmd.ExecuteScalar() == 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            catch
            {
                return false;
            }
            finally
            {
                conn.Close();
            }
        }

        //查询数据
        public DataTable SearchDataAll(string TableName, string Target, string Value)
        {
            string SearchSQL = @"select*from" + TableName + "where" + Target + "like'%" + Value + "%'";
            try
            {
                conn.Open();
                SqlDataAdapter da = new SqlDataAdapter(SearchSQL, conn);
                DataTable dt = new DataTable();
                da.Fill(dt);
                return dt;
            }
            catch
            {
                return null;
            }
            finally
            {
                this.conn.Close();
            }
        }

        public DataTable SearchData(string TableName, string Target, string Value, string Who, string Name)
        {
            string SearchSQL = @"select*from" + TableName + "where" + Target + "like'%" + Value + "%'" + "and" + Who + "like'%" + Name + "%'";
            try
            {
                conn.Open();
                SqlDataAdapter da = new SqlDataAdapter(SearchSQL, conn);
                DataTable dt = new DataTable();
                da.Fill(dt);
                return dt;
            }
            catch
            {
                return null;
            }
            finally
            {
                this.conn.Close();
            }
        }

        public DataTable SearchData(string TableName)
        {
            string SearchSQL = @"select * from " + TableName + "";
            try
            {
                conn.Open();
                SqlDataAdapter da = new SqlDataAdapter(SearchSQL, conn);
                DataTable dt = new DataTable();
                da.Fill(dt);
                return dt;
            }
            catch
            {
                return null;
            }
            finally
            {
                this.conn.Close();
            }
        }

        public DataTable SearchData(string TableName, string Target, string Value_One, string Value_Two)
        {
            string SearchSQL = @"select*from" + TableName + "where" + Target + "between'" + Value_One + "'AND'" + Value_Two + "'";
            try
            {
                conn.Open();
                SqlDataAdapter da = new SqlDataAdapter(SearchSQL, conn);
                DataTable dt = new DataTable();
                da.Fill(dt);
                return dt;
            }
            catch
            {
                return null;
            }
            finally
            {
                this.conn.Close();
            }
        }

        public void InsertDataTable(string insertsql)
        {
            try
            {
                conn.Open();
                SqlCommand cmd = new SqlCommand(insertsql, conn);
                cmd.ExecuteNonQuery();
            }
            catch { }
            finally
            {
                conn.Close();
            }
        }
    }
}