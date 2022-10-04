Практическое задание урок No 15
Цель задания: Научиться работать с запросами на выборку.
Задание:
Для каждой функции из урока написать по 2 запроса на выборку и преобразование данных
Можно использовать базы данных с текущего и прошлых уроков
Запросы не обязательно должны быть сложными. 
Функции можно комбинировать

use personbk_synergy;
create table if not exists vktop 
(id int primary key auto_increment,
username varchar(30),
password_hash varchar(300),
last_seen datetime
);
create table if not exists chats 
(
id int primary key auto_increment,
title varchar(50),
description varchar(200),
owner_id int,
foreign key (owner_id) references vktop (id) 
);
create table if not exists xcomments
(
id int primary key auto_increment,
comments varchar(50)
);
create table if not exists users_to_chats 
(
user_id int,
chat_id int,
primary key (user_id, chat_id),
enter_datetime datetime,
foreign key (user_id) references vktop (id),
foreign key (chat_id) references chats (id)
);
insert into vktop (username) values
('Юрий'),
('Марина'),
('Мария'),
('Яна'),
('Виктория'),
('Иннеса'),
('Татьяна'),
('Роман');
insert into chats (title, description, owner_id) values
('chat 1', 'for car lovers', '1'),
('chat 2', 'anime is the best kino', '2'),
('chat 3', 'Tokio hotel', '3'),
('chat 4', 'Академия разборов', '4'),
('chat 5', 'Prodigy', '6');
insert into xcomments (comments) values
('Hello world'),
('Love anime'),
('The best'),
('Уникальная школа'),
('Legends');
insert into users_to_chats (user_id, chat_id, enter_datetime) values
(1, 1, '2022-01-15 13:00:15'),
(2, 1, '2022-01-15 14:13:24'),
(3, 1, '2022-01-15 14:43:33'),
(4, 1, '2022-01-17 09:00:15'),
(1, 2, '2022-01-16 17:56:37'),
(2, 2, '2022-01-16 11:19:43'),
(4, 2, '2022-01-17 13:19:43'),
(5, 2, '2022-01-18 14:56:43'),
(7, 2, '2022-01-23 13:00:43'),
(8, 2, '2022-01-30 13:09:43'),
(3, 3, '2022-01-25 00:06:43'),
(4, 3, '2022-01-25 00:06:57');

********************************************************
===========================================

Комментарий пользователя

select concat(v.username, ': "', x.comments, '"') as 'Комментарии пользователя' from vktop as v
join xcomments as x on x.id = v.id;

*******************************************************
===========================================

Выборка комментарие по убыванию алфавита
select concat(v.username, ': "', x.comments, '"') as 'Комментарии пользователя' from vktop as v
join xcomments as x on x.id = v.id
order by x.comments DESC;

*******************************************************
===========================================

Выборка комментария по номеру чата

select v.username,
utc.chat_id as 'chat-id',
utc.enter_datetime as 'datetime',
c.description as 'Название',
x.comments as 'Комментарий',
c.title as chat from vktop as v
join users_to_chats as utc on v.id = utc.user_id
join chats as c on c.id = utc.chat_id
join xcomments as x on x.id = utc.chat_id
where utc.chat_id = 3;

*******************************************************
===========================================

Выборка с убыванием по времени

select v.username,
utc.chat_id as 'chat-id',
utc.enter_datetime as 'datetime',
c.description as 'Название',
x.comments as 'Комментарий',
c.title as chat from vktop as v
join users_to_chats as utc on v.id = utc.user_id
join chats as c on c.id = utc.chat_id
join xcomments as x on x.id = utc.chat_id
where utc.chat_id = 3
order by utc.enter_datetime DESC;

******************************************************
==========================================

Выборка комментария по номеру чата

select v.username, utc.chat_id, x.comments as chat from vktop as v
join users_to_chats as utc on v.id = utc.user_id
join xcomments as x on x.id = utc.user_id
where utc.chat_id = 2;

*******************************************************
===========================================

Количество чатов в котором состоит первый пользователь

select count(*) from vktop as v
join users_to_chats as utc on v.id = 1 and utc.user_id = v.id;




*************************************************************
*************************************************************
===============================================

Рабочие материалы

create table if not exists xphones 
(
id int primary key auto_increment,
factory varchar(30),
title varchar(30),
price int
);
insert into xphones (factory, title, price) values
('Apple', 'iPhone 10', 49999),
('Apple', 'iPhone 10 Pro', 59599),
('Apple', 'iPhone 10 Pro Max', 78999),
('Apple', 'iPhone 11', 68999),
('Apple', 'iPhone 11 Pro', 88999),
('Apple', 'iPhone 11 Pro Max', 98999),
('Samsung', 'Galaxy Note 8', 63999),
('Samsung', 'Galaxy Note 8 Pro', 75999),
('Samsung', 'Galaxy Note 9', 71999),
('Google', 'OnePlus 7', 45999),
('Google', 'OnePlus 7T', 55999),
('Google', 'OnePlus 8', 63999),
('Google', 'OnePlus 9T', 77999),
('Sony', 'Sony Pro', 120999),
('Huawei', 'Huawei P Smart', 17999),
('Honor', 'Honor 20S', 21999),
('Motorola', 'Motorola', 68999);

-- drop table xphones;

-- select count(*) from xphones group by factory;
-- select count(*), factory from xphones group by factory;
-- select count(*), concat(factory, ' ', title) from xphones group by factory;
-- select count(*), factory, concat(' ', title) from xphones group by factory;

-- select count(*), title from xphones group by factory;
-- select factory, count(*) as 'count', round(avg(price), 2) from xphones
-- where price > 80000
-- group by factory
-- order by factory desc;

-- select factory, count(*) as 'count', round(avg(price), 2) from xphones
-- group by factory
-- having round(avg(price), 2) > 70000;

select factory, title from xphones
where price > 65000;

select factory, title from xphones
where price > 65000
group by factory;

select factory, title, price from xphones;

select factory,  count(*) as 'count', round(avg(price), 2) as 'avg price' from xphones
group by factory
having round(avg(price), 2) > 65000;

select factory, count(*) as 'count', round(avg(price), 2) from xphones
where price > 65000
group by factory;


-- select * from phones;
-- select count(*) from phones;

-- select avg(price) as 'middle price' from phones;
-- select floor(avg(price)) as 'middle price' from phones;

-- select max(price), min(price), sum(price) from phones;

-- select avg(price), sum(price) / count(price) from phones;







