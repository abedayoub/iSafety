void API(){
   String httpRequestData = "clientid=" + ClientID + "&deviceid=" + DeviceID + "&temperature=" + getTemperature()
                          + "&humidity=" + getHumidity() + "&HeatIndex=" + getHeatIndex() + "&FlameFlag=" +FlameSensor() + "&SmokePPM=" +gazSensor()+"";
   if (client.connect(server, 80)) {
    Serial.println("connected to Local");
    //HTTP request for query.php:
    Serial.print("GET /query.php?");
    Serial.print(httpRequestData);
    client.print("GET /query.php?");     //YOUR URL
    client.print(httpRequestData);
    client.print(" ");      //SPACE BEFORE HTTP/1.1
    client.print("HTTP/1.1");
    client.println();
    client.println("Host: proven-interference.000webhostapp.com");
    client.println("Connection: close");
    client.println();
  } else {
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
  }
}
