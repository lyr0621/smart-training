create table users (
  id serial primary key,
  username varchar(255) not null,
  email varchar(255) not null,
  password varchar(255) not null,
  created_at timestamp default now()
);
insert into users (username, email, password) values ('admin', '2538784529@qq.com', 'admin');
