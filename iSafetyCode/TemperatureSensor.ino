DHT dht(DIGITAL_PIN4, DHTTYPE);

float getHumidity(){
  return dht.readHumidity();
}

float getTemperature(){
  return dht.readTemperature();
}

float getTemperatureInFarenHeit(){
  // Read temperature as Fahrenheit (isFahrenheit = true)
  return dht.readTemperature(true);
}

float getHeatIndexInCelsius(){
  // Compute heat index in Fahrenheit (the default)
  float h = getHumidity();
  float f = getTemperatureInFarenHeit();
  return dht.computeHeatIndex(f, h);
}

float getHeatIndex(){
  // Compute heat index in Fahrenheit (the default)
  float h = getHumidity();
  float t = getTemperature();
  return dht.computeHeatIndex(t, h, false);
}
