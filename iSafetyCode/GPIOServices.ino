void initGPIO()
{
//  pinMode(ONBOARD_LED, OUTPUT);
//  digitalWrite(ONBOARD_LED, LOW);
  
  pinMode(DIGITAL_PIN2, OUTPUT);
  digitalWrite(DIGITAL_PIN2, LOW);
  
  pinMode(LED_BUILTIN, OUTPUT);
//  digitalWrite(LED_BUILTIN, HIGH);

  pinMode(Gas_analog, INPUT);
  
  pinMode(Gas_digital, INPUT);
  pinMode(flame,INPUT);

}

void turnOnDigitalPin(int digitalPin){
  digitalWrite(digitalPin, HIGH);
}

void turnOffDigitalPin(int digitalPin){
  digitalWrite(digitalPin, LOW);
}

int readAnalogPin()
{
  return analogRead(Gas_analog);  
}

int readDigitalPin(int digitaPin)
{
  return digitalRead(digitaPin);  
}
