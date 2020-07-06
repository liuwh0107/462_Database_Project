/*director（作品數量>30) 作品平均rating分數*/
SELECT d.director,AVG(rating)
FROM director d, all_gender al
where d.director IN (SELECT temp.director
FROM (SELECT d.director,count(*) as cnt
FROM director d
GROUP BY d.director)as temp
WHERE temp.cnt>30) AND d.id=al.id
GROUP BY d.director
ORDER BY AVG(rating) DESC ;