#各年齡層TOP 100
SELECT movie.title, all_gender.avg_0_18
FROM movie, all_gender
WHERE movie.id = all_gender.id
ORDER BY all_gender.avg_0_18 DESC
LIMIT 100;

SELECT movie.title, all_gender.avg_18_30
FROM movie, all_gender
WHERE movie.id = all_gender.id
ORDER BY all_gender.avg_18_30 DESC
LIMIT 100;

SELECT movie.title, all_gender.avg_30_45
FROM movie, all_gender
WHERE movie.id = all_gender.id
ORDER BY all_gender.avg_30_45 DESC
LIMIT 100;

SELECT movie.title, all_gender.avg_45up
FROM movie, all_gender
WHERE movie.id = all_gender.id
ORDER BY all_gender.avg_45up DESC
LIMIT 100;