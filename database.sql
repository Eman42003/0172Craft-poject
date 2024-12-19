CREATE DATABASE my_database;

USE my_database;

CREATE TABLE categories (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    image VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO categories (name, image) VALUES
('Resin', 'resin.png'),
('Pride', 'pride.png'),
('Concrete', 'concrete.png'),
('Mirrors', 'mirrors.png');