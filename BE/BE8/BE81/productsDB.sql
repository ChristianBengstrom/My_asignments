DROP DATABASE IF EXISTS products;

CREATE DATABASE products;
USE products;

create table products(
       id int not null auto_increment
      ,title varchar(40) not null
      ,type varchar(20) not null
      ,primary key(id)
);

create table book(
       id int not null
      ,pagecount int not null
      ,primary key(id)
      ,foreign key(id) references products(id)
);

create table dvd(
       id int not null
      ,duration time not null
      ,primary key(id)
      ,foreign key(id) references products(id)
);

create table lecture(
       id int not null
      ,duration time not null
      ,lecturer varchar(40) not null
      ,topic varchar(40) not null
      ,primary key(id)
      ,foreign key(id) references products(id)
);

insert into products(title, type)
  values ('Design of everyday things', 'Non-fiction')
        ,('Harry Potter og Flammernes Pokal', 'Fiction')
        ,('Learning PHP', 'Educational')
        ,('The Social Network', 'Drama')
        ,('Harry Potter og Flammernes Pokal', 'Eventyr')
        ,('The Holiday', 'Komedie')
        ,('Bliv SEO ekspert', 'Foredrag')
        ,('Lær alt om WordPress', 'Foredrag')
        ,('Alt det fantastiske ved MacOS', 'Foredrag');

insert into book(id, pagecount)
  values (1, 600)
        ,(2, 800)
        ,(3, 611);

insert into dvd(id, duration)
  values (4, '02:12:34')
        ,(5, '02:52:34')
        ,(6, '01:58:22');

insert into lecture(id, duration, lecturer, topic)
  values (7, '02:00:00', 'Bent Nielsen', 'SEO')
        ,(8, '01:30:00', 'Sanne O. Jensen', 'WordPress')
        ,(9, '02:30:00', 'Tim Cook', 'Styresystemer');
