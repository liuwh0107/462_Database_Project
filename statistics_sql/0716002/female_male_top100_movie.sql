/*female top 100*/
SELECT movie.title, female.rating
FROM movie, female
WHERE movie.id = female.id
ORDER BY female.rating DESC
LIMIT 100;
/*male top 100*/
SELECT movie.title, male.rating
FROM movie, male
WHERE movie.id = male.id
ORDER BY male.rating DESC
LIMIT 100;
