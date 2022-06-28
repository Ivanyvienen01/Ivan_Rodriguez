create database explogin_express;
create table productos(
    id integer not null auto_increment,
    nombre_producto varchar(255) DEFAULT NULL,
    cantidad_producto decimal(5,0) DEFAULT NULL,
    precio_mayor decimal(5,2) DEFAULT NULL,
	precio_unidad decimal(5,2) DEFAULT NULL,
    primary key(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
create table usuarios(
    id integer not null auto_increment,
    usuario varchar(200) NOT NULL,
    email varchar(200) NOT NULL,
    clave varchar(200) NOT NULL,
    primary key(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;