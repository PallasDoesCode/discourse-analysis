<?php

/**
 * UserModule is a tool that allows
 * the page to login users in and out,
 * and check if the user is logged in.
 *
 **/
 
require('./lib/PasswordHash.php');
 
class LoginModel
{
	var $dbConnect;
	
	/*
	 * Default constructor, requires a active mysqli connection.
	 */
	function LoginModel($dbConnect)
	{
		$this->dbConnect = $dbConnect;
		if(session_id() == '')
		{
			session_start();
		}
	}
	
	/**
	 * Checks to see if the user is logged in. returns a boolean indicating the current status
	 **/
	function IsUserLoggedIn()
	{
		return(isset($_SESSION['username']));
	}
	
	/**
	 * Logs in a user. Returns boolean indicating the result.
	 *
	 * @param string $userName Username of the person logging in.
	 * @param string $password Password in plain text of the person logging in.
	 **/
	function LoginUser($userName, $password)
	{
		if($stmt = $this->dbConnect->prepare("SELECT password FROM usersinfo WHERE username=?"))
		{
			$stmt->bind_param("s", $userName);
			$stmt->execute();
			$stmt->bind_result($hashedPassword);
			$stmt->fetch();
			$stmt->close();			
			$pwdHasher = new PasswordHash(8, FALSE);
			$hashString = $pwdHasher->HashPassword($password);
			
			// Tests to determine if hashing is the issue with the login problem.
			/*
				$hashString = $pwdHasher->HashPassword($password);
				echo "The password entered is " . $password . "<br />";
				echo "The hashed string is " . $hashString . "<br />";
				echo "The hashed password to compare against is " . $hashedPassword;
			*/
			
			//if($pwdHasher->CheckPassword($password, $hashedPassword))
			if($pwdHasher->CheckPassword($hashString, $hashedPassword));
			{
				$_SESSION['username'] = $userName;
				
				// Get the current time and date to be stored in the database.
				// This information is used to tell when a user last logged in.
				$CST_timezone = new DateTimeZone('America/Chicago');
				$starttime = new DateTime('now' , $CST_timezone);
				$starttime = $starttime->format('Y-m-d H:i:s');
				$_SESSION['starttime'] = $starttime;

				return true;
			}
		}

		return false;
	}
	
	/**
	 * Logs out a user returning a boolean indicating the result.
	 * Can only return false if the user was not logged in before calling this method.
		*
	 **/
	function LogoutUser()
	{
		$CST_timezone = new DateTimeZone('America/Chicago');
		$endtime = new DateTime('now' , $CST_timezone);
		$endtime = $endtime->format('Y-m-d H:i:s');
		$_SESSION['endtime'] = $endtime;
		
		$this->SendSessionDataToDatabase();
		
		$loggedOut = true;

		if(isset($_SESSION['username']))
		{
			unset ($_SESSION['username']);
		}
		else
		{
			$loggedOut = false;
		}

		return $loggedOut;
	}
	
	/**
	 * Returns a users username or an empty string if the user is not logged in.
	 **/
	function GetUserName()
	{
		if(isset($_SESSION['username']))
			return $_SESSION['username'];
		else
			return "";
	}
	
	/*
	*	Returns the name of the user or an empty string if the user is not logged in.
	*/
	
	function GetUsersRealName()
	{
		if(isset($_SESSION['name']))
			return $_SESSION['name'];
		else
			return "";
	}
	
	/**
	 * Returns true if the user is an admin, false otherwise
	 **/
	function IsAdmin()
	{
		if(isset($_SESSION['username']))
		{
			if($stmt = $this->dbConnect->prepare("SELECT admin FROM usersinfo WHERE username= ?"))
			{
				$stmt->bind_param("s", $_SESSION['username']);
				$stmt->execute();
				$stmt->bind_result($isAdmin);
				$stmt->fetch();
				$stmt->close();
				if($isAdmin == 1)
				{
					return true;
				}
			}
		}
		return false;
	}
	
	function SendSessionDataToDatabase()
	{	
		// Add both the start time and the end time to the session table
		$starttime = $_SESSION['starttime'];
		$endtime = $_SESSION['endtime'];
		$username = $_SESSION['username'];

		if (isset($_SESSION['starttime']) && isset($_SESSION['endtime']))
		{
			if($stmt = $this->dbConnect->prepare("INSERT INTO session ( username, startTime, endtime ) VALUES(?, ?, ?)"))
			{
				$stmt->bind_param("sss", $username, $starttime, $endtime);
				$stmt->execute();
				$stmt->close();
			}

			unset ($_SESSION['starttime']);
			unset ($_SESSION['endtime']);
		}
	}
}
?>