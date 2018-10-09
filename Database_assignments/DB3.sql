DROP DATABASE IF EXISTS worldtest;

CREATE DATABASE worldtest;
USE worldtest;

create table contry(
      code char(2) not null,
      gnp int not null,
      region varchar(40) not null,
      continent varchar(40) not null,
      gnpold int not null,
      surfacearea int not null,
      name varchar(40) not null,
      localname varchar(40) not null,
      population int not null,
      endepyear year not null,
      lifeexpectancy int not null,
      govermentform varchar(40) not null,
      headofstate varchar(40) not null,
      capital varchar(40) not null,
      -- code2 char(2) not null,

      primary key(code),
      unique(capital)
);

create table city(
      id int not null auto_increment,
      district varchar(40) not null,
      name varchar(40) not null,
      population int unsigned not null,
      contrycode char(2) not null,

      primary key(id),
      foreign key(contrycode) references contry(code)
);

create table contrylanguage(
      contrycode char(2) not null,
      language varchar(40) not null,
      isofficial boolean not null,
      percantage numeric(3,2) not null
        check(percantage between 0.00 and 100.00),

      primary key(contrycode, language)
);

create table speaks (
  code char(2) not null,
  language varchar(40) not null,

  primary key(code, language),
  foreign key(code) references contry(code) on delete cascade,
  foreign key(language) references contrylanguage(language) on delete cascade
);
