SELECT SUM(E.Cantidad) as Cantidad, SUM(E.Cantidad * M.Costo) as Total
FROM Entregan E, Materiales M
WHERE M.Clave = E.Clave
AND fecha BETWEEN '1997-01-01' and '1997-12-31'

SELECT P.RazonSocial, COUNT(E.RFC) as 'Numero de Entregas', SUM(Cantidad * Costo) as 'Importe Total'
FROM Proveedores P, Entregan E, Materiales M
WHERE P.RFC = E.RFC and M.Clave = E.Clave
GROUP BY P.RazonSocial

SELECT M.Clave as Clave, M.Descripcion as Descripcion, SUM(E.Cantidad) as 'Cantidad Total Entregada', MIN(E.Cantidad) as 'Minimo Entregado', MAX(E.Cantidad) as 'Maximo Entregado', SUM(M.Costo * E.Cantidad) as 'Importe total'  
FROM Materiales M, Entregan E
WHERE M.Clave = E.Clave
GROUP BY M.Clave, M.Descripcion
HAVING AVG(E.Cantidad) > 400

SELECT P.RazonSocial, AVG(E.Cantidad) as 'Promedio de material entregado', M.Clave, M.Descripcion
FROM Proveedores P, Entregan E, Materiales M
WHERE M.Clave = E.Clave
AND E.RFC = P.RFC
GROUP BY P.RFC, P.RazonSocial, M.Clave, M.Descripcion
HAVING AVG(E.Cantidad) <= 500

SELECT P.RazonSocial, AVG(E.Cantidad) as 'Promedio de material entregado', M.Clave, M.Descripcion
FROM Proveedores P, Entregan E, Materiales M
WHERE M.Clave = E.Clave
AND E.RFC = P.RFC
GROUP BY P.RFC, P.RazonSocial, M.Clave, M.Descripcion
HAVING AVG(E.Cantidad) <= 370
OR AVG(E.Cantidad) >= 450

Select * 
FROM Entregan

INSERT INTO Materiales (Clave, Descripcion, Costo)
VALUES (1440, 'Redstone', 50),
 (1450, 'Esmeralda', 80),
 (1460, 'Oro', 110),
 (1470, 'Diamante', 500),
 (1480, 'Obsidiana', 1500);

 SELECT M.Clave, M.Descripcion
 FROM Materiales M
 WHERE M.Clave NOT IN (SELECT E.Clave FROM Entregan E)

SELECT P.RazonSocial
FROM Proveedores P, Entregan E, Proyectos Pr
WHERE E.RFC = P.RFC and E.Numero = Pr.Numero
AND E.Numero =  (SELECT Pr.Numero
				FROM Proyectos Pr
				WHERE Pr.Denominacion = 'Vamos Mexico'
				OR Pr.Denominacion = 'Queretaro limpio'
				)
GROUP BY P.RazonSocial

SELECT *
FROM Proyectos

SELECT M.Descripcion
FROM Materiales M
WHERE M.Clave NOT IN 
(
SELECT E.Clave
FROM Proyectos P, Entregan E
WHERE E .Numero  = P.Numero 
AND P.Denominacion = 'CIT Yucatan'
)

SELECT P.RazonSocial, AVG(E.Cantidad) as 'Promedio Entregado'
FROM Proveedores P, Entregan E
WHERE P.RFC = E.RFC
GROUP BY P.RazonSocial, E.Cantidad
HAVING AVG(E.Cantidad) > (SELECT AVG(E.Cantidad)
						  FROM Entregan E, Proveedores p
						  WHERE E.RFC = P.RFC and P.RFC = 'VAGO780901'
						  GROUP BY E.Cantidad
						  )


SELECT P.RFC, P.RazonSocial
FROM Proveedores P, Entregan E, Proyectos Pr
WHERE Pr.Denominacion = 'Infonavit Durango'
AND
(
	SELECT SUM(Cantidad) as total
	FROM Entregan E
	WHERE Fecha BETWEEN '2000-01-01' AND '2000-12-31'
) > 
(
	SELECT SUM(Cantidad) as total
	FROM Entregan E
	WHERE Fecha BETWEEN '2001-01-01' AND '2001-12-31'
)
GROUP BY P.RFC, P.RazonSocial

