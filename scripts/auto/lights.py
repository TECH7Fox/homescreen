import requests as req
import datetime
import time
import os

from astral import LocationInfo
from astral.sun import sun

city = LocationInfo("Amsterdam", "Netherlands", "Europe/Amsterdam")

while True:
    #resp = req.get("http://localhost/Alarm/api/lights.php")
    #time.sleep(1)
    #if resp.text == "on":
    #    os.system("/home/pi/433Utils/RPi_utils/codesend 5441")
    #elif resp.text == "off":
    #    os.system("/home/pi/433Utils/RPi_utils/codesend 5444")
    #elif resp.text == 'auto':
    #sun = city.sun(date=datetime.date.today(), local=True)
    s = sun(city.observer, date=datetime.date(2009, 4, 22))
    if datetime.datetime.now() >= s['sunset'].replace(tzinfo=None) or datetime.datetime.now() <= s['sunrise'].replace(tzinfo=None):
        os.system("/home/pi/433Utils/RPi_utils/codesend 5441")
    else:
        os.system("/home/pi/433Utils/RPi_utils/codesend 5444")

    print("")
    print("Sunrise: " + s['sunrise'].replace(tzinfo=None).strftime("%m/%d/%Y, %H:%M:%S"))
    print("Sunset: " + s['sunset'].replace(tzinfo=None).strftime("%m/%d/%Y, %H:%M:%S"))
    print("Current time: " + datetime.datetime.now().strftime("%m/%d/%Y, %H:%M:%S"))
    time.sleep(50)