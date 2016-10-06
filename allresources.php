<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
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

<ul>

<!--DELETE PROJECT-->
<?php 

$sql = 'select `project-id`, `project-name`
from `project`
where `project-id` = ?
and `client-id` = `client-id`';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pid, $pnam);

while($stmt->fetch()) { 
	echo '<li><a href="projectdetails.php?cid='.$cid.'">'.$pnam.'</a>'; ?>


<form action="deleteproject.php" method="post">
<input type="hidden" name="pid" value="<?=$pid?>">
<input type="hidden" name="cid" value="<?=$cid?>"> <input type="submit" value="X">
</form>	

<?php
echo '</li>'; }
?>

</ul>



</body>
</html>








