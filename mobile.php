<?php include 'payload.php'; 

// Settings for Chart.js
// $t is the numbers of the lteste datapoints
// Change $t to get more datapoint in the chart 
$t= 10; 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Example</title>

    <!-- Sets initial viewport load and disables zooming  -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Include the compiled Ratchet CSS -->
    <link href="./css/ratchet.css" rel="stylesheet">

    <!-- Include the compiled Ratchet JS -->
    <script src="./js/ratchet.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<style>
body {
	color: #333; 
	font-family: 'Verdana', sans-serif;
}
#wrapper {
	margin: auto;
	width:100%;
	text-align: center;
	border: 0px solid grey;
}
#SensorName1 {
    display: inline-block;
    width:140px;
    height:40px;
	padding-top: 10px;
	font-size: 1.2em; 
	font-weight: 100;  
}
#SensorName2 {
    vertical-align:top;
    display: inline-block;
    width:140px;
    height:40px;
	padding-top: 10px;
	font-size: 1.2em; 
	font-weight: 100;
}
#SensorData1 {
    display: inline-block;
    width:140px;
    height:80px;
	padding-top: 25px;
	font-size: 2.4em; 
	font-weight: 100;
}
#SensorData2 {
    vertical-align:top;
    display: inline-block;
    width:140px;
    height:80px;
	padding-top: 25px;
	font-size: 2.4em; 
	font-weight: 100;
}
</style>
</head>
<body>
    <!-- Make sure all your bars are the first things in your <body> -->
<header class="bar bar-nav">
	<h1 class="title">Example</h1>
</header>


    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
<div class="content">
    <!-- Begin .content div  -->
<?php
foreach (array_keys($data) as $id) {  
echo"<div id='wrapper'>". $id . "</div>	
	 <div id='wrapper'>
    	<div id='SensorName1'>Temperature</div>
    	<div id='SensorName2'>Humidity</div>
	</div>
	<div id='wrapper'>
    	<div id='SensorData1'>". $data[$id][0]['Temperature'] . "&deg;</div>
    	<div id='SensorData2'>". round($data[$id][0]['Humidity'], 1, PHP_ROUND_HALF_UP) . "&#37;</div>
	</div>
	<div id='wrapper'>	
		<p>Last update:". $data[$id][0]['Time'] . "</p>
	</div><hr>";	
}
?>
<div class="card">
	<ul class="table-view theme">
		<li class="table-view-cell">
			<a class="push-right" href="#charts">
            <strong>Data chart</strong>
            </a>
		</li>
	</ul>
</div>
<ul class="table-view">
	<li class="table-view-cell media">
		<div class="media-body">
    This page is using the Ratchet framework and the chart.js script
	Visit links below for more information.
        </div>
   </li>
</ul>
<div class="card">
	<ul class="table-view theme">
		<li class="table-view-cell">
			<a class="push-right" href="https//diycon.nl">
            <strong>Diycon.nl</strong>
            </a>
		</li>
		<li class="table-view-cell">
			<a class="push-right" href="http://goratchet.com/components/">
            <strong>Ratchet website</strong>
            </a>
		</li>
		<li class="table-view-cell">
			<a class="push-right" href="https://www.chartjs.org/">
            <strong>Chartjs website</strong>
            </a>
		</li>
	</ul>
</div>
    <!-- End .content div  -->
</div>
	
    <!-- Begin .sub pages div  -->
<div id="charts" class="modal">
      <header class="bar bar-nav">
        <a class="icon icon-close pull-right" href="#charts"></a>
        <h1 class="title">Sensor chart</h1>
      </header>
<div class="content">
<?php
foreach (array_keys($data) as $id) {  		
	echo"<div>Device: ". $id . "  </div><canvas id=" . $id . "></canvas>";
	echo"<script> var ctx = document.getElementById('" . $id ."').getContext('2d');
			var chart = new Chart(ctx, {    	
   			 type: 'line',   	
    data: {     
		labels: [";  
				for($i=$t; $i>=0; $i--){ echo "'" . date('H:i', strtotime($data[$id][$i]['Time'])) . "', ";} 
				echo "],  
        datasets: [{
            label: 'Temperature',
 			yAxisID: 'y-axis-1',
			lineTension : '0',
            borderColor : 'rgb(221, 84, 43)',
			backgroundColor : 'rgba(255, 255, 255, 0)',	
           data: [";
				for($i=$t; $i>=0; $i--){ echo $data[$id][$i]['Temperature'] . ", ";}
				echo " ],
        },
		{
            label: 'Humidity',
 			yAxisID: 'y-axis-2',
			lineTension : '0',
            borderColor : 'rgb(43, 180, 221)',
			backgroundColor : 'rgba(255, 255, 255, 0)',	
           data: [";
				for($i=$t; $i>=0; $i--){ echo $data[$id][$i]['Humidity'] . ", ";}
				 echo " ],
        }]
    },
    options: {
    scales: {
      yAxes: [{
        position: 'left',
        id: 'y-axis-1',
		ticks: {stepSize: 1}
      }, 			  
          {
        position: 'right',
        id: 'y-axis-2',
		ticks: {stepSize: 1}
    			  }]
   			 }
		}
})
</script>
<div><hr></div>";
}
?>	
<div class="card">
	<ul class="table-view theme">
		<li class="table-view-cell">
			<a class="push-right" href="https//diycon.nl">
            <strong>Diycon.nl</strong>
            </a>
		</li>
		<li class="table-view-cell">
			<a class="push-right" href="http://goratchet.com/components/">
            <strong>Ratchet website</strong>
            </a>
		</li>
		<li class="table-view-cell">
			<a class="push-right" href="https://www.chartjs.org/">
            <strong>Chartjs website</strong>
            </a>
		</li>
	</ul>
</div>
</div>
</div>
    <!-- End .sub pages div  -->
</body>
</html>
