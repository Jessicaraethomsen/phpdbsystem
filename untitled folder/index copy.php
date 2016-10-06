<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Our Clients</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php

/*The include statement includes and evaluates the specified file.*/
include 'menu.php';
?>

<h1>Clients</h1>
<ul>
<?php
require_once 'dbcon.php';

$sql = 'SELECT `CLIENT-ID`, `CLIENT-NAME` FROM `Client`';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cid, $cnam);

while($stmt->fetch()){
	echo '<li id="indexlist" ><a href="clientdetails.php?cid='.$cid.'">'.$cnam.'</a></li>'.PHP_EOL;
}

?>
</ul>

<!--ADD PROJECT-->


<div id='formbox'>
 <h2> ADD A PROJECT </h2>
	  <h3> Add project</h3>
<form action="addproject.php" method="post">
    <input type="text" name="$cnam" placeholder="Client Name" required>
    <input type="text" name="$cad" placeholder="Adress" required>	
    <input type="text" name="$ccnam" placeholder="Contact Name" required>
    <input type="text" name="$cphone" placeholder="Contact Phone" required>
      <input type="text" name="$czip" placeholder="Contact Zip" required>
    <button type="submit" value="Add New Client"> Add New Project </button>
</form>
</div>

</body>
</html>