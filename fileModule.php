<?php
	//This is the database file module for uploading and downloading user files
	
	class FileModule
	{
		private $dbConnection;
		

		
		function FileModule($connection)
		{
			$this->dbConnection = $connection; //use the connection that was given to me
		}
		
		//upload a file based on username
		function upload($userName, $fileName, $file, $public) {
			$datetime = date("Y-m-d H:i:s");
			$stmt = $this->dbConnection->prepare("INSERT INTO files VALUES(?, ?, ?, ?, ?)");
			$stmt->bind_param("sssss", $userName, $fileName, $file, $public, $datetime);
			$stmt->execute();
			$stmt->close();
		}
		
		//get files' information based on username, return array
		function getFilesInfo($username) {
		
		}
		
		//get public files' information
		function getPublicFilesInfo() {
		
		}
		
		//get file contents based on username and filename
		function getFileContents($userName, $fileName) {
		
		}
		
		//internal function, check if username is valid
		function validUserName($userName) {
			if($stmt = $this->dbConnection->prepare("SELECT COUNT(Username)
													FROM usersinfo
													WHERE Username = ?"));
			$stmt->bind_param("s", $userName);
			$stmt->execute();
			$stmt->bind_result($userNameCount);
			$stmt->fetch();
			$stmt->close();
			if ($userNameCount != 0) { //the username must exist
				return true;
			}
			else return false;
		}
		
		//internal function, check if filename exists under the username
		function fileExists($userName, $fileName) {
			if($stmt = $this->dbConnection->prepare("SELECT COUNT(fileName)
													FROM files
													WHERE Owner = ? AND fileName = ?"));
			$stmt->bind_param("ss", $userName, $fileName);
			$stmt->execute();
			$stmt->bind_result($fileCount);
			$stmt->fetch();
			$stmt->close();
			if ($fileCount != 0) { //the file must exist
				return true;
			}
			else return false;	
		}
	}

?>