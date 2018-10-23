-- Data.9.0
Please write an SQL declaration that lists
--
-- The largest city in the world database. I would like the name of the city, the name of it's country, and the population of the city.
-- The largest city from each continent in the world database. I would like the name of the city, the name of it's country, and the population of the city.
1.
select co.name "Contryname"
      ,ci.name "City name"
      ,ci.population
from country co
join city ci
on ci.id=co.capital
order by ci.population DESC
limit 10;

2.
select co.name "Contryname"
      ,co.continent
      ,ci.name "City name"
      ,ci.population
from country co
join city ci
on ci.id=co.capital
group by co.continent
order by ci.population DESC;

-- Data.9.1
--
-- Please write an SQL declaration the lists the largest city per country in the world. State the name of the country, name of the city,
-- population of the city, and calculate what percentage of the country's population live in that city.

select co.name "Contryname"
      ,ci.name "City name"
      ,ci.population
      ,round(ci.population / co.population * 100,2) 'Percentage living here'
from country co
join city ci
on ci.id=co.capital
group by co.name;

-- Data.9.3
--
-- Please write an SQL declaration the lists all cities in the world that have a namesake in some other country.
?
