/*哪種類型電影的平均分數最高*/
SELECT temp.genre, temp.rate
from(SELECT g.genre, AVG(al.rating) as rate
FROM genre g, all_gender al
where g.id=al.id
GROUP BY g.genre
ORDER BY AVG(al.rating) DESC limit 3) as temp;
