<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Project Specific Details</title>

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php

/*The include statement includes and evaluates the specified file.*/
include 'menu.php';
?>

<div class="bigbox">
<img src="img/browser.png" alt="logo" style="width:70px;height:75px;">
<h1>JUST WEB- Client's Projects</h1>
<br>


<div class= "leftbox">
<ul>
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
	echo '<h4>'.'Company/Project'.'</h4>';
	echo '<p>'. $cnam .'</p>';
	
?>



<?php
$sql = 'SELECT `Project-Name`, `Project-Description`, `Project-Start-Date`, `Project-End-Date`, `Other-Project-Details`
from `Project`
where `Project-ID` = ?
and `Client-ID` = `Client-ID`';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pnam, $pdesc, $psd, $ped, $popid);

while($stmt->fetch()) { 
	echo '<p>'. $pnam .'</p>';
	echo '<h4>'.'Description'.'</h4>';
	echo '<p>'. $pdesc .'</p>';
	echo '<h4>'.'Start Date'.'</h4>';
	echo '<p>'. $psd .'</p>';
	echo '<h4>'.'End Date'.'</h4>';
	echo '<p>'. $ped .'</p>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	
}
?>
</div>

<div class="rightbox">
<h2>Resources</h2>
<p>Click on Resource name to get more details</p>
<ul>
<?php
$sql = 'SELECT `Resource-Name` 
FROM `Resources`
WHERE `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($rnam);

while($stmt->fetch()) { 
	echo '<li><a href="persondetails.php?cid='.$cid.'">'.$rnam.'</a></li>';
}
?>



 
</ul>
</div>

</div>


</body>
</html>