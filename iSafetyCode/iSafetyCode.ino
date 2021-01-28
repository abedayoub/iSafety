#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>

#include <Wire.h>
#include <SPI.h>
#include <DHT.h>
#include <TimeLib.h>
#include <NtpClientLib.h>
#include "ESP8266Helpers.h"
WiFiClient client;
HTTPClient http;


//
//#define NTP_TIMEOUT 1500
//
////NTP Settings
//int8_t timeZone = 2;
//int8_t minutesTimeZone = 0;
//const PROGMEM char *ntpServer = "pool.ntp.org";
//boolean syncEventTriggered = false; // True if a time even has been triggered
//NTPSyncEvent_t ntpEvent; // Last triggered event


// Replace with your network credentials
const char* WIFI_USER = "Ayoub";
const char* WIFI_PWD = "Ayoub1927";

bool autoConnect = false;
bool autoReconnect = true;

// REPLACE with your Domain name and URL path or IP address with path
const char* server= "https://proven-interference.000webhostapp.com";

// Keep this API Key value to be compatible with the PHP code provided in the project page. 
// If you change the apiKeyValue value, the PHP file /post-esp-data.php also needs to have the same key 

String ClientID = "123456";
String DeviceID = "2";
String sensorLocation = "Kitchen";
String sensorName = "NodeMCU";
void setup() {
  Serial.begin(115200);
  initGPIO();
  initSerialPort();
  initWiFi(WIFI_USER, WIFI_PWD);
   //Initialize NTP
//  NTP.onNTPSyncEvent ([](NTPSyncEvent_t event) {
//      ntpEvent = event;
//      syncEventTriggered = true;
//  });
//
//  NTP.setInterval (63);
//  NTP.setNTPTimeout (NTP_TIMEOUT);
//  NTP.begin (ntpServer, timeZone, true, minutesTimeZone);

}

void loop() {
  //Check WiFi connection status
  if(WiFi.status()== WL_CONNECTED){
    if(WiFi.isConnected())
  {
    blinkBI();
//    if (syncEventTriggered) {
//        processSyncEvent (ntpEvent);
//        syncEventTriggered = false;
//    }
//    
    // Display connection state via LED 
    turnOnDigitalPin(DIGITAL_PIN2);
    API();
    
// 
//    // Your Domain name with URL path or IP address with path
//    http.begin(serverName);
//    
//    // Specify content-type header
//    http.addHeader("Content-Type", "text/plain");

    
    // Prepare your HTTP POST request data
    //clientid=123&deviceid=10&temperature=25&humidity=60&HeatIndex=5&FlameFlag=1&SmokePPM=1000
//    String httpRequestData = "clientid=" + ClientID + "&deviceid=" + DeviceID + "&temperature=" + getTemperature()
//                          + "&humidity=" + getHumidity() + "&HeatIndex=" + getHeatIndex() + "&FlameFlag=" +FlameSensor() + "&SmokePPM=" +gazSensor()+"";
//  String httpRequestData = "clientid=123&deviceid=10&temperature=25&humidity=60&HeatIndex=5&FlameFlag=1&SmokePPM=1000";
//    Serial.print("httpRequestData: ");
//    Serial.println(httpRequestData);
//    
    // You can comment the httpRequestData variable above
    //String httpRequestData = "api_key=tPmAT5Ab3j7F9&sensor=BME280&location=Office&value1=24.75&value2=49.54&value3=1005.14";
    // then, use the httpRequestData variable below (for testing purposes without the BME280 sensor)
   
    // Send HTTP POST request
//    int httpResponseCode = http.POST(httpRequestData);
     
    // If you need an HTTP request with a content type: text/plain
    //http.addHeader("Content-Type", "text/plain");
    //int httpResponseCode = http.POST("Hello, World!");
    
    // If you need an HTTP request with a content type: application/json, use the following:
    //http.addHeader("Content-Type", "application/json");
    //int httpResponseCode = http.POST("{\"value1\":\"19\",\"value2\":\"67\",\"value3\":\"78\"}");
        
//    if (httpResponseCode>0) {
//      Serial.print("HTTP Response code: ");
//      Serial.println(httpResponseCode);
//    }
//    else {
//      Serial.print("Error code: ");
//      Serial.println(httpResponseCode);
//    }
//    // Free resources
//    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
  //Send an HTTP POST request every 30 seconds
  
  }else{
    reConnectWiFi();
  }
    delay(1000);
}
