#哪5年電影最優質(所有當年電影平均分數)
#Top_5_years_having_the_best_quality_of_movies

SELECT movie.year, AVG(all_gender.rating)
FROM movie, all_gender
WHERE movie.id = all_gender.id
GROUP BY movie.year
ORDER BY AVG(all_gender.rating) DESC
LIMIT 5;
