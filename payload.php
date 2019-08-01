<?php
//Login data storage TTN
$jsonurl = "https://diyconnetwork.data.thethingsnetwork.org/api/v2/query?last=7d"; //Link to json file.
$key = array('Accept: application/json', 'Authorization: key ttn-account-v2.GUXFhdizL2eKA2jM6dfgdsa2eHjaaISdfGYiA-qHyoJg80'); //Authorization key from TheThingsNetwork

//Make an array of your devices 
$deviceID = array('dhtsensor02', 'dhtsensor01', 'dhtsensor03');

//Fetch Payload data
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $jsonurl);
curl_setopt($ch, CURLOPT_HTTPHEADER, $key); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);
$array = json_decode($result, true);

//Sort json by time
function sortArray($t1, $t2){
if ($t1['time'] == $t2['time']) return 0;
return ($t1['time'] > $t2['time']) ? -1 : 1;} 		
usort($array, "sortArray");

//Make for each device id a new array
foreach($array as $obj) {
	if (in_array($obj['device_id'], $deviceID)) { 
		//edit time format.
			$originalTime = strstr($obj['time'], '.', true) ; 
			$newFormat = date("Y-m-d H:i:s", strtotime($originalTime)+ 120*60);

		//start creating data for each device
      $data[$obj['device_id']][] = array(	  
		  "Device_id"=> $obj['device_id'], //Default value from TheThingsNetwork.
		  "Raw_Data" => $obj['raw'], //Default value from TheThingsNetwork.
		  "Time" => $newFormat, //Default value from TheThingsNetwork. 	
		  "Temperature" => $obj['Temperature'], //Custom key + value from Payload functions TheThingsNetwork
		  "Humidity" => $obj['Humidity'] 
	  	  );  
     }  
}
//Sort the new array by key name
ksort($data);
?>