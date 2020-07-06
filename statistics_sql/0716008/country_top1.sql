/*top 1 movie of each country*/
SELECT table1.country,table1.best_movie
from
(SELECT chart2.country,max(chart2.title) as best_movie
from
(SELECT md.country,min(ag.rating) as rating
from movie_detail md,all_gender ag
where md.id=ag.id and country!=""
group by country)as chart1,
(SELECT md.country,m.title,ag.rating
from movie_detail md, movie m,all_gender ag
where md.id=m.id and md.id=ag.id)as chart2
where chart1.country=chart2.country
and chart1.rating=chart2.rating
group by country)as table1;


