<?php

session_start();

$starttime = new DateTime();
$starttime = $starttime->format('Y-m-d H:i:s');
$_SESSION['starttime'] = $starttime;

$endtime = new DateTime();
$endtime = $endtime->format('Y-m-d H:i:s');
$_SESSION['endtime'] = $endtime;

$starttime = $_SESSION['starttime'];
echo "The user logged in at " . $starttime . "<br />";
$endtime = $_SESSION['endtime'];
echo "The user logged out at " . $endtime;

?>