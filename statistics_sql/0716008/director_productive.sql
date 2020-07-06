/*top3 productive director*/

SELECT table1.most_productive_director,table1.number_of_movies
from
(SELECT chart.director as most_productive_director,chart.cnt as number_of_movies
from
(SELECT d.director,count(*) as cnt
from director d
group by d.director
order by cnt desc limit 3)as chart)as table1;


