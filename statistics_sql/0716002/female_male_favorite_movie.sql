/*female 最喜歡的電影類型*/
SELECT distinct c.genre , sumr.s/c.cnt as "average  rate"
FROM female al,
(SELECT G.genre ,count(*)as cnt
FROM genre G
GROUP by G.genre)as c,
(SELECT sum(al.rating) as s,G.genre
FROM genre  G, female al
WHERE G.id=al.id
GROUP by G.genre)as sumr
where c.genre=sumr.genre
ORDER by  sumr.s/c.cnt DESC limit 10;

/*male 最喜歡的電影類型*/
SELECT distinct c.genre , sumr.s/c.cnt as "average  rate"
FROM male al,
(SELECT G.genre ,count(*)as cnt
FROM genre G
GROUP by G.genre)as c,
(SELECT sum(al.rating) as s,G.genre
FROM genre  G, male al
WHERE G.id=al.id
GROUP by G.genre)as sumr
where c.genre=sumr.genre
ORDER by  sumr.s/c.cnt DESC limit 10;