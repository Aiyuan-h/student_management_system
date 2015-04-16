create database users_login;
use users_login;

create table user  (
  username varchar(16) primary key,
  passwd char(40) not null,
  email varchar(100) not null
);

create table student(
  username varchar(16) not null,
  studentid varchar(10)
);
/*
*1. 创建本地用户bm_user, 密码为 password
*2. 将bookmarks模式下的所有表的查询，修改，删除权限授予该用户
*/
grant select, insert, update, delete
on users_login.*
to hay@localhost identified by 'password';
