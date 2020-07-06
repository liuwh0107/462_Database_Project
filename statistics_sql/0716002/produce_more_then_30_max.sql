/*導演(作品數量>X)的最佳代表作*/
SELECT d.director,max(rating)
FROM director d, all_gender al
where d.director IN (SELECT temp.director
FROM (SELECT d.director,count(*) as cnt
FROM director d
GROUP BY d.director)as temp
WHERE temp.cnt>30) AND d.id=al.id
GROUP BY d.director
ORDER BY AVG(rating) DESC ;