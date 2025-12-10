-- Creación de tabla en PostgreSQL
CREATE TABLE vehiculos (
  id              SERIAL PRIMARY KEY,
  marca           VARCHAR(100) NOT NULL,
  placa           VARCHAR(100) NOT NULL UNIQUE,
  anio_fabricacion INTEGER     NOT NULL,
  tipo            VARCHAR(100) NOT NULL,
  propietario     VARCHAR(100) NOT NULL
);


insert into vehiculos(
marca,
placa,
anio_fabricacion,
tipo,
propietario
) values (
'chevrolet',
'LCH0101',
1990,
'particular',
'Patricio Rojas'
);

insert into vehiculos(
marca,
placa,
anio_fabricacion,
tipo,
propietario
) values (
'mazda',
'LCH0102',
2000,
'publico',
'Andres Rivas'
);
