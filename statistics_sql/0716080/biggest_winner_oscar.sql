#每年得OSCAR獎總數量最多(最大贏家電影)
SELECT temp.year, tmep.film, temp.wins
FROM (
    SELECT info.year, ANY_VALUE(info.film) as film, ANY_VALUE(info.num_of_wins) as wins
    FROM(
        SELECT oscar.year, oscar.film, COUNT(*) as num_of_wins
        FROM  oscar
        WHERE win = "TRUE"
        GROUP BY oscar.year, oscar.film
        ORDER BY  num_of_wins DESC) as info
    GROUP BY info.year ) as temp;