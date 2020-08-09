import requests as req
import datetime
import time
import os
import json

from astral import LocationInfo
from astral.sun import sun

city = LocationInfo("Amsterdam", "Netherlands", "Europe/Amsterdam")
alarm = 0

while True:
    raw = req.get("http://localhost/api/lights.php")
    json_object = raw.json()

    for switch in json_object:
        if datetime.datetime.now() >= city.sun['sunset'].replace(tzinfo=None) or datetime.datetime.now() <= city.sun['sunrise'].replace(tzinfo=None):
            if switch["value"] == "auto_alarm":
                if alarm != 1:
                    os.system("/home/pi/433Utils/RPi_utils/codesend " + switch["on_code"]) #turn on
                    print("turned on by alarm check")
            else:
                os.system("/home/pi/433Utils/RPi_utils/codesend " + switch["on_code"]) #turn on
        else:
            os.system("/home/pi/433Utils/RPi_utils/codesend " + switch["off_code"]) #turn off


    #s = sun(city.observer, date=datetime.date(2009, 4, 22))
    #if datetime.datetime.now() >= city.sun['sunset'].replace(tzinfo=None) or datetime.datetime.now() <= city.sun['sunrise'].replace(tzinfo=None):
    #    os.system("/home/pi/433Utils/RPi_utils/codesend 5441") #turn on
    #else:
    #    os.system("/home/pi/433Utils/RPi_utils/codesend 5444") #turn off

    print("")
    print("Sunrise: " + city.sun['sunrise'].replace(tzinfo=None).strftime("%m/%d/%Y, %H:%M:%S"))
    print("Sunset: " + city.sun['sunset'].replace(tzinfo=None).strftime("%m/%d/%Y, %H:%M:%S"))
    print("Current time: " + datetime.datetime.now().strftime("%m/%d/%Y, %H:%M:%S"))
    time.sleep(50)