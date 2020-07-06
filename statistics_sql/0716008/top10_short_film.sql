/*short film(duration <90) top 10*/

SELECT table1.movie,table1.rating
from
(SELECT cd.title as movie,ag.rating
from all_gender ag,
(SELECT m.id,m.title,md.duration
from movie m,movie_detail md
where md.duration<=90 and m.id=md.id)as cd/*cd(candidate) is a table with id , film_name and duration <90*/
where ag.id=cd.id
order by ag.rating DESC limit 10)as table1;


