CREATE DATABASE farm_db;

USE farm_db;

CREATE TABLE crops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NOT NULL
);
