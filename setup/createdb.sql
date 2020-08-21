DROP DATABASE IF EXISTS homescreen; 
CREATE DATABASE homescreen; 
USE homescreen; 

DROP TABLE IF EXISTS switches;
CREATE TABLE switches (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(30),
  type VARCHAR(30),
  status BIT,
  value VARCHAR(10),
  on_code SMALLINT,
  off_code SMALLINT,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS servers; 
CREATE TABLE servers ( 
  type VARCHAR(10),
  name VARCHAR(30),
  ip VARCHAR(30),
  url VARCHAR(200),
  PRIMARY KEY (name)
); 

DROP TABLE IF EXISTS notifications; 
CREATE TABLE notifications (
  id INT NOT NULL AUTO_INCREMENT,
  notification VARCHAR(500),
  timestamp TIMESTAMP,
  level INT,
  PRIMARY KEY (id)
); 

DROP TABLE IF EXISTS messages;
CREATE TABLE messages (
  id INT NOT NULL AUTO_INCREMENT,
  permanent TINYINT,
  title VARCHAR(50) NOT NULL,
  message VARCHAR(100),
  date DATE,
  background VARCHAR(100),
  PRIMARY KEY (id)
);

INSERT INTO switches (name, type, status, value, on_code, off_code) VALUES ("jordyDesk", "light", 0, "manual", 6273, 6276);
INSERT INTO switches (name, type, status, value, on_code, off_code) VALUES ("jordyCloset", "light", 0, "manual", 6511, 6514);
INSERT INTO switches (name, type, status, value, on_code, off_code) VALUES ("outside", "light", 0, "manual", 5441, 5444);

INSERT INTO servers (type, name, ip, url) VALUES ("server", "Connect Box Ziggo", "192.168.178.1", "192.168.178.1");
INSERT INTO servers (type, name, ip, url) VALUES ("camera", "Dome Camera", "192.168.178.9", "http://192.168.178.10:8080/54fa5cc90312fbb7be0d206233fbe544/embed/r2knn1w6yK/olkrGJcEwA/fullscreen%7Cjquery");
INSERT INTO servers (type, name, ip, url) VALUES ("camera", "WL Camera 2", "192.168.178.8", "none");
INSERT INTO servers (type, name, ip, url) VALUES ("camera", "WL Camera 1", "192.168.178.7", "none");
INSERT INTO servers (type, name, ip, url) VALUES ("cctv", "Camera Recorder", "192.168.178.10", "192.168.178.10:8080");
INSERT INTO servers (type, name, ip, url) VALUES ("alarm", "Alarm System", "192.168.178.11", "192.168.178.11");

INSERT INTO messages (permanent, title, message, date, background) VALUES (0, "Alarm systeem online", "Welkom bij het nieuwe alarm systeem, versie 3.", CURDATE(), "confetti.gif");
INSERT INTO messages (permanent, title, message, date, background) VALUES (1, "Gelukkig nieuw jaar!", "De beste wensen!", "2020-01-01", "firework.gif");
INSERT INTO messages (permanent, title, message, date, background) VALUES (1, "Fijne kerst!", "De beste wensen!", "2020-11-25", "christmas.gif");
INSERT INTO messages (permanent, title, message, date, background) VALUES (1, "Fijne verjaardag Jordy!", "", "2003-02-08", "confetti.gif");
INSERT INTO messages (permanent, title, message, date, background) VALUES (1, "Fijne verjaardag Ben!", "", "1961-02-13", "confetti.gif");
INSERT INTO messages (permanent, title, message, date, background) VALUES (1, "Fijne verjaardag Birgit!", "", "1967-01-06", "confetti.gif");

INSERT INTO notifications (notification, timestamp, level) VALUES ("successfully created database!", now(), 1);