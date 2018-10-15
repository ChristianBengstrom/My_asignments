-- Data.7.0
select * from countrylanguage where countrycode='AFG';

select * from countrylanguage where countrycode='TJK';

select * from countrylanguage where countrycode='UZB';

select * from countrylanguage where countrycode='TJK';

select * from countrylanguage where countrycode='TJK';

select * from countrylanguage where countrycode='UZB' or countrycode='TJK' or countrycode='AFG';

-- make a join with country and calculate the percentage of the spoken language with use of the absulut population.

-- Data.7.1
select * from countrylanguage where countrycode='DNK';

select * from countrylanguage where countrycode='ZAF' order by language;

select * from countrylanguage where countrycode='USB' or countrycode='TJK' or countrycode='AFG' order by percentage desc;

-- Data.7.2
select headofstate from country where continent='Europe';

select code, name, population from country where region='Southern and Central Asia' order by population desc;

-- Data.8.0
select co.name
      ,co.population
      ,co.continent
      ,ci.name
      ,ci.population
from country co
join city ci
on ci.id=co.capital
where continent='Oceania' or continent='Antarctica' or continent='South America';

-- Data.8.1
select c.name
      ,c.population
      ,cl.language
      ,cl.percentage
      ,sum(c.population) / 100 * cl.percentage 'NOOfPeople'
from countrylanguage cl
join country c
on cl.countrycode=c.code
group by c.name;

-- Data.8.2
select c.name
      ,c.population
      ,cl.language
      ,cl.percentage
      ,sum(c.population) / 100 * cl.percentage 'NOOfPeople'
from countrylanguage cl
join country c
on cl.countrycode=c.code
group by cl.language;

-- Data 8.3
select distinct language
from countrylanguage
order by language;

-- Data.8.4
select language
      percentage
      sum(c.population) / 100 * cl.percentage 'NOOfPeople'
from countrylanguage
order by NOOfPeople desc;

-- Data 8.5
select c.name
      ,c.population
      ,cl.language
      ,cl.percentage
      ,sum(c.population) / 100 * cl.percentage 'NOOfPeople'
      ,@curRank := @curRank + 1 AS rank
from (select @curRank := 0) rank, countrylanguage cl
join country c
on cl.countrycode=c.code
group by cl.language
order by rank desc;

select c.code
      ,c.population
      ,cl.language
      ,cl.percentage
      ,sum(c.population) / 100 * cl.percentage 'NOOfPeople'
from countrylanguage cl
join country c
on cl.countrycode=c.code
group by cl.language
order by NOOfPeople desc;
