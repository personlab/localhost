-- *****************************


-- drop table chats;
-- drop table users_to_chats;
-- drop table vktop;
-- show tables; -- просмотр таблиц

-- describe users; -- просмотр полей в таблице

-- alter table users_new rename to users; -- переименовать таблицу
-- alter table users add column birthdate date not null;  -- добавление колонки с описанием 
-- alter table users add birthdate date not null;   -- добавление колонки с описанием
-- alter table users add birthdate date not null,
-- add age tinyint unsigned not null; -- Добавление двух и более колононок одновременно
-- alter table users add birthdate date not null first; -- Добавление столбца на первое место 
-- alter table users add age date not null after middle_name; -- Добавление столбца после указанного 
-- alter table users drop column birthdate; -- Удаление столбца
-- alter table users modify birthdate date not null; -- изменение колонки 


-- изменить тип столбца 
-- alter table users add age tinyint,
-- add boi tinytext not null; 

-- alter table users modify age tinyint unsigned,
-- modify boi varchar(140) null;


-- Клиенты
-- id
-- Имя 
-- Фамилия 
-- Отчество 
-- Пароль 
-- Дата регистрации 
-- мыло 
-- Номер телефона 
-- Дата рождения

use personbk_synergy;
create table if not exists users
(
id int primary key auto_increment,
first_name varchar(50) not null,
last_name varchar(50) null,
middle_name varchar(50) null,
password_hash varchar(300) not null,
registration_date datetime not null default now(),
email varchar(50),
phone varchar(15),
BDdate date not null
);

-- drop table users;
-- Любимые салоны
-- Клиент
-- Салон

create table if not exists favorite_salons
(
user_id int,
salon_id int,
primary key (user_id, salon_id),
foreign key (user_id) references users(id),
foreign key (salon_id) references beauty_saloon(id)
);

-- drop table favorite_salons;
-- drop table favorite_salons;
-- drop table beauty_saloon;


-- Салон красоты 
-- id 
-- Название
-- Адрес 
-- График работы 

create table if not exists beauty_saloon
(
id int primary key auto_increment,
title varchar(50) not null,
address varchar(70) not null,
working_hours varchar(20) not null,
foreign key (id) references services(id),
foreign key (id) references salon_equipment(id),
foreign key (id) references masters(id)
);

-- drop table beauty_saloon;
-- Услуги
-- id 
-- factory_id
-- Название 
-- Цена 
-- Скидка 

create table if not exists services
(
id int primary key auto_increment,
factory_id int,
title varchar(50) not null,
price int unsigned not null,
discount tinyint unsigned not null default 0,
foreign key (id) references masters(id),
foreign key (id) references sessions(session_id)
);

-- drop table services;
-- Мастер
-- id 
-- Имя 
-- Фамилия
-- Граыик работы 

create table if not exists masters
(
id int primary key auto_increment,
first_name varchar(50),
last_name varchar(50),
working_hours varchar(20) not null
);

-- drop table masters;
-- Корзина 
-- Клиент 
-- Выбор услуги

create table if not exists basket
(
user_id int,
order_id int,
primary key (user_id, order_id),
foreign key (user_id) references users(id),
foreign key (order_id) references services(id)
);

-- drop table basket;
-- Запись на сеанс 
-- id 
-- дата сеанса 
-- скидка 
-- сумма без скидки

create table if not exists sign_session
(
id int primary key auto_increment,
user_id int,
session_date datetime not null default now(),
discount tinyint unsigned not null,
total_without_discount int unsigned not null,
foreign key (user_id) references users(id)
-- on delete cascade on update cascade -- Удаление цепочки
);

-- drop table sign_session;
-- Добавим ссылку на таблицу 
-- alter table sign_session add user_id int;

-- Установим связь между клиентами и записями сеансовalter
-- alter table sign_session
-- add foreign key (user_id) references users(id);

-- insert into users (first_name, password_hash, registration_date, email, phone, BDdate) values
-- ('Яна', 'md5 hash', '2000-01-01 12:00:22', 'yana@gmail.com', '+79998888888', '2022-02-02');

-- insert into sign_session (user_id, discount, total_without_discount) values
-- (2, 15, 4500);


-- drop table users;
-- drop table salon_equipment;
-- drop table favorite_salons;
-- select * from users;
-- select * from sign_session;
-- describe users;
-- show tables;

-- delete from users where id = 1;
-- delete from sign_session where id = 2;

-- update users set id = 3 where id = 2; -- Меняем id пользователя в цепочке

-- Оборудование салона 
-- id 
-- Название 
-- Область применения 
-- курс, срок 

create table if not exists salon_equipment
(
id int primary key auto_increment,
title varchar(100),
application_area varchar(300),
course_term tinyint unsigned not null
); 

-- drop table salon_equipment;
-- Сеанс 
-- id 
-- Order id 

create table if not exists sessions
(
session_id int,
order_id int,
primary key(session_id, order_id),
foreign key (order_id) references sign_session (id)
);

--drop table sessions;
-- Отзывы 
-- user_id 
-- salon_id 
-- Комментарии 

create table if not exists reviews
(
user_id int,
salon_id int,
primary key (user_id, salon_id),
reviews_salon varchar(300),
foreign key (user_id) references users (id),
foreign key (salon_id) references beauty_saloon (id),
foreign key (user_id) references services (id)
);

-- drop table reviews;