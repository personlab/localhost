Практическое задание урок No 14 
Цель задания: Научиться работать с запросами на выборку.
Задание:Переписать запросы из урока 13 на join.
Для БД с урока про ВКонтакте сделать запросы на выборку:

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

select * from vktop
join users_to_chats;

1. Вывести пользователей, которые не являются создателями чатов

select v.username, c.title as chat from vktop as v
left join chats as c on v.id = c.owner_id;

*********************************************************************
=====================================================

2. Вывести пользователей, которых нет ни в одном чате

select v.username, c.title, c.owner_id as chat from vktop as v
left join chats as c on v.id = c.owner_id
left join users_to_chats as utc on v.id = utc.user_id;

*********************************************************************
=====================================================

3. Для каждого пользователя отдельно. 
Узнать названия и описание чатов, в которых они находятся. 
Упорядочить по названию чата в обратном порядке

select v.username,
utc.chat_id as 'chat-id',
utc.enter_datetime as 'datetime',
c.description as chat,
c.title as chat from vktop as v
join users_to_chats as utc on v.id = utc.user_id
join chats as c on c.id = utc.chat_id
order by c.description DESC;

*********************************************************************
======================================================

4. Для каждого пользователя отдельно. 
Узнать название и дату вступления в чат, в которых они находятся. 
Упорядочить по дате вступления в чат/

select v.username,
utc.chat_id as 'chat-id',
utc.enter_datetime as 'datetime',
c.title as chat from vktop as v
join users_to_chats as utc on v.id = utc.user_id
join chats as c on c.id = utc.chat_id
order by enter_datetime ASC;