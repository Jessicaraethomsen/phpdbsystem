<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<div class="rightbox">
<h2>All JUST WEB's Resources </h2>
<p>Click on current project for more details </p>

<?php

$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';
?>

<?php
$sql = 'SELECT `Resource-Name`, `Resource_Detail`, `Resource-Type-Code-ID` 
FROM `Resources` 
WHERE `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($rnam, $rdetail, $rtcid );

while($stmt->fetch()) { 
	echo '<p>'.$rnam.'</p>';
	echo '<p>'.$rdetail.'</p>';
	echo '<p>'.$rtcid.'</p>';
	
	
}
?>



</body>
</html>