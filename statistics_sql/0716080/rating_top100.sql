#評分TOP 100
#Top_100_ratings

SELECT movie.title, all_gender.rating
FROM movie, all_gender
WHERE movie.id = all_gender.id
ORDER BY all_gender.rating DESC
LIMIT 100;
