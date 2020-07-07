/*best movie*/
SELECT table1.year,table1.best_movie
from
(SELECT chart3.year,max(chart3.title) as best_movie
from
(SELECT chart.year,max(chart.rating) as rating
from
(SELECT m.title,m.year,ag.id,ag.rating
from movie m,all_gender ag
where m.id=ag.id)as chart
group by chart.year)as chart2,
(SELECT m.title,m.year,ag.rating
from movie m,all_gender ag
where m.id=ag.id)as chart3
where chart2.year=chart3.year
and chart2.rating=chart3.rating
group by year
order by year)as table1;


