<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Client's Project</title>
</head>

<body>

<?php

$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

?>

<h1>Client: #<?=$cid?></h1>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT `Client-Name`, `Client-Adress`, `Client-Contact Phone`, `Zip_Code_Zip_Code_ID` FROM `Client`';

$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cnam, $cad, $ccph, $czip);

while($stmt->fetch()) {
	//echo '<li><a href="projectdetails.php?fid='.$cnam.'">'.$cad.' ('.$czip.')</a></li>'.PHP_EOL;
	echo '<h1>'. $cnam .'</h1>';
	echo '<p>'. $cad . ' ' . $czip.'</p>'; //How to combine two strings you idoit! with a space!
	echo '<p>'. $ccph .'</p>';
	
}

?>
</ul>


</body>
</html>