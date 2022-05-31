DROP DATABASE gestion;
CREATE DATABASE gestion;
USE gestion;

CREATE TABLE alumnos(
	id_alumno int(20) primary key,
    nombre varchar(100) not null,
    pass int(4) not null,
    generacion varchar(20)
);

CREATE TABLE servicios(
	id_servicio int(11) primary key auto_increment,
    servicio varchar(100) not null,
    costo int(5) not null
);

CREATE TABLE pago(
	folio int(11) primary key auto_increment,
    monto int(11),
    estado varchar(20),
    archivo varchar(5),
    id_alumno int(20),
    id_servicio int(11),
    fechaPago DATETIME,
    FOREIGN KEY (id_alumno) REFERENCES alumnos(id_alumno)
    ON UPDATE CASCADE ON DELETE SET NULL,
    FOREIGN KEY (id_servicio) REFERENCES servicios(id_servicio)
    ON UPDATE CASCADE ON DELETE SET NULL
);
SELECT * FROM alumnos;
SELECT * FROM pago;

INSERT INTO servicios VALUES(null,"EXPEDICION DE CERTIFICADOS", 10000);
INSERT INTO servicios VALUES(null,"EXPEDICION DE CONSTANCIAS", 1000);
INSERT INTO servicios VALUES(null,"INSCRIPCION A LA INSTITUCION",6000);
INSERT INTO servicios VALUES(null,"INSCRIPCION Y REINSCRIPCION A LICENCIATURA E INGENIERIA",2200);
INSERT INTO servicios VALUES(null,"INSCRIPCION Y REINSCRIPCION A NIVEL MAESTRIA",7000);
INSERT INTO servicios VALUES(null,"INSCRIPCION Y REINSCRIPCION A NIVEL DOCTORADO",1000);


INSERT INTO alumnos VALUES(18161231,"Ruiz Méndez Gerardo",4545,8);
INSERT INTO alumnos VALUES(18161265,"Vásquez Ramos José Eduardo",4545,8);
INSERT INTO alumnos VALUES(18161260,"Torres López Magaly",4545,8);
INSERT INTO alumnos VALUES(171160150,"Santiago Ruiz Pedro Ulises",4545,8);
INSERT INTO alumnos VALUES(18161223,"Reyna Osorio Gerardo Alberto",4545,8);


SELECT * FROM pago p inner join alumnos a ON p.id_alumno=a.id_alumno 
inner join servicios c ON c.id_servicio=p.id_servicio WHERE a.id_alumno=18161231;
UPDATE pago SET archivo="si" WHERE folio=2;


/*DELETE FROM alumnos WHERE id_alumno=18161231;*/
SELECT * FROM alumnos WHERE id_alumno=18161231 AND pass='4545';

SELECT * FROM pago;

INSERT INTO pago VALUES(null, 0, 'no pagado', 'no', "18161231", "2", null);

SELECT * FROM pago p inner join alumnos a ON p.id_alumno=a.id_alumno 
        inner join servicios c ON c.id_servicio=p.id_servicio;
        
SELECT *
FROM alumnos
LIMIT 1,8