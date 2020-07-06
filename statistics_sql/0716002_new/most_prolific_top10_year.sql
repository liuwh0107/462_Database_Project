/*生產電影數量 TOP 10年*/
SELECT M.year as "year",COUNT(*)as "number of movie"
FROM movie M
GROUP BY M.year
ORDER BY count(*) DESC limit 10;