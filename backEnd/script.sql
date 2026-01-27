DROP DATABASE Cinema;
CREATE DATABASE Cinema; 

-- DROP TABLE IF EXIST movies;
-- DROP TABLE IF EXIST rooms;
-- DROP TABLE IF EXIST screenings;
USE Cinema;

CREATE TABLE movies( 
  id INT AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  duration INT NOT NULL, 
  release_year INT NOT NULL,
  genre VARCHAR(255),
  director VARCHAR(255),
  created_at DATETIME,
  updated_at DATETIME,
  PRIMARY KEY (id)
  );


CREATE TABLE rooms (
  id INT AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  capacity INT NOT NULL,
  type VARCHAR(255),
  active boolean NOT NULL,
  updated_at DATETIME,
  PRIMARY KEY (id)
);

CREATE TABLE screenings (
  id INT AUTO_INCREMENT,
  movie_id INT NOT NULL,
  room_id INT NOT NULL,
  start_time DATETIME NOT NULL,
  created_at DATETIME,
  PRIMARY KEY (id),
  FOREIGN KEY (movie_id) REFERENCES movies(id),
  FOREIGN KEY (room_id) REFERENCES rooms(id)
);

