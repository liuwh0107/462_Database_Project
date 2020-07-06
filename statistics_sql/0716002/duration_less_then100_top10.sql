/*duration<120 TOP 10*/
SELECT m.title as " duration<120 top 10"
FROM all_gender al, movie_detail md,movie m
where md.duration<120 and al.id=md.id and m.id=md.id
ORDER BY al.rating  desc limit 10;