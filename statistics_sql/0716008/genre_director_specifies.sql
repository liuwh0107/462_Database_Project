/*film which the director specifies*/

SELECT temp.director,temp.genre_specified
from
(SELECT chart2.director,min(chart3.genre)as genre_specified from
(SELECT chart1.director,max(chart1.avg_rating)as avg_rating
from
(SELECT d.director,g.genre,avg(ag.rating) as avg_rating
from director d,genre g,all_gender ag
where ag.id=g.id and d.id=ag.id
and d.director not in
(SELECT chart1.director
from
(SELECT d.director,count(*) as cnt from director d
group by d.director
order by cnt)as chart1
where chart1.cnt<=30)
group by d.director,g.genre
)as chart1
group by chart1.director
order by chart1.director)as chart2,

(SELECT d.director,g.genre,avg(ag.rating) as avg_rating
from director d,genre g,all_gender ag
where ag.id=g.id and d.id=ag.id
and d.director not in
(SELECT chart1.director
from
(SELECT d.director,count(*) as cnt from director d
group by d.director
order by cnt)as chart1
where chart1.cnt<=30)
group by d.director,g.genre)as chart3
where chart2.director=chart3.director
and chart2.avg_rating=chart3.avg_rating
group by director
order by director)as temp;




