-- View.1
--
-- Create a view that has the project name, controlling department name, number of
-- employees, and total hours worked per week on the project for each project.

drop view v1;

create view v1 as
select p.pname as "Project name"
      ,d.dname as Department
      ,count(wo.essn) as "Total workers"
      ,sum(wo.hours) as "Total hours"
from project p
JOIN department d ON p.dnum=d.dnumber
JOIN works_on wo ON p.pnumber= wo.pno
group by p.pname, d.dname;

-- View.1.1
--
-- Create a view that has the project name, controlling department name, number of
-- employees, and total hours worked per week on the project for each project with more than one employee working on it.

create view v2 as
select p.pname as "Project name"
      ,d.dname as Department
      ,count(wo.essn) as "Total workers"
      ,sum(wo.hours) as "Total hours"
from project p
JOIN department d ON p.dnum=d.dnumber
JOIN works_on wo ON p.pnumber= wo.pno
group by p.pname, d.dname
having count(essn) > 1;
