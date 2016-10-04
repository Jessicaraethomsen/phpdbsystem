<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Project Specific Details</title>
</head>

<body>
<h2> Project Specific Details </h2>

<?php

$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';

$sql = 'SELECT `Client-Name`, `Client-Adress`, `Client-Contact Phone`, `Zip_Code_Zip_Code_ID` FROM `Client` WHERE `CLIENT-ID` = ?';
$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($cnam, $cad, $ccph, $czip);

while($stmt->fetch()) { }

//echo '<li><a href="projectdetails.php?fid='.$cnam.'">'.$cad.' ('.$czip.')</a></li>'.PHP_EOL;
	echo '<h1>'. $cnam .'</h1>';
	
?>

<h2>CURRENT PROJECTS</h2>
<ul>
<?php
$sql = 'select `project-name`, `project-description`, `project-start-date`, `project-end-date`, `other-project-details`
from `project`
where `project-id` = ?
and `client-id` = `client-id`';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pnam, $pdesc, $psd, $ped, $popid);

while($stmt->fetch()) { 
	echo '<li><a href="projectdetails.php?cid='.$cid.'">'.$pnam.' </a></li>';
	echo '<h4>'.'Description'.'</h4>';
	echo '<p>'. $pdesc .'</p>';
	echo '<h4>'.'Start Date'.'</h4>';
	echo '<p>'. $psd .'</p>';
	echo '<h4>'.'End Date'.'</h4>';
	echo '<p>'. $ped .'</p>';
	
}
?>

 
</ul>




</body>
</html>