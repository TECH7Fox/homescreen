# About Homescreen

**Homescreen** is a **touchscreen friendly** system to **automate**, **control** and **secure** your home.

## Features
- automatically or manually toggle **433Mhz** switches
- Show ip camera's
- Show status of devices on your local network
- Event logging
- send **discord** notifications to your server
- Show custom messages
- Connect to your current **alarm** using a relay
- Show time and weather

#
## Installation

Clone the repository:

    git clone --recursive git://github.com/TECH7Fox/homescreen.git

Run the install scripts:

    sudo bash homescreen/setup/install.sh 

### Permissions 
***option***

To control 433mhz switches, add `codesend` and `lights.py` to www-data visudo:

    sudo visudo

and add the following rules to the file:

    www-data ALL=NOPASSWD: /home/pi/433Utils/RPi_utils/codesend
    www-data ALL=NOPASSWD: /var/www/html/scripts/auto/lights.py

### Discord
***option***

To send messages to a `discord` server,
create a wehbook and copy it into **config/.env** file:

    webhook = your_webhook

#
## 24/7 Client
***option***

To create a 24/7 client, you need to autostart the website with the `chromium browser`.

    @xset s off
    @xset -dpms
    @xset s noblank
    @chromium-browser --kiosk http://localhost/

*If you dont want the screen to be on **all** the time, remove `@xset s off` and `@xset s noblank`.*

### Rotate screen 180°
***option***

If you have your screen mounted upside down, you need to edit the config file:

    sudo nano /boot/config.txt

And add the following line:

    display_rotate=2

*To rotate **90°** or **270°**, change the value. __90°__ is `1`, __180°__ is `2` and __270°__ is `3`* 

### Rotate touch 180°
***option***

If you have a touchscreen, you will also have to rotate the touchscreen input.

Go to the input configs:

    cd /usr/share/X11/xorg.conf.d/
    ls

Now look for the file that has a section with `Identifier ... touchscreen catchall`.
It will most likely have `evdev` or `libinput` in the title.

Once you found it, go to the `Identifier ... touchscreen catchall` section and add the correct `Option` to the bottom of the `Section`:

**90°**:
    
    Option "TransformationMatrix" "0 -1 1 1 0 0 0 0 1"

**180°**:

    Option "TransformationMatrix" "-1 0 1 0 -1 1 0 0 1"

**270°**:

    Option "TransformationMatrix" "0 1 0 -1 0 1 0 0 1"
