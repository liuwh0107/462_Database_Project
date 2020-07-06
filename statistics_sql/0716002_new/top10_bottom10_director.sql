/*導演平均評分TOP 10 */
SELECT  d.director,avg(g.rating)
FROM director d, all_gender g
where d.id=g.id
GROUP BY d.director
ORDER BY  avg(g.rating) DESC limit 10;

/*導演平均評分BOTTOM 10 */
SELECT  d.director,avg(g.rating)
FROM director d, all_gender g
where d.id=g.id
GROUP BY d.director
ORDER BY  avg(g.rating) ASC limit 10;