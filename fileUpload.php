<?php
	include('header.php');
	include('parser.php');

	//	This file will accept the file from "upload.php" to upload to the database
	function getFile($input, $defaultValue)
	{
		if(isset($_FILES[$input]) && $_FILES[$input]['size'] > 0)
		{
			$contents = file_get_contents($_FILES[$input]['tmp_name']);
			return $contents;
		}
		else
		{
			return $defaultValue;
		}
	}
	
	$parser = new Parser();
	
	$projectName = $_REQUEST['projectName'];
	$fileName = "This needs to be changed later."; // This needs to be updated to get the actual file name from the file address.
	$fileContents = getFile('fileaddress', "No");

	$formattedOption = isset($_REQUEST['isFormatted']);
	$publicOption = (int)isset($_REQUEST['public']);

	$userName = $loginModel->getUserName();
	
	if($formattedOption)
	{
		$parsedText = $parser->parseFormattedText($fileContents);
	}
	else
	{
		$parsedText = $parser->parseUnformattedText($fileContents);
	}

	//	Use the fileModule.php to upload files
	include 'fileModule.php';
	
	$fileMod = new FileModule($connection); //$connection comes from the header.php
	echo "<div class='container'>";
	
	if($fileMod->upload($userName, $projectName, $fileName, $parsedText, $publicOption))
	{
		echo "<p>Your upload was successful!</p>";
	}
	else
	{
		echo "<p>Your upload was unsuccessful!</p>";
	}
	echo "</div>";
	
		
	//we can redirect the page or give a confirmation message
?>

