DROP DATABASE IF EXISTS products;

CREATE DATABASE products;
USE products;

create table book(
      id int not null auto_increment,
      title varchar(40) not null,
      type varchar(20) not null,
      pagecount int not null,
      primary key(id)
);

create table dvd(
      id int not null auto_increment,
      title varchar(40) not null,
      type varchar(20) not null,
      duration time not null,
      primary key(id)
);

create table lecture(
      id int not null auto_increment,
      title varchar(40) not null,
      type varchar(20) not null,
      duration time not null,
      lecturer varchar(40) not null,
      topic varchar(40) not null,
      primary key(id)
);

insert into book(title, type, pagecount)
  values('Design of everyday things', 'non-fiction', 600),
        ('Harry Potter og Flammernes Pokal', 'Fiction', 800),
        ('Learning PHP', 'Educational', 611);

insert into dvd(title, type, duration)
  values('The Social Network', 'Drama', '02:12:34'),
        ('Harry Potter og Flammernes Pokal', 'Eventyr', '02:52:34'),
        ('The Holiday', 'Komedie', '01:58:22');

insert into lecture(title, type, duration, lecturer, topic)
  values('Bliv SEO ekspert', 'Foredrag', '02:00:00', 'Bent Nielsen', 'SEO'),
        ('Lær alt om WordPress', 'Foredrag', '01:30:00', 'Sanne O. Jensen', 'WordPress'),
        ('Alt det fantastiske ved MacOS', 'Foredrag', '02:30:00', 'Tim Cook', 'Styresystemer');
