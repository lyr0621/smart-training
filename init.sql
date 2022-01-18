use mysql

CREATE USER 'www'@'localhost' IDENTIFIED BY 'www';
CREATE DATABASE IF NOT EXISTS `www`;

GRANT ALL PRIVILEGES ON `www`.* TO 'www'@'localhost';       # 创建网站数据库用户wwww,允许www用户访问www数据库

use www;
drop table if exists users;
create table users (
  id serial primary key AUTO_INCREMENT,
  username varchar(255) not null,
  email varchar(255) not null,
  password varchar(255) not null,
  created_at timestamp default now()
);          #存储所有的用户
insert into users (username, email, password) values ('admin', '2538784529@qq.com', 'admin');     #添加管理员

DROP TABLE if EXISTS user_1;
CREATE TABLE user_1 (        # 该用户订阅的所有课程
  id serial primary key AUTO_INCREMENT,
  course_id int not null,
  course_name varchar(255) not null,
  subscribed_at timestamp default now()
);
INSERT INTO user_1 (course_id, course_name) VALUES (1,'test');

DROP table if exists courses;
CREATE Table courses (      #所有学科的列表
  id serial primary key AUTO_INCREMENT,
  name varchar(255) not null,
  created_at timestamp default now()
);
INSERT INTO courses (name) VALUES ('test');    #创建一个用于测试的学科
CREATE Table course_1 (       #存储一门学科所有的题目类型,后面的1为该学科的id
  id serial primary key AUTO_INCREMENT,
  name varchar(255) not null,
  created_at timestamp default now()
);
INSERT INTO course_1 (name) VALUES ('qtype_1');

DROP Table if EXISTS subject_1_qtypes_1;
CREATE Table subject_1_qtypes_1 (      #存储这个题目类型所有的题目,该题目类型所属的学科id为1,该题目类型id为1
  id serial primary  AUTO_INCREMENT,
  picture_url varchar(255) not null,
  question VARCHAR(255) not null,
  choice_1 VARCHAR(255) not null,
  choice_2 VARCHAR(255) not null,
  choice_3 VARCHAR(255) not null,
  choice_4 VARCHAR(255) not null,
  answer INT not null,
  created_at timestamp default now()
);
INSERT INTO subject_1_qtypes_1 (picture_url, question, choice_1, choice_2, choice_3, choice_4, answer) VALUES ('http://5b0988e595225.cdn.sohucs.com/images/20200508/f64c6c35d0bc489f9553a4ac45d1bbfd.jpeg', 'test_question 正确选项A', 'A选项', 'B选项', 'C选项', 'D选项', 1);