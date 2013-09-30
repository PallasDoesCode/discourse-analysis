<?php
	include 'header.php';
	//This file will accept the file from "upload.php" to upload to the database
	function getFile($input, $defaultValue) {
		if(isset($_FILES[$input]) && $_FILES[$input]['size'] > 0) {
			$contents = file_get_contents($_FILES[$input]['tmp_name']);
			return $contents;
		}
		else {
			return $defaultValue;
		}
	}
	
	
	$fileName = $_REQUEST['filename'];

	echo getFile('fileaddress', "Noooo");
	
	$publicOption = isset($_REQUEST['public']);
	$userName = $userMod->getUserName();

	//use the fileModule.php to upload files
	include 'fileModule.php';
	
	$fileMod = new FileModule($connection); //$connection comes from the header.php
	$fileMod->upload($userName, $fileName, $fileContents, $publicOption);
		
	//we can redirect the page or give a confirmation message
?>

<div class="container">
	<p>Your upload was successful!</p>
	
</div>