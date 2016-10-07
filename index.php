<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Our Clients</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php 
include 'menu.php';
?>

<div id="clientbox">
<img src="img/browser.png" alt="logo" style="width:70px;height:75px;">
<h1>JUST WEB- Client's DATABASE </h1>
<br>

<div id="current">
<h2>Current Clients</h2>
<p>Click on client to get more details</p>
<ul>
<?php
require_once 'dbcon.php';

$sql = 'SELECT `CLIENT-ID`, `CLIENT-NAME` FROM `Client` ORDER BY `CLIENT-NAME`';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cid, $cnam);

while($stmt->fetch()){
	echo '<li id="indexlist"><a href="clientdetails.php?cid='.$cid.'">'.$cnam.'</a></li>'.PHP_EOL;
}

?>
</ul>
</div>

<!--ADD PROJECT-->


 <div id='formbox'>
 <br>
<h2> Add a New Client </h2>

<form id="formdesign" action="addproject.php" method="post" required>
    <input type="text" name="$cnam" placeholder="Client Name" required>
    <input type="text" name="$cad" placeholder="Adress" required>	
    <input type="text" name="$ccnam" placeholder="Contact Name" required>
    <input type="text" name="$cphone" placeholder="Contact Phone" required>
      <input type="text" name="$czip" placeholder="Contact Zip" required>
    <button type="submit" value="Add New Client">Add New Client </button>
</form>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>