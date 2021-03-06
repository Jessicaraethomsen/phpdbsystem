<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Resource's Details</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<h2>Resources</h2>
<ul>
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

<form type="button" method="get" action="allresources.php">
    <button >SEE ALL RESOURCES</button>
</form>


<br>


<H2> Current Projects </H2>

<?php
$sql = 'SELECT `Project-ID`, `Resources-ID` 
FROM `Project_has_Resources` 
WHERE `Resources-ID` = ?
';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pid, $rid);

while($stmt->fetch()) { 
	echo '<h1>'.$pid. ' ' .$rid.'</h1>';
		
}

?>


</body>
</html>