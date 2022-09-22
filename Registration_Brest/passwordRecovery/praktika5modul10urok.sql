Цель задания: 
Научиться создавать скрипты на выборку.
Задание:
Используя БД с урока написать следующий скрипт на 
выборку (если не указаны поля для выборки - выбрать все поля):
1. Все поля 
2. Определенные поля (любые поля на выбор студента)
3. Поля "make", "model", "cylinder_layout", "boost_type" и переименовать их в "марка", "модель", "положение цилиндров" и ", "наличие турбины" соответственно.
4. Только те автомобили, у которых V - образное расположение цилиндров.
5. Автомобили, выпускавшиеся после 1999 года включительно
6. Автомобили, выпускавшиеся после 2001 года включительно и до 2009 года включительно. Показать 2 способа: через два условия, соединенных оператором AND и через BETWEEN
7. Автомобили не седаны и не кроссоверы. Показать 2 способа: через два условия, соединенных оператором AND и через NOT IN
8. Показать марку, модель, тип кузова, ведущие колёса и коробку передач автомобилей, выпущенных после 2014 года и не имеющих турбину
9. Автомобили, у которых в названии производителя или в названии модели присутствует английская буква T (независимо от регистра)
10. Показать 20 полноприводных автомобилей, отсортированных по марке. Выбрать марку, модель, год выпуска, тип кузова, тип трансмиссии


drop database if exists autosdb;
create database if not exists autosdb;
use autosdb;
create table autos (
id_trim int,
make varchar(25),
model varchar(50),
generation varchar(50),
year_from int,
year_to int,
series varchar(50),
trim varchar(50),
cylinder_layout varchar(50),
boost_type varchar(50),
drive_wheels varchar(50),
transmission varchar(50)
);
insert into autos values 
(1, 'AC', 'ACE', '1 generation', 1993, 2000, 'Cabriolet', '3.5 MT', 'Inline', 'Turbo', 'Front wheel drive', 'Automatic'),
(55, 'AC', 'ACE', '1 generation', 1993, 2000, 'Cabriolet', '3.5 MT', 'Inline', 'Turbo', 'Front wheel drive', 'Manual'),
(43, 'Volvo', 'XC90', '1 generation', 1993, 2000, 'Crossover', '3.5 MT', 'V-type', 'Turbo', 'Front wheel drive', 'Automatic'),
(64, 'Volvo', 'XC90', '1 generation', 1993, 2000, 'Crossover', '3.5 MT', 'V-type', 'Turbo', 'Front wheel drive(4WD)', 'Continuously variable transmission (CVT)'),
(5443, 'Volvo', 'V 70', '2 generation', 2000, 2009, 'Universal', '3.5 MT', 'V-type', 'Turbo', 'Front wheel drive(4WD)', 'Continuously variable transmission (CVT)'),
(7322, 'Volvo', 'V 70', '2 generation', 2000, 2009, 'Universal', '3.5 MT', 'V-type', 'Turbo', 'Front wheel drive(4WD)', 'Continuously variable transmission (CVT)'),
(5, 'Volvo', 'V 70', '2 generation', 2000, 2009, 'Universal', '3.5 MT', 'V-type', 'Turbo', 'Front wheel drive(4WD)', 'Manual'),
(83, 'Audi', 'A7', '4A/C4', 2000, 2009, 'Sedan', '3.5 MT', 'V-type', 'Turbo', 'Front wheel drive', 'manual'),
(908, 'Audi', 'A7', '4A/C4', 2009, 2015, 'Sedan', '3.5 MT', 'V-type', 'Turbo', 'Front wheel drive', 'Automatic'),
(106, 'Audi', 'A7', '4A/C4', 2009, 2015, 'Sedan', '3.5 MT', 'V-type', 'Turbo', 'Front wheel drive', 'Manual'),
(633, 'BMW', 'X5', '1 generation', 2009, 2015, 'Crossover', '3.5 MT', 'V-type', 'Turbo', 'Front wheel drive(4WD)', 'Continuously variable transmission (CVT)'),
(278, 'BMW', 'X3', '1 generation', 2009, 2015, 'Crossover', '3.5 MT', 'V-type', 'Turbo', 'Front wheel drive(4WD)', 'Automatic'),
(987, 'BMW', 'X5', '1 generation', 2008, 2015, 'Crossover', '3.5 MT', 'V-type', 'Turbo', 'Front wheel drive', 'Manual'),
(9878, 'AC', 'ACE', '1 generation', 1993, 2000, 'Cabriolet', '3.5 MT', 'Inline', 'none', 'Front wheel drive', 'Automatic'),
(908, 'AC', 'ACE', '3 generation', 2015, 2020, 'Cabriolet', '3.5 MT', 'Inline', 'none', 'Front wheel drive', 'Automatic');




***3
select 
make as 'марка',
model as 'модель',
cylinder_layout as 'положение цилиндров',
boost_type as 'наличие турбины'
from autos;
 -- -- -- переименование имя столбцов на время просмотра через "as"

***4
select make, model from autos
where cylinder_layout = 'V-type';
-- -- -- Показывает V образное расположение цилиндра

***5
select make, model, year_to from autos
where year_from >= 1999;
-- -- -- Автомобили который были выпущены с 1999 года

***6
sselect * from autos
where year_from between 2001 and 2009;
==============
select * from autos
where 
boost_type in ('Turbo') and
year_from between 2001 and 2009;
-- -- -- выборка автомобилей которые были выпущены между 2001 и 2009
-- -- -- соединенных оператором AND и через BETWEEN

***7
select * from autos where not series in ('Sedan', 'Crossover');
------------------------------------------------------------------------------------
select make from autos where not series in ('Sedan', 'Crossover') and boost_type = 'Turbo';
соединенных оператором AND и через NOT IN

***8
select make, model, series, drive_wheels, transmission from autos
where year_from >= 2014 and not boost_type = 'Turbo';

***9
select * from autos
where series like '%T%';

***10
select make, model, year_from, series, transmission from autos
order by make, drive_wheels limit 20;





-- use autosdb;
-- select make, model from autos
-- where cylinder_layout != 'Inline';
-- -- -- проотрицать данный запрос, не равно

-- use autosdb;
-- select make, model, cylinder_layout from autos
-- where cylinder_layout != 'Inline';
-- -- -- выборка с просмотром раположения цилиндров

-- use autosdb;
-- select make, model, year_to from autos
-- where year_from >= 2000;
-- -- -- Автомобили которые были выпущены в 2000 году и выпускались ДО

-- use autosdb;
-- select make, model, year_to, generation from autos
-- where year_from <= 2007;
-- -- -- Автомобили который были выпущены ДО 2007 года

-- select make, model, year_to, generation from autos
-- where transmission = 'Automatic';
-- -- -- Выборка автомобилей с автоматической коробкой передач

-- select make, model from autos
-- where transmission = 'Automatic'
-- or transmission = 'Continuously variable transmission (CVT)';
-- select transmission from autos;

-- select make, model from autos
-- where transmission in
-- ('Automatic', 'Continuously variable transmission (CVT)');
-- select transmission from autos;

-- select make, model, boost_type, drive_wheels
-- from autos
-- where transmission != 'Manual'
-- and boost_type = 'Turbo'
-- and series = 'Crossover';
-- -- -- Выборка из таблицы по модели, марки, бусту, и ведущим колесам где только коробка автомат, турбо, и кроссоверы. 


-- select 
--  make as factory,
--  model,
--  boost_type as turbo,
--  drive_wheels as 'Ведущие колеса'
-- from autos
-- where transmission != 'Manual'
-- and boost_type = 'Turbo'
-- and series = 'Crossover';
 -- -- -- переименование имя столбцов на время просмотра через "as"
 
 -- -- -- >, <, =, != (<>), <=, >=  - выражения которые можно использовать при выборкеa
 -- -- -- in используем когда значение поля должно быть среди значений
 -- -- -- where drive in ('fwd', 'rwd', '4wd', 'awd',)
 
--  where drive in ('4wd', 'awd')
--  where year_from between (2000, 2020)
 -- -- -- выборка полноприводных автомобилей которые были выпущены между 2000 и 2020
-- where 
--  drive in ('4wd', 'awd') and
--  year_from between (2000, 2020);
-- -- -- где производители toyota или audi
--  where make = 'Toyota' or make = 'Audi';

-- select * from autos
-- where drive_wheels in ('Front wheel drive(4WD)', 'All Front wheel drive(4WD)');
-- -- -- выборка из таблицы данных по ведущим колесам

-- select * from autos
-- where year_from between 1990 and 2000;
-- -- -- выборка автомобилей между 2000 и 2010 годом изготовления 

-- select * from autos
-- where drive_wheels in ('Front wheel drive(4WD)', 'All Front wheel drive(4WD)')
-- and year_from between 1990 and 2000;
-- -- -- выборка из таблицы, где полноприводный машины выпущенные с 1990 года по 2000 год

-- select * from autos
-- where make = 'Toyota' or make = 'Audi';
-- -- -- выборка просмотр всех данных по автомобилям ауди и тойота

-- select * from autos
-- where not drive_wheels in
-- ('Front wheel drive(4WD)', 'All Front wheel drive(4WD)');
-- -- -- выборка в которой привод не является полноприводным или передним

-- конструкция 'like' означает 'как'
-- select * from autos
-- where make like '_o%';

-- select * from autos limit 2000;
-- -- -- отображение количества строк в таблице

-- select * from autos
-- order by make;
-- -- -- сортировка по производтелю марке

-- select * from autos
-- order by model, series;
-- -- -- сортировка по модели и кузову;

-- select make, model from autos
-- where drive_wheels in 
-- ('Front wheel drive(4WD)', 'All Front wheel drive(4WD)')
-- order by model, cylinder_layout
-- limit 10;
-- -- -- выборка марки и модели по полноприводному приводу сортировка по модели и расположению цилиндра с лимитом отображения 10
