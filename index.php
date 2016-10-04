<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Our Clients</title>
</head>

<body>
<h1>Clients</h1>
<ul>
<?php
require_once 'dbcon.php';

$sql = 'SELECT `CLIENT-ID`, `CLIENT-NAME` FROM `Client`';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cid, $cnam);

while($stmt->fetch()){
	echo '<li><a href="clientsprojects.php?cid='.$cid.'">'.$cnam.'</a></li>'.PHP_EOL;
}

?>
</ul>


</body>
</html>