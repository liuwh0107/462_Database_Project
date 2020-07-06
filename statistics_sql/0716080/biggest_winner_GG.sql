#每年得GG獎總數量最多(最大贏家電影)
SELECT temp.year, tmep.film, temp.wins
FROM (
SELECT info.year, ANY_VALUE(info.film) as film, ANY_VALUE(info.num_of_wins) as wins
FROM(
    SELECT golden_globe.year, golden_globe.film, COUNT(*) as num_of_wins
    FROM  golden_globe
    WHERE win = 'TRUE'
    GROUP BY golden_globe.year, golden_globe.film
    ORDER BY  num_of_wins DESC) as info
GROUP BY info.year ) as temp;
