/* 
Block Content 
*/
SELECT
    Column1 AS OutPutName, t1.Column2, t1.Column2, COUNT(t2.Column4)
FROM
    TargetTable1 t1
    INNER JOIN TargetTable t2 ON t1.Id=t2.Fk
WHERE
    t1.Column1='value' AND
    t1.Column2>=3
ORDER BY
    t2.Column3 DESC
LIMIT
    10,30;