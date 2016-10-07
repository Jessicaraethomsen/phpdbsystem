<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Client Details</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>

<?php

/*The include statement includes and evaluates the specified file.*/
include 'menu.php';
?>

<div class="bigbox">
<img src="img/browser.png" alt="logo" style="width:70px;height:75px;">
<h1>JUST WEB- Client's Details</h1>
<br>

<div id="current">
<?php
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';

$sql = 'SELECT `Client-Name`, `Client-Adress`, `Client-Contact-Name`, `Client-Contact phone`, `Zip_Code_Zip_Code_ID`
from Client
where `Client-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($cnam, $cadr, $ccnam, $ccphone, $czip);

while($stmt->fetch()) { }

echo '<h4>'.'Clients Name:'.'</h4>';	
echo '<h5>'.$cnam.'</h5>';
?>
<!--UPDATE DETAILS-->
	<form action="updatedetails.php" method="post">
    	<input type="hidden" name="$cid" value='<?=$cid?>'>
        <input type="text" name="$cnam" placeholder="Client Name" required>
    	<input type="submit" value="Update Name">
    </form>
<?php 
	//combine to strings and make between them
	echo '<h4>'.'Address:'.'</h4>';	
?>	
	
	
<?php 	
	echo '<h5>'.$cadr. ' ' .$czip.'</h5>';
	?>
    
    <?php 
    $sql = 'SELECT `City` 
	FROM `Zip_Code` 
	WHERE `Zip_Code_ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $czip);
$stmt->execute();
$stmt->bind_result($ci);

while($stmt->fetch()) { 
	echo '<p>'.$ci.'</p>';
	?>
    
    <?php
	echo '<h4>'.'Project Contact:'.'</h4>';
	echo '<p>'.$ccnam.'</p>';
	echo '<h4>'.'Contact Number:'.'</h4>';
	echo '<p>'.$ccphone.'</p>';
}
?>
</ul>
</div>      
<div class="rightbox">
<h2>Projects</h2>
<p>Click on current project for more details </p>

<ul>

<!--PROJECTS-->
<?php 

$sql = 'select `Project-ID`, `Project-Name`
from `Project`
where `Project-ID` = ?
and `Client-ID` = `Client-ID`';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pid, $pnam);

while($stmt->fetch()) { 
	echo '<li><a href="projectdetails.php?cid='.$cid.'">'.$pnam.'</li>'; 
}
	?>	
</ul>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
</div>


</body>
</html>