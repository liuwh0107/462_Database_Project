#哪個國家出產的電影最優質
SELECT movie_detail.country, AVG(all_gender.rating)
FROM movie_detail, all_gender
WHERE movie_detail.id = all_gender.id
GROUP BY movie_detail.country
ORDER BY AVG(all_gender.rating) DESC
LIMIT 100;