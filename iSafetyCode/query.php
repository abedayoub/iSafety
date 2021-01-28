<?php
class dataNode{
 public $link='';
 function __construct($clientid,$deviceid,$temperature,$humidity,$heatindex,$flame,$smoke){
  $this->connect();
  $this->storeInDB($clientid,$deviceid,$temperature,$humidity,$heatindex,$flame,$smoke);
 }
 
 function connect(){
  $this->link = mysqli_connect('isafety.mysql.database.azure.com','isafetydb@isafety','Ayoub1927') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'isafety') or die('Cannot select the DB');
 }
 
 function storeInDB($clientid,$deviceid,$temperature,$humidity,$heatindex,$flame,$smoke){
  $query = "Insert into data(ClientID, DeviceID, Temperature, Humidity, HeatIndex, FlameFlag, SmokePPM) Values(".$clientid.",".$deviceid.",".$temperature.",".$humidity.",".$heatindex.",".$flame.",".$smoke.")";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['clientid'] != '' and $_GET['deviceid'] != '' and $_GET['temperature'] != '' and $_GET['humidity'] != '' and $_GET['HeatIndex'] != ''and $_GET['FlameFlag'] != ''and $_GET['SmokePPM'] != ''){
 $dataNode=new dataNode($_GET['clientid'],$_GET['deviceid'],$_GET['temperature'],$_GET['humidity'],$_GET['HeatIndex'],$_GET['FlameFlag'],$_GET['SmokePPM']);
}
?>


"clientid=" + ClientID + "&deviceid=" + DeviceID + "&temperature=" + getTemperature()
                          + "&humidity=" + getHumidity() + "&HeatIndex=" + getHeatIndex() + 
                          "&FlameFlag=" +FlameSensor() + "&SmokePPM=" +gazSensor()+"";
 