drop database if exists joinvito;

create database joinvito;

use joinvito;

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
bebida varchar(250),
plato1 varchar(250),
plato2 varchar(250),
cantidad_packs int not null,
id_prov int not null,
fecha_alta date not null,
FOREIGN KEY (id_prov) REFERENCES proveedores(id_prov),
primary key(id_menu)
);

create table puntos(
id_punto int auto_increment,
nombre varchar(50) not null,
direccion varchar(250) not null,
latitud varchar(15),
longitud varchar(15),
cantidad_personas int not null,
fecha_inactivo date,
fecha_alta date,
fecha_baja date,
puntos int not null,
tipo enum("Homeless","Centro","Proveedor"),
primary key(id_punto)
);

insert into puntos values(1,'Punto 1','Calle 1',41.3888845,2.1706315,1,null,'2024-02-27',null,10,'Centro');
insert into puntos values(2,'Punto 2','Calle 2',41.389289,2.1709058,1,null,'2024-02-27',null,10,'Centro');

create table pedidos(
id_pedido int auto_increment,
id_rider int not null,
id_menu int not null,
cantidad_packs int not null,
fecha date not null,
entregado_a_rider boolean not null,
FOREIGN KEY (id_rider) REFERENCES riders(id_rider),
FOREIGN KEY (id_menu) REFERENCES menus(id_menu),
primary key(id_pedido)
);

create table entregas(
id_entrega int auto_increment,
id_pedido int not null,
id_punto int not null,
cantidad_packs int not null,
fecha date not null,
entregado boolean,
FOREIGN KEY (id_punto) REFERENCES puntos(id_punto),
FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido),
primary key(id_entrega)
);

create table historico_entregas(
id_entrega int auto_increment,
id_pedido int not null,
id_punto int not null,
cantidad_packs int not null,
fecha date not null,
entregado boolean,
primary key(id_entrega)
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
id_fav int not null,
leido boolean,
FOREIGN KEY (id_fav) REFERENCES favoritos(id_fav),
primary key(id_noti)
);
