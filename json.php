<?php include 'payload.php'; ?>
<html lang="en">
  <head>
    <title>Json Example</title>	
  </head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<style>
.json {
	width:100%;
	margin-top: 100px;	
	border: 2px solid #ccc;
	padding: 20px;
	text-align: left; 
	font-family: Verdana, sans-serif; 
	font-size: 1.2em;	
	color: #000'
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
	<div class="col-md-12 json">
JSON Data
<?php
echo "<pre>";
print_r($data); 
echo "</pre>";
?>
	</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>