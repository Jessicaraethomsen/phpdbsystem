<?php 
  $curpage = basename($_SERVER['PHP_SELF']);
  
  /*One can't use a class directly because they are on all pages, so it is better to use a conditional statement. IF statement*/  
/* basename The basename() function returns the filename from a path.*/
/*$_SERVER is a PHP super global variable which holds information about headers, paths, and script locations.*/
/*PHP_SELF	Returns the filename of the currently executing script*/
/* IF ==(equals) the php page then echo(show) the class called active */

?>

<ul id="nav">
<li> <a href="index.php"<?php if($curpage == 'index.php') {echo 'class="active"'; }?>> Clients </a></li>
<li> <a href="allresources.php"<?php if($curpage == 'allresources.php') {echo 'class="active"'; }?>> All Resources </a></li>
</ul>

<br>
<br>
<br>
<br>
<br>