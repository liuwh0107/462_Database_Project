#近10年推薦電影(評分高)
#Top_movies_in_10_years

SELECT movie.title, all_gender.rating
FROM movie, all_gender
WHERE movie.id = all_gender.id
AND movie.year BETWEEN 2009 AND 2019
ORDER BY all_gender.rating DESC
LIMIT 100;
