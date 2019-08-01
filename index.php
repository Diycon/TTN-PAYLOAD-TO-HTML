<?php include 'payload.php'; 

// Settings for Chart.js
// $t is the numbers of the lteste datapoints
// Change $t to get more datapoint in the chart 
$t= 10; 
?>
<html lang="en">
  <head>
    <title>Payload Example</title>	
  </head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<style>
.cards{
	margin-top: 100px;
  	font-family: Verdana, sans-serif; 
  	font-size: 1.2em;	
  	color: #000'
	}
.spacer {
	margin-top:20px;
	}
.navbar {
	background-color: #000;
	color: #fff;	
	font-size: 1.2em;
	}
nav .navbar-nav li a{
	color: white !important;
	}
.nav, navbar-nav .nav-link:focus, .navbar-nav .nav-link:hover {
	color: #ccc !important;
	}
</style>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark ">
  <a class="navbar-brand"> <img src="http://diycon.nl/Example/PayloadToHTML/img/logo.png" width="124" height="45" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="https://diycon.nl/archives/portfolio/integration-payload-to-html">Diycon.nl</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://www.diycon.nl/Example/PayloadToHTML/">Single Sensor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://www.diycon.nl/Example/PayloadToHTML/multiple.php">Multiple sensors</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://www.diycon.nl/Example/PayloadToHTML/json.php">Json data</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://www.diycon.nl/Example/PayloadToHTML/mobile.php">Mobile</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">

<div class="row">
	<div class="col-md-12 cards">
<div class="row">
    <div class='col-sm-4 offset-sm-4'>
	<div class='card'>
      <div class="card-body">
        <h5 class="card-title"><b><?php echo $data['dhtsensor01'][0]['Device_id']; ?></b></h5>
        <p class="card-text">
		Temperature: <?php echo $data['dhtsensor01'][0]['Temperature']; ?>&deg;<br />
		Humidity: <?php echo $data['dhtsensor01'][0]['Humidity']; ?>&#37;<br />
		Update: <?php echo $data['dhtsensor01'][0]['Time']; ?></p>
      </div>
    </div>
	</div>
</div>
    
	</div> 
</div>

<div class="row">
	<div class="col-md-12">
		<div class="chart">
<canvas id="sensor-chart"></canvas>
<script> 
	var ctx = document.getElementById('sensor-chart').getContext('2d');
			var chart = new Chart(ctx, {    	
   			 type: 'line',   	
    data: {     
		labels: [<?php for($i=$t; $i>=0; $i--){  echo "'" . date('H:i', strtotime($data['dhtsensor01'][$t]['Time'])) . "', "; } ?> ], 
        datasets: [{
            label: 'Temperature',
 			yAxisID: 'y-axis-1',
			lineTension : '0',
            borderColor : 'rgb(221, 84, 43)',
			backgroundColor : 'rgba(255, 255, 255, 0)',	
           data: [<?php for($i=$t; $i>=0; $i--){ echo $data['dhtsensor01'][$i]['Temperature'] . ", "; } ?>],
        },
		{
            label: 'Humidity',
 			yAxisID: 'y-axis-2',
			lineTension : '0',
            borderColor : 'rgb(43, 180, 221)',
			backgroundColor : 'rgba(255, 255, 255, 0)',	
           data: [<?php for($i=$t; $i>=0; $i--){ echo $data['dhtsensor01'][$i]['Humidity'] . ", "; } ?> ],
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
		</div>
	</div>
</div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>