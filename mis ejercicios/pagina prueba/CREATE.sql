CREATE TABLE cliente (
nif VARCHAR(9) PRIMARY KEY NOT NULL,
nombre VARCHAR(15) NOT NULL,
cuenta_bancaria VARCHAR(30) NOT NULL
)

CREATE TABLE compras(
nif varchar(9) NOT NULL,
id int(11) NOT NULL,
fecha date,
cantidad int(11) NOT NULL,
PRIMARY KEY(nif,id),
FOREIGN KEY (nif) REFERENCES cliente(nif),
FOREIGN KEY (id) REFERENCES almacen(idflor)
)

CREATE TABLE almacen(
idflor int(11) PRIMARY KEY NOT NULL,
precioflor int(11) NOT NULL,
cantflor int(11) NOT NULL
)