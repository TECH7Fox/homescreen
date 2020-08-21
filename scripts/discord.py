import sys
import http.client
import configparser

env = configparser.ConfigParser()

def send( message ):

    env.read("/var/www/html/config/.env")

    webhookurl = env["discord"]["webhook"]
 
    formdata = "------:::BOUNDARY:::\r\nContent-Disposition: form-data; name=\"content\"\r\n\r\n" + message + "\r\n------:::BOUNDARY:::--"
  
    connection = http.client.HTTPSConnection("discordapp.com")
    connection.request("POST", webhookurl, formdata, {
        'content-type': "multipart/form-data; boundary=----:::BOUNDARY:::",
        'cache-control': "no-cache",
        })
  
    response = connection.getresponse()
    result = response.read()
  
    return result.decode("utf-8")
    
print( send( sys.argv[1] ) )