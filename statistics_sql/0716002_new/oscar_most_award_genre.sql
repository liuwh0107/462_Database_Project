/*Oscar得獎電影哪種genre最多*/
SELECT g.genre, count(*)
from genre g,
(SELECT    distinct m.id as "id"
FROM movie m, golden_globe o
where  m.title=o.film and o.win= "TRUE")as temp1
where temp1.id=g.id
group by g.genre
ORDER BY count(*) DESC limit 10;