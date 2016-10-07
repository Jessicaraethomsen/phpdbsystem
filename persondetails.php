<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Personal Resources</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php

/*The include statement includes and evaluates the specified file.*/
include 'menu.php';
?>

<div class="bigbox">
<img src="img/browser.png" alt="logo" style="width:70px;height:75px;">
<h1>JUST WEB- Personal's Details</h1>
<br>

<div class="leftbox">
<h3>Personal Resources</h3>
<ul>
<?php 
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';
$sql = 'SELECT `Resource-Name`, `Resource_Detail`, `Resource-Type-Code-ID` 
FROM `Resources` 
where `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($rnam, $rdetail, $rtcid);

while($stmt->fetch()) { 
	echo '<p>'.$rnam.'</p>';
	echo '<p>'.$rdetail.'</p>';
	echo '<p>'.$rtcid.'</p>';
}
?>
</ul>
<br>
<h3>All Resources</h3>
<p> Click here to see all our Resources</p>
 <form type="button" action="allresources.php" method="get">
 	<button class="button">See all resources</button>
</form>

</div>
<div class="rightbox">
<h3>Working projects</h3>
<ul>
<?php 

$sql = 'SELECT `Project-ID`, `Resources-ID` from Project_has_Resources 
WHERE `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pid, $rid);

while($stmt->fetch()) { 
	echo '<h5>Project ID/Resource ID</h5>';
		echo '<p>'.$pid. ' ' .$rid.'</p>';
	
	
}
?>
</ul>

<h3>Delete Project ID/Project Resource</h3>
<p> Delete ID/Resource nr. *Must use numbers from above</p>
<form action="deleteproject.php" method="post">
    	<input type="text" name="pid" placeholder="Project ID" required><br>
        <input type="text" name="rid" placeholder="Resource ID" required><br>
    	<input type="submit" value="Delete Resource">
    </form>
 </div>   
</div>
</body>
</html>