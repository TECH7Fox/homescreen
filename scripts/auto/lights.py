import requests as req
from datetime import datetime
import time
import os
import json
import configparser

from astral import LocationInfo
from astral.sun import sun

city = LocationInfo("Amsterdam", "Netherlands", "Europe/Amsterdam")
s = sun(city.observer, date=datetime.now())

env = configparser.ConfigParser()

while True:
    raw = req.get("http://localhost/api/lights.php")
    json_object = raw.json()

    env.read("/var/www/html/config/.env")

    for switch in json_object:
        if datetime.now() >= s['sunset'].replace(tzinfo=None) or datetime.now() <= s['sunrise'].replace(tzinfo=None):
            if switch["value"] == "auto_alarm":
                if env["alarm"]["armed"] != 1:
                    os.system(["paths"]["433Utils"] + "/433Utils/RPi_utils/codesend " + switch["on_code"])
                    print("turn light on")
            else:
                os.system(env["paths"]["433Utils"] + "/433Utils/RPi_utils/codesend " + switch["on_code"])
                print("turn light on")
        else:
            os.system(env["paths"]["433Utils"] + "/433Utils/RPi_utils/codesend " + switch["off_code"])
            print("turn light off")

    print("")
    print("Sunrise: " + s['sunrise'].replace(tzinfo=None).strftime("%m/%d/%Y, %H:%M:%S"))
    print("Sunset: " + s['sunset'].replace(tzinfo=None).strftime("%m/%d/%Y, %H:%M:%S"))
    print("Current time: " + datetime.now().strftime("%m/%d/%Y, %H:%M:%S"))
    time.sleep(50)