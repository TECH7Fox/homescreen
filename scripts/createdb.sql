DROP DATABASE IF EXISTS homescreen; 
CREATE DATABASE homescreen; 
USE homescreen; 

DROP TABLE IF EXISTS settings; 
CREATE TABLE settings ( 
  name VARCHAR(30),
  value VARCHAR(100),
  PRIMARY KEY (name)
); 

DROP TABLE IF EXISTS switches;
CREATE TABLE switches (
  location VARCHAR(30),
  type VARCHAR(30),
  status BIT,
  value VARCHAR(10),
  on_code SMALLINT,
  off_code SMALLINT
);

DROP TABLE IF EXISTS loading_screens;
CREATE TABLE loading_screens (
  name VARCHAR(30),
  url VARCHAR(200),
  PRIMARY KEY (name)
);

DROP TABLE IF EXISTS scripts;
CREATE TABLE scripts (
  name VARCHAR(30),
  type VARCHAR(30),
  path VARCHAR(100),
  status BIT,
  pid SMALLINT,
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
  permanent BIT,
  title VARCHAR(50),
  message VARCHAR(100),
  date DATE,
  background VARCHAR(100),
  PRIMARY KEY (id)
);

INSERT INTO settings (name, value) VALUES ("alarm", "off");
INSERT INTO settings (name, value) VALUES ("keycode", "2c17079b4da72e80c1875f7d2feefe79322a71544c5de1c838ee0230f3598312");
INSERT INTO settings (name, value) VALUES ("loading_screen", "fox");
INSERT INTO settings (name, value) VALUES ("cam_1", "Outdoor Dome Camera");
INSERT INTO settings (name, value) VALUES ("cam_2", "Outdoor Dome Camera");
INSERT INTO settings (name, value) VALUES ("cam_3", "");
INSERT INTO settings (name, value) VALUES ("cam_4", "");

INSERT INTO switches (location, type, status, value, on_code, off_code) VALUES ("garden",  "light", 0, "manual", 1234, 1237);
INSERT INTO switches (location, type, status, value, on_code, off_code) VALUES ("outside", "light", 0, "manual", 1234, 1237);
INSERT INTO switches (location, type, status, value, on_code, off_code) VALUES ("desk",    "light", 0, "manual", 6273, 6276);
INSERT INTO switches (location, type, status, value, on_code, off_code) VALUES ("closet",  "light", 0, "manual", 6511, 6514);
INSERT INTO switches (location, type, status, value, on_code, off_code) VALUES ("couch",   "light", 0, "manual", 1234, 1237);
INSERT INTO switches (location, type, status, value, on_code, off_code) VALUES ("kitchen", "light", 0, "manual", 1234, 1237);
INSERT INTO switches (location, type, status, value, on_code, off_code) VALUES ("piano",   "light", 0, "manual", 1234, 1237);
INSERT INTO switches (location, type, status, value, on_code, off_code) VALUES ("tv",      "light", 0, "manual", 1234, 1237);

INSERT INTO loading_screens (name, url) VALUES ("fox", "assets/fox.gif");
INSERT INTO loading_screens (name, url) VALUES ("sphere", "assets/sphere.gif");
INSERT INTO loading_screens (name, url) VALUES ("loop", "assets/loop.gif");

INSERT INTO scripts (name, type, path, status, pid) VALUES ("lights", "python", "/var/www/html/scripts.py", 0, 0000);

INSERT INTO servers (type, name, ip, url) VALUES ("modem", "Connect Box Ziggo", "192.168.178.1", "192.168.178.11");
INSERT INTO servers (type, name, ip, url) VALUES ("cam", "Outdoor Dome Camera", "192.168.178.9", "http://192.168.178.10:8080/54fa5cc90312fbb7be0d206233fbe544/embed/r2knn1w6yK/olkrGJcEwA/fullscreen%7Cjquery");
INSERT INTO servers (type, name, ip, url) VALUES ("cam", "Outdoor WL Camera 2", "192.168.178.8", "none");
INSERT INTO servers (type, name, ip, url) VALUES ("cam", "Outdoor WL Camera 1", "192.168.178.7", "none");
INSERT INTO servers (type, name, ip, url) VALUES ("cctv", "Camera Recorder", "192.168.178.10", "192.168.178.10:8080");
INSERT INTO servers (type, name, ip, url) VALUES ("alarm", "Alarm System", "192.168.178.11", "192.168.178.11");

INSERT INTO messages (permanent, title, message, date, background) VALUES (1, "Gelukkig nieuw jaar!", "De beste wensen!", "2020-05-30", "firework.gif");
INSERT INTO messages (permanent, title, message, date, background) VALUES (1, "Fijne kerst!", "De beste wensen!", "2020-05-31", "christmas.gif");

INSERT INTO notifications (notification, timestamp, level) VALUES ("successfully created database!", now(), 1);