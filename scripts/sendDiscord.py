import sys
import http.client

def send( message ):

    webhookurl = "https://discordapp.com/api/webhooks/663044973326893056/-uFPjN7ks2Qks7voSwp9q6b_SV1SxYQx7A7n0scyfTgVj79f9YdoKQl9VVem9oGdhfh_"
 
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