/*Favorite movie type from different age gap*/

SELECT table1.genre,table1.avg_rating_0_18
from
(SELECT chart1.genre,avg(chart1.avg_0_18) as avg_rating_0_18
from
(SELECT ag.avg_0_18,g.genre from all_gender ag,genre g
where ag.id=g.id)as chart1
group by chart1.genre
order by avg_rating_0_18 desc limit 3)as table1;

SELECT table1.genre,table1.avg_rating_18_30
from
(SELECT chart1.genre,avg(chart1.avg_18_30) as avg_rating_18_30
from
(SELECT ag.avg_18_30,g.genre from all_gender ag,genre g
where ag.id=g.id)as chart1
group by chart1.genre
order by avg_rating_18_30 desc limit 3)as table1;

SELECT table1.genre,table1.avg_rating_30_45
from
(SELECT chart1.genre,avg(chart1.avg_30_45) as avg_rating_30_45
from
(SELECT ag.avg_30_45,g.genre from all_gender ag,genre g
where ag.id=g.id)as chart1
group by chart1.genre
order by avg_rating_30_45 desc limit 3)as table1;

SELECT table1.genre,table1.avg_rating_45up
from
(SELECT chart1.genre,avg(chart1.avg_45up) as avg_rating_45up
from
(SELECT ag.avg_45up,g.genre from all_gender ag,genre g
where ag.id=g.id)as chart1
group by chart1.genre
order by avg_rating_45up desc limit 3)as table1;
