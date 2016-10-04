<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Client's Details</title>
</head>

<body>
<h2> CLIENT INFO </h2>

<?php
// filmdetails.php?fid=107
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
	echo '<p>'. $cad . ' ' . $czip.'</p>'; //How to combine two strings you idoit! with a space!
	echo '<p>'. $ccph .'</p>';
?>





</body>
</html>