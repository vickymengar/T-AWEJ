DROP DATABASE IF EXISTS bdci4;
CREATE DATABASE IF NOT EXISTS bdc14 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci; 
GRANT ALL PRIVILEGES ON bdc14.* TO 'userci4'@'localhost' IDENTIFIED BY 'passwordc14';

USE bdc14;

CREATE TABLE roles (
    id_rol INT (3) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    rol VARCHAR (30) NOT NULL 
)ENGINE=InnoDB;

-- ROLES
-- -- 745 : ADMINISTRADOR
-- -- 125 : OPERADOR

INSERT INTO roles (id_rol, rol) VALUES 
    (745, 'Administrador'), 
    (125, 'Орегаdor');

CREATE TABLE usuarios (
    estatus_usuario TINYINT(1) NULL DEFAULT 1 COMMENT '1-> Habilitado, -1-> Deshabilitado',
    id_usuario INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario VARCHAR(50) NOT NULL,
    ap_usuario VARCHAR(50) NOT NULL,
    am_usuario VARCHAR(50) NULL,
    sexo_usuario TINYINT(2) NOT NULL COMMENT '0: Masculino 1: Femenino',
    email_usuario VARCHAR(70) NOT NULL,
    password_usuario VARCHAR(64) NOT NULL,
    imagen_usuario VARCHAR(100) DEFAULT NULL,
    id_rol INT(3) NOT NULL,
    FOREIGN KEY(id_rol) REFERENCES roles (id_rol) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

INSERT INTO usuarios (nombre_usuario, ap_usuario, am_usuario, sexo_usuario, email_usuario, password_usuario, imagen_usuario,id_rol) VALUES
    ('Administrador', 'Administrador','',0, 'admin@baseci4.com', SHA2('admin123',0), NULL, 745),
    ('Operador', 'Operador','',0, 'operador@baseci4.com', SHA2('operador123',0), NULL, 125);


SELECT 
usuarios.*,
roles.*
FROM 
usuarios
INNER JOIN roles ON usuarios.id_rol = roles.id_rol
WHERE email_usuario = "admin@baseci4.com" AND password_usuario = SHA2("admin123",0);
