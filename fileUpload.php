<?php
	include 'header.php';
	include 'parser.php';
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
	
	$parser = new Parser();
	
	$fileName = $_REQUEST['filename'];

	$fileContents = getFile('fileaddress', "Noooo");

	$formattedOption = isset($_REQUEST['isFormatted']);
	$publicOption = (int)isset($_REQUEST['public']);

	$userName = $userMod->getUserName();
	
	if($formattedOption) {
		$parsedText = $parser->parseFormattedText($fileContents);
	}
	else {
		$parsedText = $parser->parseUnformattedText($fileContents);
	}

	//use the fileModule.php to upload files
	include 'fileModule.php';
	
	$fileMod = new FileModule($connection); //$connection comes from the header.php
	echo "<div class='container'>";
	
	if($fileMod->upload($userName, $fileName, $parsedText, $publicOption)) {
		echo "<p>Your upload was successful!</p>";
	}
	else {
		echo "<p>Upload was unsuccessful</p>";
	}
	echo "</div>";
	
		
	//we can redirect the page or give a confirmation message
?>

