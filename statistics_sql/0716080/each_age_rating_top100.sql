#各年齡層TOP 100
#Top_100_movies_of_age_from_0_to_18

SELECT movie.title, all_gender.avg_0_18
FROM movie, all_gender
WHERE movie.id = all_gender.id
ORDER BY all_gender.avg_0_18 DESC
LIMIT 100;

#top 100 movies of age from 18 to 30
SELECT movie.title, all_gender.avg_18_30
FROM movie, all_gender
WHERE movie.id = all_gender.id
ORDER BY all_gender.avg_18_30 DESC
LIMIT 100;

#top 100 movies of age from 30 to 45
SELECT movie.title, all_gender.avg_30_45
FROM movie, all_gender
WHERE movie.id = all_gender.id
ORDER BY all_gender.avg_30_45 DESC
LIMIT 100;

#top 100 movies of age greater than 45
SELECT movie.title, all_gender.avg_45up
FROM movie, all_gender
WHERE movie.id = all_gender.id
ORDER BY all_gender.avg_45up DESC
LIMIT 100;
