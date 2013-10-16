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
			if(!$this->fileExists($userName, $fileName)) {
				$datetime = date("Y-m-d H:i:s");
				$stmt = $this->dbConnection->prepare("INSERT INTO files VALUES(?, ?, ?, ?, ?)");
				$stmt->bind_param("sssss", $userName, $fileName, $file, $public, $datetime);
				$stmt->execute();
				$stmt->close();
				return true;
			}
			return false;
		}
		
		//get files' information based on username, return array
		//to access the data in this array, you have to specify the row number first,
		//followed by the associated name of the variable that you wish to access
		//
		//ex. $filesArray[0]["fileName"] returns the first row's fileName field, whereas
		//    $filesArray[0]["lastUpdate"] returns the first row's lastUpdate field
		function getFilesInfo($userName) {
			$stmt = $this->dbConnection->prepare("SELECT fileName, public, lastUpdate
			                                      FROM files
			                                      WHERE Owner = ?");
			$stmt->bind_param("s", $userName);
			$stmt->execute();
			$stmt->bind_result($fileName, $public, $lastUpdate);
			$filesArray = array();
			for($i = 0; $stmt->fetch(); $i++) {
				$filesArray[i] = array[ "fileName" => $fileName,
				                        "public" => $public,
				                        "lastUpdate" => $lastUpdate ];
			}
			$stmt->close();
			return $filesArray;
		}
		
		//get public files' information
		function getPublicFilesInfo() {
			//owner name, file name, last updated
		}
		
		//get file contents based on username and filename
		function getFileContents($userName, $fileName) {
		
		}
		
		//internal function, check if username is valid; not yet used
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