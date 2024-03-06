drop database if exists joinvito;

create database joinvito;

use joinvito;

create table roles(
id_rol int auto_increment,
nombre varchar(15) not null,
primary key(id_rol)
);

insert into roles values(1,'admin');
insert into roles values(2,'rider');
insert into roles values(3,'centro');
insert into roles values(4,'proveedor');

create table usuarios(
id_usu int auto_increment,
email varchar(50) not null unique,
pass_usu varchar(255) not null,
id_rol int not null,
FOREIGN KEY (id_rol) REFERENCES roles(id_rol),
primary key(id_usu)
);

insert into usuarios values(1,'jean@prueba.com','prueba',2);
insert into usuarios values(2,'aleix2@prueba.com','prueba',4);
insert into usuarios values(3,'aleix3@prueba.com','prueba',4);
insert into usuarios values(4,'aleix4@prueba.com','prueba',4);

create table riders(
id_rider int auto_increment,
nombre varchar(50) not null,
primer_apellido varchar(100) not null,
latitud varchar(15),
longitud varchar(15),
FOREIGN KEY (id_rider) REFERENCES usuarios(id_usu),
primary key(id_rider)
);

insert into riders values(1,'Jean','Pol',null,null);

create table proveedores(
id_prov int auto_increment,
nombre varchar(50) not null,
primer_apellido varchar(100) not null,
nombre_negocio varchar(250) not null,
direccion varchar(250) not null,
piso varchar(30),
ciudad varchar(250) not null,
cp varchar(5) not null,
FOREIGN KEY proveedores(id_prov) REFERENCES usuarios(id_usu),
primary key(id_prov)
);

insert into proveedores values(1,'Pepe','Sanchez','Panaderia Pepe','Calle 1',null,'Barcelona','08830');
insert into proveedores values(2,'Antonio','Recio','Mariscos Recio','Calle 2',null,'Barcelona','08831');
insert into proveedores values(3,'Pepe','Gotera','Pepe Gotera S.A.','Calle 3',null,'Barcelona','08831');
insert into proveedores values(4,'Ofelia','Secre','Ofelia Secre S.A.','Calle 3',null,'Barcelona','08831');

create table centros(
id_centro int auto_increment,
nombre varchar(50) not null,
direccion varchar(250) not null,
piso varchar(30),
ciudad varchar(250) not null,
cp varchar(5) not null,
FOREIGN KEY (id_centro) REFERENCES usuarios(id_usu),
primary key(id_centro)
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

insert into menus values(1,'Agua','Ensalada','Jamon',1,2,'2024-02-28');
insert into menus values(2,'Cola','Pasta','Yogurt',1,3,'2024-02-28');
insert into menus values(3,'Vino','Flan','Yogurt',1,4,'2024-02-28');

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
id_usu int,
FOREIGN KEY (id_usu) REFERENCES usuarios(id_usu),
primary key(id_punto)
);

insert into puntos values(1,'Punto 1','Calle 1',41.3888845,2.1706315,1,null,'2024-02-27',null,10,'Proveedor',2);
insert into puntos values(2,'Punto 2','Calle 2',41.389289,2.1709058,1,null,'2024-02-27',null,10,'Proveedor',3);
insert into puntos values(3,'Punto 3','Calle 3',41.3558608,2.02883,1,null,'2024-02-27',null,10,'Proveedor',3);
insert into puntos values(4,'Punto 4','Calle 4',41.3758608,2.03883,1,null,'2024-02-27',null,10,'Proveedor',4);

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
id_fav int not null unique,
id_rider int not null,
id_proveedor int not null,
FOREIGN KEY (id_rider) REFERENCES riders(id_rider),
FOREIGN KEY (id_proveedor) REFERENCES proveedores(id_prov),
primary key(id_rider,id_proveedor)
);

insert into favoritos values(1,1,2);
insert into favoritos values(2,1,3);
insert into favoritos values(3,1,4);

create table notis(
id_noti int auto_increment unique,
mensaje varchar(250) not null,
id_fav int not null,
leido boolean,
FOREIGN KEY (id_fav) REFERENCES favoritos(id_fav),
primary key(id_fav)
);

insert into notis values (1, 'prueba', 1, false);
insert into notis values (2, 'prueba2', 2, true);
