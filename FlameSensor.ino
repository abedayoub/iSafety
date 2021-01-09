int FlameFlag = HIGH;
int FlameSensor(){
  int res=1;
  FlameFlag = digitalRead(flame);
  if (FlameFlag== LOW)
  {
    res=1;
  }
  else
  {
    res=0;
  }
  return res;
}
