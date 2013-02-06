<?php 

class Login
{
	var $userName = "";
	var $password = "";
	var $isError = false;
	
	function grabFromSubmit($uName, $pWord)
	{
		$this->userName = $uName;
		$this->password = hash('sha256',$pWord);
		return;
	}
	
};


?>

<html>
<head>
	<title> Discourse Analysis - Login Page </title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
<?php
$login = new Login;


if (isset($_POST['username']))
{
	$login->grabFromSubmit($_POST['username'], $_POST["password"]);

	$login->showInformation();
}
	
?>		
<form class="loginForm" name="TestForm" method="post" action="">
	<p class="field">
		<input type="text" name="username"  placeholder="Username" />
	</p>
	<p class="field">
		<input type="password" name="password" placeholder="Password" / > 
	</p>
	<p class="submit">
			<input type="submit" name="button" id="button" value="Submit" />
	</p>
</form>


</body>	


</html>