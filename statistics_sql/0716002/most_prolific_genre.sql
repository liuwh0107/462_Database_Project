/*最高生產數量的genre*/
SELECT g.genre, count(*)as"number of movie"
FROM genre g
GROUP BY g.genre
ORDER BY count(*) DESC  LIMIT 10;