/* # of movies in different duration */

SELECT table1.duration,table1.number_of_movie
from
(SELECT '<= 90' as duration,count(temp.duration) as number_of_movie
from
(SELECT duration from movie_detail
where duration<=90)as temp
union
SELECT '91~150' as duration,count(temp.duration) as number_of_movie
from
(SELECT duration from movie_detail
where duration between 91 and 150)as temp
union
SELECT '> 150' as duration,count(temp.duration) as number_of_movie
from
(SELECT duration from movie_detail
where duration>150)as temp)as table1;
