<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>All Resources</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php

/*The include statement includes and evaluates the specified file.*/
include 'menu.php';
?>
<div class="bigbox">
<img src="img/browser.png" alt="logo" style="width:70px;height:75px;">
<h1>JUST WEB- Client's Details</h1>
<br>
<ul>
<?php 

require_once 'dbcon.php';

$sql = 'SELECT `Resource-Name`, `Resource_Detail`, `Resource-Type-Code-ID` FROM `Resources` ORDER BY `Resource-Type-Code-ID`' ;

$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($rnam, $rdetail, $rtcid);
while($stmt->fetch()) { 

	echo '<h3>' .'Resource Name:'. '</h3>';
	echo '<p>' .$rnam. '</p>';
	echo '<h3>' .'Empolyees description:'. '</h3>';
	echo '<p>' .$rdetail. '</p>';
		echo '<h3>' .'Resource ID:'. '</h3>';
	echo '<p>' .$rtcid. '</p>';
	echo '<br>';
	echo '<br>';


}
?>
</ul>
</div>



</body>
</html>








