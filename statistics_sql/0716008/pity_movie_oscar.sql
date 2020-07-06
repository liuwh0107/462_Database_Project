/*most pitiful movie oscar*/
SELECT table1.year,table1.pity_film
from
(SELECT chart4.year,min(chart4.film) as pity_film
from
(SELECT chart1.year,max(chart1.cnt) as cnt
from
(SELECT o.year,o.film,count(*) as cnt
from oscar o
where win='FALSE'
and o.film not in
(SELECT temp.film
from
(SELECT o.year,o.film,o.win,count(*)
from oscar o 
where win='TRUE'
group by year,film,win
order by film)as temp)
group by year,film,win
order by year)as chart1
group by year)as chart3
,

(SELECT o.year,o.film,count(*) as cnt
from oscar o
where win='FALSE'
and o.film not in
(SELECT temp.film
from
(SELECT o.year,o.film,o.win,count(*)
from oscar o
where win='TRUE'
group by year,film,win
order by film)as temp)
group by year,film,win
order by year)as chart4
where chart3.year=chart4.year
and chart3.cnt=chart4.cnt
group by year
order by year)as table1;

