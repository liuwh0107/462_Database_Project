#各國電影數量排行
#Most_movie_of_each_country

SELECT movie_detail.country, COUNT(*) as cnt
FROM movie_detail
GROUP BY movie_detail.country
ORDER BY  COUNT(*) DESC;
