/*哪個導演得最多獎項(導的電影的總得獎數)*/
SELECT os.director, os.cnt+gl.cnt
FROM
(SELECT DISTINCT d.director,count(*)as cnt
from movie m, oscar o,director d
where m.title=o.film and o.win="TRUE" and d.id=m.id
GROUP BY d.director)as os,
(SELECT DISTINCT d.director,count(*)as cnt
from movie m, oscar o,director d
where m.title=o.film and o.win="TRUE" and d.id=m.id
GROUP BY d.director)as gl
WHERE os.director=gl.director
ORDER BY os.cnt+gl.cnt DESC  LIMIT 1;