import requests as req
from astral import Astral
import datetime
import time
import os

city_name = 'Amsterdam'
a = Astral()
a.solar_depression = 'civil'
city = a[city_name]

while True:
    #resp = req.get("http://localhost/Alarm/api/lights.php")
    #time.sleep(1)
    #if resp.text == "on":
    #    os.system("/home/pi/433Utils/RPi_utils/codesend 5441")
    #elif resp.text == "off":
    #    os.system("/home/pi/433Utils/RPi_utils/codesend 5444")
    #elif resp.text == 'auto':
    sun = city.sun(date=datetime.date.today(), local=True)
    if datetime.datetime.now() >= sun['sunset'].replace(tzinfo=None) or datetime.datetime.now() <= sun['sunrise'].replace(tzinfo=None):
        os.system("/home/pi/433Utils/RPi_utils/codesend 5441")
    else:
        os.system("/home/pi/433Utils/RPi_utils/codesend 5444")
        
    print("")
    print("Sunrise: " + sun['sunrise'].replace(tzinfo=None).strftime("%m/%d/%Y, %H:%M:%S"))
    print("Sunset: " + sun['sunset'].replace(tzinfo=None).strftime("%m/%d/%Y, %H:%M:%S"))
    print("Current time: " + datetime.datetime.now().strftime("%m/%d/%Y, %H:%M:%S"))
    time.sleep(50)