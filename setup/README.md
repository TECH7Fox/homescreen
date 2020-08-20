# About Homescreen

## Features

**Homescreen** is a system to `automate`, `control` and `secure` your home.

### It can:
- automatically or manually toggle **433Mhz** switches
- Show ip camera's
- Show status of devices on your local network
- Event logging
- send **discord** notifications to your server
- Show custom messages
- Connect to your current **alarm** using a relay
- Show time and weather

## installation

Clone the repository:

    git clone --recursive git://github.com/TECH7Fox/homescreen.git

Run the install script:

    sudo bash homescreen/setup/install.sh 

Add `codesend` to www-data visudo:

    sudo visudo
    www-data ALL=NOPASSWD: /home/pi/433Utils/RPi_utils/codesend

### Discord

To send messages to a `discord` server,
create a wehbook and copy it into **config/.env** file:

    webhook = your_webhook

