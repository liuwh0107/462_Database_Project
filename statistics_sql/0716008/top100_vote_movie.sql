/*top100 popular movie [find top100 movies with highest vote numbers then order it by ratings]*/

SELECT top100.title from
(SELECT m.title,ag.votes,ag.rating
from movie m,all_gender ag
where m.id=ag.id
order by ag.votes DESC limit 100)as top100
order by top100.rating desc;
