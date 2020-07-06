#哪個導演競逐獎項的時間最久？
SELECT director.director
FROM director, golden_globe
WHERE director
GROUP BY 
ORDER BY  DESC
LIMIT 5;

每個導演 影片 片名和獎項一樣