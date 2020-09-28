  INSERT INTO Materiales values(1000, 'xxx', 1000)

  SELECT * FROM Materiales

  DELETE FROM Materiales where Clave = 1000 and Costo = 1000

 ALTER TABLE Materiales add constraint llaveMateriales PRIMARY KEY (Clave)

   sp_helpconstraint materiales