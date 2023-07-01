CREATE DATABASE php_mysql_crud_lixy;

USE php_mysql_crud_lixy;

CREATE TABLE task(
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    descripcion TEXT,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



ALTER TABLE task ADD image LONGBLOB;

DESCRIBE task;
