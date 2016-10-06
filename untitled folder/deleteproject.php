

<?php
$pid = filter_input(INPUT_POST, 'pid', FILTER_VALIDATE_INT) or die('Missing/...illegal parameter');
$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');
require_once 'dbcon.php';

$sql = 'DELETE FROM `Project` WHERE `Project-ID` = ? AND `client-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('ii', $pid, $cid);
$stmt->execute();

if ($stmt->affected_rows >0 ){
	echo 'Project deleted';
}
else {
	echo 'No change - Project still exisiting';
//	echo $stmt->error;
}

?>
