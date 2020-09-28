SELECT * from Entregan

INSERT INTO Entregan values (0, 'xxx', 0, '1-jan-02', 0)

Delete from Entregan where Clave = 0

ALTER TABLE entregan add constraint cfentreganclave
foreign key (clave) references materiales(clave);

ALTER TABLE entregan add constraint cfentreganrfc
foreign key (rfc) references proveedores(rfc);

ALTER TABLE entregan add constraint cfentregannumero
foreign key (numero) references proyectos(numero);

sp_helpconstraint entregan

INSERT INTO entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0);

Delete from Entregan where Cantidad = 0

ALTER TABLE entregan add constraint cantidad check (cantidad > 0)