Практическое задание урок No 14 
Цель задания: Научиться работать с запросами на выборку.
Задание:Переписать запросы из урока 13 на join.
Для БД с урока про ВКонтакте сделать запросы на выборку:
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