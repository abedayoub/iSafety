#define MESSAGE_MAX_LEN 256

void blinkBI(){
  int count=0;
  while(count<3){
    digitalWrite(LED_BUILTIN, HIGH); // turn the LED on (HIGH is the voltage level)
    delay(50); // wait for a second
    digitalWrite(LED_BUILTIN, LOW); // turn the LED off by making the voltage LOW
    delay(50);
    count++;
  }
}
