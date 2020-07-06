/*top 3 duration average rating*/
SELECT table1.duration from
(SELECT '<= 90' as duration,avg(temp.rating) as average_rating
from
(SELECT md.duration,ag.rating 
from movie_detail md,all_gender ag
where md.id=ag.id and duration<=90)as temp
union
SELECT '91~150' as duration,avg(temp.rating) as average_rating
from
(SELECT md.duration,ag.rating 
from movie_detail md,all_gender ag
where md.id=ag.id and duration between 91 and 150)as temp
union
SELECT '> 150' as duration,avg(temp.rating) as average_rating
from
(SELECT md.duration,ag.rating 
from movie_detail md,all_gender ag
where md.id=ag.id and duration>150)as temp
order by average_rating desc)as table1 limit 3;

