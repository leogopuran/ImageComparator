<?php
session_start();
?>
<?php
	$img1 = $_SESSION["img1"];
	$img2 = $_SESSION["img2"];
?>
<?php
include_once 'scripts/fun2.php';
/*$im1 = isset($_REQUEST['$img1']) ? $_REQUEST['$img1'] : '';
$im2 = isset($_REQUEST['$img2']) ? $_REQUEST['$img2'] : '';*/
if ($img1 != '' && $img2 != '') {
    $diff = imageCompare($img1, $img2);
	
    neat_r($diff);

}
?>