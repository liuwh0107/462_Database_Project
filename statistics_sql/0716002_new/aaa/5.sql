/*female 0_18 favorite genre*/
SELECT g.genre,avg(f.avg_0_18)as female_avg_0_18
from female f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_0_18) DESC limit 1;
/*female 18_30 favorite genre*/
SELECT g.genre,avg(f.avg_18_30)as female_avg_18_30
from female f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_18_30) DESC limit 1;
/*female 30_45 favorite genre*/
SELECT g.genre,avg(f.avg_30_45)as female_avg_30_45
from female f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_30_45) DESC limit 1;
/*female 45_up favorite genre*/
SELECT g.genre,avg(f.avg_45up)as female_avg_45up
from female f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_45up) DESC limit 1;

/*male 0_18 favorite genre*/
SELECT g.genre,avg(f.avg_0_18)as male_avg_0_18
from male f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_0_18) DESC limit 1;
/*female 18_30 favorite genre*/
SELECT g.genre,avg(f.avg_18_30)as male_avg_18_30
from male f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_18_30) DESC limit 1;
/*female 30_45 favorite genre*/
SELECT g.genre,avg(f.avg_30_45)as male_avg_30_45
from male f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_30_45) DESC limit 1;
/*female 45_up favorite genre*/
SELECT g.genre,avg(f.avg_45up)as male_avg_45up
from male f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_45up) DESC limit 1;
