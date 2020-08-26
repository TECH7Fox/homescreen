
echo install system requirements
sed 's/#.*//' requirementsSystem.txt | xargs sudo apt-get install

echo install python requirements
pip install --requirement requirementsPython.txt

echo download 433Utils
cd /home/pi
git clone --recursive git://github.com/ninjablocks/433Utils.git

echo install 433Utils
cd 433Utils/RPi_utils
make

echo Install MySQL
sudo /usr/bin/mysql_secure_installation

echo Change permissions of mysql for PHP
sudo mysql --user=root --password
DROP USER root;
create user root@localhost identified by 'root';
grant all privileges on *.* to root@localhost;
FLUSH PRIVILEGES;
exit;

echo Create database, this might take a minute...
sudo mysql -uroot -proot < createdb.sql

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

echo 🚀 All ready to go!