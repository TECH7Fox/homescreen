DROP DATABASE IF EXISTS homescreen; 
CREATE DATABASE homescreen; 
USE homescreen; 

DROP TABLE IF EXISTS settings; 
CREATE TABLE settings ( 
  name VARCHAR(30),
  value VARCHAR(100),
  PRIMARY KEY (name)
); 

DROP TABLE IF EXISTS loading_screens;
CREATE TABLE loading_screens (
  name VARCHAR(30),
  url VARCHAR(200),
  PRIMARY KEY (name)
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
  notification VARCHAR(50),
  timestamp TIMESTAMP,
  level INT,
  PRIMARY KEY (id)
); 

DROP TABLE IF EXISTS messages;
CREATE TABLE messages (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(50),
  message VARCHAR(100),
  details VARCHAR(50),
  date DATE,
  background VARCHAR(100),
  PRIMARY KEY (id)
);

INSERT INTO settings (name, value) VALUES ("alarm", "off");
INSERT INTO settings (name, value) VALUES ("keycode", "2c17079b4da72e80c1875f7d2feefe79322a71544c5de1c838ee0230f3598312");
INSERT INTO settings (name, value) VALUES ("vacation_mode", "off");
INSERT INTO settings (name, value) VALUES ("outdoor_lights", "off");
INSERT INTO settings (name, value) VALUES ("loading_screen", "fox");
INSERT INTO settings (name, value) VALUES ("cam_1", "Outdoor Dome Camera");
INSERT INTO settings (name, value) VALUES ("cam_2", "Outdoor Dome Camera");
INSERT INTO settings (name, value) VALUES ("cam_3", "Outdoor Dome Camera");
INSERT INTO settings (name, value) VALUES ("cam_4", "");

INSERT INTO loading_screens (name, url) VALUES ("fox", "assets/fox.gif");
INSERT INTO loading_screens (name, url) VALUES ("sphere", "assets/sphere.gif");
INSERT INTO loading_screens (name, url) VALUES ("loop", "assets/loop.gif");

INSERT INTO servers (type, name, ip, url) VALUES ("modem", "Connect Box Ziggo", "192.168.178.1", "192.168.178.11");
INSERT INTO servers (type, name, ip, url) VALUES ("cam", "Outdoor Dome Camera", "192.168.178.9", "http://192.168.178.10:8080/54fa5cc90312fbb7be0d206233fbe544/embed/r2knn1w6yK/olkrGJcEwA/fullscreen%7Cjquery");
INSERT INTO servers (type, name, ip, url) VALUES ("cam", "Outdoor WL Camera 2", "192.168.178.8", "none");
INSERT INTO servers (type, name, ip, url) VALUES ("cam", "Outdoor WL Camera 1", "192.168.178.7", "none");
INSERT INTO servers (type, name, ip, url) VALUES ("cctv", "Camera Recorder", "192.168.178.10", "192.168.178.10:8080");
INSERT INTO servers (type, name, ip, url) VALUES ("alarm", "Alarm System", "192.168.178.11", "192.168.178.11");

INSERT INTO messages (title, message, details, date, background) VALUES ("Gelukkig nieuw jaar!", "De beste wensen!", "2021-2022", "2020-05-30", "assets/firework.gif");
INSERT INTO messages (title, message, details, date, background) VALUES ("Fijne kerst!", "De beste wensen!", "2021-2022", "2020-05-31", "assets/christmas.gif");

INSERT INTO notifications (notification, timestamp, level) VALUES ("successfully created database!", now(), 1);