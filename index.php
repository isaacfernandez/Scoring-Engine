<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">

<title>Scoring Engine</title>

<!-- Included CSS -->
<link rel="stylesheet" href="css/bootstrap.css">

<head>

<body>

<div class="container" role="main">
<?php
# This is our main file that will be rendered when you connect

# Included checks
include 'checks/ping.php';

# Included PHP and configuration
require 'config.php';

# Config parsing
$config_file = fopen('servers.conf', 'r') or die('Unable to read servers.conf');
$config = fread($config_file,filesize('servers.conf'));

$config = preg_replace('/#.*#/','',$config);
$config = preg_replace('/\\n/',' ',$config);
$servers = explode("---",$config);

foreach ($servers as $server) {
	if ($server !== "") {
		$server = trim($server);
		$checks = explode(" ", $server);
		$address = array_shift($checks);
		
		foreach($checks as $check) {
			# For now, ignore arguments. This will need to be parsed later
			$check = preg_replace('/[\\(\\)]/','',$check);

			$check($address);
		}
	}
}

# Page rendering
print '<h1>Scoring Engine</h1>';
print '<div class="container" id="vis"></div>';
print '<table class="table table-bordered" id="status_table"></table>';

# Do the server check and update

?>
</div>

<!-- included JS -->
<script type="text/javascript" src="js/d3.js"></script>
<script type="text/javascript" src="js/vis.js"></script>

</body>

</html>
