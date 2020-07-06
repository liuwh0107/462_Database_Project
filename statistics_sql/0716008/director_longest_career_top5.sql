/*longest_career_top5*/

SELECT table1.director,table1.career_years from 
(SELECT chart1.director,(chart1.year-chart2.year) as career_years
from
(SELECT d.director,max(m.year) as year
from director d,movie m
where m.id=d.id
group by director
order by director)as chart1,

(SELECT d.director,min(m.year) as year
from director d,movie m
where m.id=d.id
group by director
order by director)as chart2
where chart1.director=chart2.director)as table1
where table1.career_years<50
order by career_years desc limit 5;
