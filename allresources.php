<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php

/*The include statement includes and evaluates the specified file.*/
include 'menu.php';
?>

<ul>
<?php 

require_once 'dbcon.php';

$sql = 'SELECT `Resource-Name`, `Resource_Detail`, `Resource-Type-Code-ID` FROM Resources';

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




</body>
</html>








