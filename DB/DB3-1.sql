DROP DATABASE IF EXISTS cust;

CREATE DATABASE cust;
USE cust;

create table t3(
      dist int(11) not null,
      repno int(11) not null,
      repname varchar(16) not null,

      primary key (dist)
);

create table t4 (
  cust int(11) not null auto_increment,
  custname varchar(16) not null,
  district int(11) not null,
  revenue float not null,

  primary key (cust),
  foreign key(district) references t3(dist)
);

insert into t3
  values(1, 5, 'München'),
        (2, 10, 'Schwatchwalder'),
        (3, 2, 'Flensburg'),
        (4, 45, 'Hamburg'),
        (5, 3, 'Berlin');

insert into t4 (custname, district, revenue)
  values('Hans Jensen', 1, 100000),
        ('Peter Hansen', 1, 900000),
        ('Jytte Bertelsen', 2, 300000),
        ('Johanne', 2, 800000),
        ('Birgitte', 3, 600000),
        ('Anne', 3, 500000),
        ('Magrette', 4, 900000),
        ('Molly', 4, 100000),
        ('Lis', 5, 500000),
        ('Anonym', 5, 500000);
