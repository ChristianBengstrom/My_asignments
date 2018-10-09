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

insert into t3 values(1, 5, 'München');
insert into t3 values(2, 10, 'Schwatchwalder');
insert into t3 values(3, 2, 'Flensburg');
insert into t3 values(4, 45, 'Hamburg');
insert into t3 values(5, 3, 'Berlin');
