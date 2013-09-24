<?php
	include 'header.php';
	//This file will accept the file from "upload.php" to upload to the database
	
	$fileName = $_REQUEST['filename'];
	$fileAddress = $_REQUEST['fileaddress'];
	echo file_get_contents($fileAddress);
	$publicOption = isset($_REQUEST['public']);
	$userName = $userMod->getUserName();

	//use the fileModule.php to upload files
	include 'fileModule.php';
	
	$fileMod = new FileModule($connection); //$connection comes from the header.php
	//$fileMod->upload($userName, $fileName, $fileContents, $publicOption);
	
	
	//we can redirect the page or give a confirmation message
?>