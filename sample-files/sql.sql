/*
Block Content
*/
SELECT
  Column1 AS OutPutName,
  t1.Column2,
  t1.Column2,
  COUNT(t2.Column4)
FROM
  TargetTable1 t1
  INNER JOIN TargetTable t2 ON t1.Id = t2.Fk
WHERE
  t1.Column1 = 'value'
  AND t1.Column2 >= 3
ORDER BY
  t2.Column3 DESC
LIMIT
  10, 30;

INSERT INTO
  Averbacao (
    CartorioAverbacaoPrazoMaximoData,
    RegistroRealizado,
    Matricula_Id
  )
SELECT
  DATE_ADD(imop.NotificacaoRealizadaData, INTERVAL 60 DAY) AS CartorioAverbacaoPrazoMaximoData,
  FORMAT(imop.EnderecoNumero, 0, 'pt_BR') AS EnderecoNumero,
  0 AS RegistroRealizado,
  mat.Id AS Matricula_Id
FROM
  ImovelPeuc imop
  INNER JOIN Matricula mat ON mat.ImovelPeuc_Id = imop.Id
  LEFT JOIN Averbacao ave ON ave.Matricula_Id = mat.Id
WHERE
  imop.Encerrado = 0
  AND imop.EtapaAtual IN ('Monitoramento')
  AND imop.TipologiaAtual IN ('Não edificado', 'Subutilizado', 'Não utilizado')
  AND ave.Id IS NULL;
