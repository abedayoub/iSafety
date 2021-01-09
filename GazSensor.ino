


int gazSensor(){
  int gassensorAnalog = analogRead(Gas_analog);
  int gassensorDigital = digitalRead(Gas_digital);

//  Serial.print("Gas Sensor: ");
//  Serial.print(gassensorAnalog);
//  Serial.print("\t");
//  Serial.print("Gas Class: ");
//  Serial.print(gassensorDigital);
//  Serial.print("\t");
//  Serial.print("\t");
  
  return gassensorAnalog;
}
