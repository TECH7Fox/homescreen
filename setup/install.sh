echo installing pkill
sudo apt-get install pkill

echo installing fping
sudo apt-get install fping

echo downloading 433Utils
cd /home/pi
git clone --recursive git://github.com/ninjablocks/433Utils.git

echo installing 433Utils
cd 433Utils/RPi_utils
make

echo Change permissions of 433Utils for PHP
#sudo chmod 707 ./codesend

echo Installing apache2
sudo apt-get install apache2

echo Installing PHP
sudo apt-get install php

echo Installing PHP-Apache2 mod
sudo apt-get install libapache2-mod-php

echo Installing MySQL
sudo apt-get install mysql-server
sudo /usr/bin/mysql_secure_installation

echo Change permissions of mysql for PHP
sudo mysql --user=root --password
DROP USER root
create user root@localhost identified by 'root';
grant all privileges on *.* to root@localhost;
FLUSH PRIVILEGES;
exit;

echo Installing mysql to php
sudo apt-get install php-mysql

echo Create database, this might take a minute...
sudo mysql -uroot -proot < createdb.sql

echo Installing python http
sudo pip install http

read -r -p "Do you want to run a client of this server? [y/N] " response
if [[ "$response" =~ ^([yY][eE][sS]|[yY])$ ]]
then
    #sudo nano /
fi

read -r -p "Do you want to rotate the touchscreen 180 degrees? [y/N] " response
if [[ "$response" =~ ^([yY][eE][sS]|[yY])$ ]]
then
    #sudo nano /
fi