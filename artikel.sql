CREATE DATABASE IF NOT EXISTS schoolbox;
USE schoolbox;

CREATE TABLE IF NOT EXISTS artikel (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titel VARCHAR(150) NOT NULL,
  beschreibung TEXT NOT NULL,
  preis DECIMAL(6,2) NOT NULL,
  bild_url TEXT NOT NULL,
  typ ENUM('kaufen', 'leihen') NOT NULL
);
