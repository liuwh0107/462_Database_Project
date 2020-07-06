/*哪5年生產最多優秀(rating>=8)電影*/
SELECT m.year, count(*)
FROM all_gender al, movie m
where al.id=m.id and al.rating>8
GROUP BY m.year 
ORDER BY count(*) DESC LIMIT 5;