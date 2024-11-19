CREATE DATABASE IF NOT EXISTS ibr_api;

USE ibr_api;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    email VARCHAR(255),
    company_name VARCHAR(255),
    street VARCHAR(255),
    lat FLOAT,
    lng FLOAT
);