create database socialManiakoDB;
use socialManiakoDB;
/* La tabla users es la tabla principal del sistema
	estado_chat 1->offline, 2->online
esta tiene q cambiar cuando el usuario salga o cierre el navegador a estado 2
y cuando inicie a pasar a estado 1 
 */
create table users(
	id int(11) not null auto_increment primary key,
	nombre varchar(50),
	apellido varchar(50),
	username varchar(50) UNIQUE,
	correo varchar(255) UNIQUE,
	pass varchar(60),
	fecha_de_creacion datetime DEFAULT CURRENT_TIMESTAMP,
	estado_chat int(1) default 2
);

/* La tabla privacidad sirve para guardar los niveles de distribución de las publicaciones, 
por ejemplo las publicaciones publicas las pueden ver todos aunque no sean amigos, Amigos: 
solo mis amigos, Amigos de mis amigos, para restringir perfiles,  
valor: 1->solo yo, 2->solo amigos, 3->amigos de amigos, 4->publico.
*/
create table privacidad(
	id int(11) not null auto_increment primary key,
	detalle varchar(50),
	valor int(1)
);

/* Sirve para almacenas los países que seleccionan los usuarios en su perfil. 
	Prefijo ejemplo: 
		salvador (SV)->Prefijo
		mexico   (MX)->Prefijo
*/
create table pais(
	id int(11) not null auto_increment primary key,
	pais varchar(75),
	prefijo varchar(50)
);

/* tabla sentimental (estado sentimaental de la persona) */
create table sentimental(
	id int(11) not null auto_increment primary key,
	name varchar(50)
);

/* tabla perfil esta tabla contendra informacion mas detallada del usuario 
	bio_des-> descripcion del perfil.
*/
create table perfil(
id int(11) not null auto_increment primary key,
	dia_de_cumple date ,
	genero varchar(1) ,
	id_pais int(11),
	bio_des varchar(255),
	direccion varchar(255) ,
	telefono varchar(255) ,
	id_users int(11),
	id_sentimental int(11) ,
	foreign key (id_sentimental) references sentimental(id),
	foreign key (id_pais) references pais(id),
	foreign key (id_users) references users(id)
);

/* tabla album para las fotos con restrinciones de vistas privacidad */
create table album(
	id int(11) not null auto_increment primary key,
	title varchar(200),
	descripcion varchar(500),
	id_users int(11),
	id_privacidad int(11),
	fecha_De_creacion datetime DEFAULT CURRENT_TIMESTAMP,
	foreign key (id_users) references users(id),
	foreign key (id_privacidad) references privacidad(id)
);
/* Tabla de megusta_album
	megusta-> 1
	2->no hay megusta
 */
CREATE TABLE megusta_album(
id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
     id_album int(11) NOT NULL,
    FOREIGN KEY (id_album) REFERENCES album(id),
 id_users int(11) NOT NULL,
    FOREIGN KEY (id_users) REFERENCES users(id),
megusta_o_no int(1) default '2',
    fecha DateTime DEFAULT CURRENT_TIMESTAMP
);



/* tabla img_perfil  aqui estaran guardadas todas las imagenes del usuario y el estado ayudara a saber si esta activa como de perfi o solol como una imagen mas que 

pasara a su galeria.
estados : 1->uso, 2->galeria, 3->eliminada.
*/
create table img_perfil(
id int(11) not null auto_increment primary key,
img varchar(255),
titulo varchar(255),
descripcion varchar(500),
id_users int(11),
estado int(1),
foreign key (id_users) references users(id),
id_album int(11),
foreign key (id_album) references album(id),
id_privacidad int(11),
foreign key (id_privacidad) references privacidad(id),
fecha_De_subida datetime DEFAULT CURRENT_TIMESTAMP
);
/* Tabla de megusta_img_perfil
	megusta-> 1
	2->no hay megusta
 */
CREATE TABLE megusta_img_perfil(
id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
     id_img_perfil int(11) NOT NULL,
    FOREIGN KEY (id_img_perfil) REFERENCES img_perfil(id),
 id_users int(11) NOT NULL,
    FOREIGN KEY (id_users) REFERENCES users(id),
megusta_o_no int(1) default '2',
    fecha DateTime DEFAULT CURRENT_TIMESTAMP
);


/* tabla img_portada  aqui estaran guardadas todas las imagenes del usuario y el estado ayudara a saber si esta activa como de portada o solo como una imagen mas que 

pasara a su galeria.
estados : 1->uso, 2->galeria, 3->eliminada.
*/
create table portada(
id int(11) not null auto_increment primary key,
img varchar(255),
titulo varchar(255),
descripcion varchar(500),
id_users int(11),
estado int(1),
foreign key (id_users) references users(id),
id_album int(11),
foreign key (id_album) references album(id),
id_privacidad int(11),
foreign key (id_privacidad) references privacidad(id),
fecha_De_subida datetime DEFAULT CURRENT_TIMESTAMP
);
/* Tabla de megusta_comentario
	megusta-> 1
	2->no hay megusta
 */
CREATE TABLE megusta_portada(
id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
     id_portada int(11) NOT NULL,
    FOREIGN KEY (id_portada) REFERENCES portada(id),
 id_users int(11) NOT NULL,
    FOREIGN KEY (id_users) REFERENCES users(id),
megusta_o_no int(1) default '2',
    fecha DateTime DEFAULT CURRENT_TIMESTAMP
);


/* tabla publicacion 
	aqui se aran las publicaciones 
*/
CREATE TABLE publicacion (
id char(15) PRIMARY KEY NOT NULL,
    titulo varchar(250),
    publicacion TEXT NOT NULL,
    fecha_hora DateTime DEFAULT CURRENT_TIMESTAMP,
    id_users int(11) NOT NULL,
    FOREIGN KEY (id_users) REFERENCES users (id),
    estadoPublicacion int(1) NOT NULL DEFAULT '1'
);

/* detalle img se encarga de las imagenes subida en la publicacion */
CREATE TABLE detalle_img (
id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_publicacion char(15) DEFAULT NULL,
    img varchar(80) NOT NULL,
    id_users int(11),
    FOREIGN KEY (id_publicacion) REFERENCES publicacion (id),
    FOREIGN KEY (id_users) REFERENCES users (id)
);

/* tabla de comentarios esto nos ayudara q una publicacion sea mas interactiva*/
CREATE TABLE comentario (
id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_publicacion char(15) NOT NULL,
    FOREIGN KEY (id_publicacion) REFERENCES publicacion (id),
    id_users int(11) NOT NULL,
    FOREIGN KEY (id_users) REFERENCES users (id),
    comentario TEXT NOT NULL,
    fecha DateTime DEFAULT CURRENT_TIMESTAMP,
    estadoComentario int(1) NOT NULL DEFAULT '2'
);
/* Tabla de megusta_comentario
	megusta-> 1
	2->no hay megusta
 */
CREATE TABLE megusta_comentario(
id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
     id_comentario int(11) NOT NULL,
    FOREIGN KEY (id_comentario) REFERENCES comentario(id),
 id_users int(11) NOT NULL,
    FOREIGN KEY (id_users) REFERENCES users(id),
megusta_o_no int(1) default '2',
    fecha DateTime DEFAULT CURRENT_TIMESTAMP
);


/* tabla responcomentario Responder a otro comentario  */
CREATE TABLE responcomentario(
id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_comentario int(11) NOT NULL,
    FOREIGN KEY (id_comentario) REFERENCES comentario (id),
usuarioComentario int(11) NOT NULL,
    FOREIGN KEY (usuarioComentario) REFERENCES users (id),
    coment TEXT NOT NULL,
    fecha DateTime DEFAULT CURRENT_TIMESTAMP,
    estadoComentario int(1) NULL DEFAULT '1'
);
/* Tabla de megusta_responcomentario
	megusta-> 1
	2->no hay megusta
 */
CREATE TABLE megusta_responcomentario(
id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
     id_responcomentario int(11) NOT NULL,
    FOREIGN KEY (id_responcomentario) REFERENCES responcomentario(id),
 id_users int(11) NOT NULL,
    FOREIGN KEY (id_users) REFERENCES users(id),
megusta_o_no int(1) default '2',
    fecha DateTime DEFAULT CURRENT_TIMESTAMP
);


/* Tabla res_com_com, Responder a otro comentario que esto ara otro sub comentario  */
CREATE TABLE res_com_com(
id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_responcomentario int(11) NOT NULL,
    FOREIGN KEY (id_responcomentario) REFERENCES responcomentario (id),
usuarioComentario int(11) NOT NULL,
    FOREIGN KEY (usuarioComentario) REFERENCES users (id),
    coment TEXT NOT NULL,
    fecha DateTime DEFAULT CURRENT_TIMESTAMP,
    estadoComentario int(1) NULL DEFAULT '1'
);
/* Tabla de megusta_res_com_com
	megusta-> 1
	2->no hay megusta
 */
CREATE TABLE megusta_res_com_com(
id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
     id_res_com_com int(11) NOT NULL,
    FOREIGN KEY (id_res_com_com) REFERENCES res_com_com(id),
 id_users int(11) NOT NULL,
    FOREIGN KEY (id_users) REFERENCES users(id),
megusta_o_no int(1) default '2',
    fecha DateTime DEFAULT CURRENT_TIMESTAMP
);

/* Tabla de megusta
	megusta-> 1
	dismegusta-> 2
 */
CREATE TABLE megusta_publicacion(
id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
     id_publicacion char(15) NOT NULL,
    FOREIGN KEY (id_publicacion) REFERENCES publicacion(id),
 id_users int(11) NOT NULL,
    FOREIGN KEY (id_users) REFERENCES users(id),
megusta_o_dismegusta int(1) default '2',
    fecha DateTime DEFAULT CURRENT_TIMESTAMP
);


/* Tabla de seguidores 
	sigue -> 1
	dejo de seguirlo -> 2
*/
CREATE TABLE seguidores(
id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
id_users int(11) NOT NULL,
FOREIGN KEY (id_users) REFERENCES users(id),
seguidor int(1) default '2',
fecha DateTime DEFAULT CURRENT_TIMESTAMP
);

/* Tabla contactos
estado   1->menu activo, 2->menu desactivado
 */
CREATE TABLE contactos (
id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
hotmail varchar(250),
gmail varchar(250),
youtube varchar(250),
twitter varchar(250),
instagram varchar(250),
estado int(1) NULL DEFAULT '1'
);

/* tabla amigos 
	estado_amigo 1->son amigos, 2->no son amigos
	users_sen -> usuario quien eniva la solicitud
	users_res -> usuario quien resibe la solicitud
*/
create table amigos (
	id int(11) not null auto_increment primary key,
	users_sen int(11),
	users_res int(11),
	estado_amigo int(1) default '2',
fecha DateTime DEFAULT CURRENT_TIMESTAMP,
	foreign key (users_sen) references users(id),
	foreign key (users_res) references users(id)
);

/* ******************* CHAT ********************* */
/* tabla chat_inicio qui estaran iniciando cada chat 
estado_chat 1->inicializada, 2->eliminada
*/
create table chat_inicio(
	id int(11) not null auto_increment primary key,
	users_sen int(11),
	users_res int(11),
fecha DateTime DEFAULT CURRENT_TIMESTAMP,
estado_chat int(1) default '1',
	foreign key (users_sen) references users(id),
	foreign key (users_res) references users(id)
);

/* tabla mensajes
	estado 1->enviado, 2->leido, 3->eliminado
 */
create table mensajes(
	id int(11) not null auto_increment primary key,
	id_chat_inicio int(11),
	mensajes text,
estado_mensaje int(1) default '1',
	foreign key (id_chat_inicio) references chat_inicio(id)
);

/* tabla mensajes img para q la conversacion tenga envio de mensajes
estado 1->enviado, 2->leido, 3->eliminado
 */
create table mensajes_img(
	id int(11) not null auto_increment primary key,
	id_mensajes int(11),
	img text,
estado_img int(1) default '1',
	foreign key (id_mensajes) references mensajes(id)
);


/* tabla mensajes archivos para q la conversacion tenga envio de archivos
estado 1->enviado, 2->leido, 3->eliminado
 */
create table mensajes_archivos(
	id int(11) not null auto_increment primary key,
	id_mensajes int(11),
	archivo text,
estado_archivos int(1) default '1',
	foreign key (id_mensajes) references mensajes(id)
);


/* tabla mensajes audios para q la conversacion tenga envio de audios
estado 1->enviado, 2->leido, 3->eliminado
 */
create table mensajes_audios(
	id int(11) not null auto_increment primary key,
	id_mensajes int(11),
	audios text,
estado_audios int(1) default '1',
	foreign key (id_mensajes) references mensajes(id)
);