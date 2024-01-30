drop database if exists yoinvito;

create database yoinvito;

use yoinvito;

create table usuarios(
id_usu int auto_increment,
email varchar(50) not null,
pass_usu varchar(50) not null,
rol varchar(10) not null,
primary key(id_usu)
);

create table riders(
id_rider int auto_increment,
nombre varchar(50) not null,
primer_apellido varchar(100) not null,
primary key(id_rider),
FOREIGN KEY (id_rider) REFERENCES usuarios(id_usu)
);
create table proveedores(
id_prov int auto_increment,
nombre varchar(50) not null,
primer_apellido varchar(100) not null,
nombre_negocio varchar(250) not null,
direccion varchar(250) not null,
piso varchar(30),
ciudad varchar(250) not null,
cp varchar(5) not null,
primary key(id_prov),
FOREIGN KEY proveedores(id_prov) REFERENCES usuarios(id_usu)
);
create table centros_sociales(
id_centro int auto_increment,
nombre varchar(50) not null,
direccion varchar(250) not null,
piso varchar(30),
ciudad varchar(250) not null,
cp varchar(5) not null,
primary key(id_centro),
FOREIGN KEY (id_centro) REFERENCES usuarios(id_usu)
);
create table menus(
id_menu int auto_increment,
plato1 varchar(250) not null,
plato2 varchar(250),
plato3 varchar(250),
plato4 varchar(250),
plato5 varchar(250),
cantidadPacks int not null,
id_prov int not null,
FOREIGN KEY (id_prov) REFERENCES proveedores(id_prov),
primary key(id_menu)
);

create table puntos_entrega(
id_punto int auto_increment,
nombre varchar(50) not null,
direccion varchar(250) not null,
tipo enum("Homeless","Centro"),
primary key(id_punto)
);

create table pedidos(
id_pedido int auto_increment,
id_rider int not null,
id_proveedor int not null,
cantidad_packs int not null,
fecha date not null,
estado_pedido varchar(15) not null,
id_punto int,
FOREIGN KEY (id_rider) REFERENCES riders(id_rider),
FOREIGN KEY (id_proveedor) REFERENCES proveedores(id_prov),
FOREIGN KEY (id_punto) REFERENCES puntos_entrega(id_punto),
primary key(id_pedido)
);

create table favoritos(
id_fav int auto_increment,
id_rider int not null,
id_proveedor int not null,
FOREIGN KEY (id_rider) REFERENCES riders(id_rider),
FOREIGN KEY (id_proveedor) REFERENCES proveedores(id_prov),
primary key(id_fav)
);


create table notis_usuario(
id_noti int auto_increment,
mensaje varchar(250) not null,
id_prov int not null,
id_rider int not null,
leido boolean,
primary key(id_noti),
FOREIGN KEY (id_rider) REFERENCES riders(id_rider),
FOREIGN KEY (id_prov) REFERENCES proveedores(id_prov)
);
