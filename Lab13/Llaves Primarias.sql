ALTER TABLE Proveedores add constraint llaveProveedores PRIMARY KEY (RFC)

 ALTER TABLE Proyectos add constraint llaveProyectos PRIMARY KEY (Numero)

ALTER TABLE Entregan add constraint llaveEntregan PRIMARY KEY (Clave, RFC, Numero, Fecha)