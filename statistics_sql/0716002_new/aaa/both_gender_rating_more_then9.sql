/*同時為各性別評分>9的10部電影*/
SELECT mo.title,ids.rating
FROM movie mo,
(SELECT f.id,(f.rating+m.rating)/2 as rating
FROM female f, male m
where f.id=m.id and f.rating>9 and m.rating>9
ORDER BY f.rating+m.rating DESC limit 10)as ids
where mo.id=ids.id;