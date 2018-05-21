<!DOCTYPE html>
<html>
<title>Pervasive Computing System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="main.html" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="review_data_dht11.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Temperature/Humidity</a>
    <a href="review_data_ldr.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Light</a>
    <a href="review_data_ultrasonic.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Distance</a>
 </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:32px 16px">
  <h1 class="w3-margin w3-jumbo">DHT11 SENSOR</h1>
</header>


<div class ="w3-center">
<?php
include("dbconnect.php");
$dblink = Connection();

$query = "SELECT * FROM dht11_logs ORDER BY timestamp ASC";

if($result = mysqli_query($dblink, $query)){
	echo "Reading records successfully from dht11_logs <br>";
} else {
	echo "Error: " . $query . "<br>" . mysqli_error($dblink);
}
?>

   <h1>Arduino Sensors Data</h1>
   <h3>Temperature and Humidity Readings</h3>
   <table class="w3-table-all" border="1" cellspacing="1" cellpadding="1">
		<tr>
			<td>Timestamp</td><td>Temperature</td><td>Humidity</td>	
		</tr>
      <?php 
		  if(mysqli_num_rows($result) > 0){
		     while($row = mysqli_fetch_assoc($result)) {
		        printf("<tr>
							<td>%s</td><td>%s</td><td>%s</td>
					   </tr>", 
		           $row["timestamp"], $row["temperature"], $row["humidity"]);
		     }
		  }
		  mysqli_close($dblink);
      ?>
   </table>
   
  </div>
</body>
</html>