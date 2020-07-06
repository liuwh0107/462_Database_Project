/*probability that oscar and golen_globe award give to the same movie*/
SELECT summ.cnt/(sumo.cnt+sumg.cnt) as probability
FROM 
(SELECT COUNT(distinct os.film)as cnt
FROM oscar os, golden_globe gl
WHERE os.film=gl.film and os.win="TRUE"and gl.win="TRUE")as summ,
(SELECT COUNT(DISTINCT o.film)AS cnt
FROM oscar o
WHERE o.win="TRUE")as sumo,
(SELECT COUNT(DISTINCT g.film)AS cnt
FROM golden_globe g
WHERE g.win="TRUE")as sumg;