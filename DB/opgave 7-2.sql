-- Example 7.2. OR

-- The truth table for an or says true if one or the other constituent(s) is true.
-- You could say that it is true when at least one of the constituents is true.
-- In the following example only one can be true for any row.

select name, countrycode, population
from city
where countrycode != 'DNK'
and countrycode != 'NOR'
and countrycode != 'FIN'
order by countrycode, population desc;

select name, countrycode, population
from city
where (not countrycode = 'DNK'
or countrycode != 'NOR'
or countrycode != 'FIN')
order by countrycode, population desc;

select name, countrycode, population
from city
where countrycode not in ('DNK', 'NOR', 'FIN')
order by countrycode, population desc;
