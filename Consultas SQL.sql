--Consultas SQL

SELECT status_id, COUNT(*) AS CANTIDAD,b.status_name,c.name  as ASESOR FROM ticket as a
inner join status as b
on a.status_id = b.id 
left join (select DISTINCT id from asesor)as c
on a.asigned_id = c.id  
WHERE YEAR(created_at) = '2020'
GROUP BY asigned_id,b.status_name ,c.name 
ORDER BY CANTIDAD DESC

SELECT asigned_id AS ASESOR, COUNT(*) AS CANTIDAD,b.status_name, c.name AS ESTADO FROM ticket as a
inner join status as b
on a.status_id = b.id 
left join (select DISTINCT id from asesor)as c
on a.asigned_id = c.id  
WHERE YEAR(created_at) = '2020'
GROUP BY asigned_id,ESTADO
ORDER BY ASESOR DESC

SELECT pz.asigned_id, pz.status_id, f.status_name, w.name
FROM ticket pz
INNER JOIN status f ON pz.status_id = f.id
INNER JOIN asesor w ON w.id = pz.asigned_id
WHERE YEAR(created_at) = '2020' and pz.status_id IN (2,3,5)
GROUP BY asigned_id,status_id
ORDER BY pz.asigned_id

-------------------------|
SELECT COUNT(*) AS CANTIDAD, pz.asigned_id, pz.status_id, f.status_name, w.name
FROM ticket pz
INNER JOIN status f ON pz.status_id = f.id
INNER JOIN asesor w ON w.id = pz.asigned_id
WHERE YEAR(created_at) = '2020' and pz.status_id IN (2,3,5)
GROUP BY asigned_id,status_id
ORDER BY pz.asigned_id