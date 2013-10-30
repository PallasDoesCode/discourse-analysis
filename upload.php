<?php
    include 'header.php';
    //if the user is not logged in then it will redirect them to the login page
    if(!$userMod->IsUserLoggedIn()){
        header("location: login.php?action=loginError");
    }
?>

<div class="container">
	<div id="upload">
		<center><h2>Please choose your file to upload</h2></center>
		<table align="center" width="40%" border=2 cellpadding=2 cellspacing=4 style="page-break-before: always">
		<tr>
			<td width=40% bgcolor="#ffffff">
			<form id="uploadarea" action="fileUpload.php" method="post" enctype="multipart/form-data">
				<table>
					<tr>
					<td>File Name: </td><td><input type="text" name="filename"><br><br></td>
					</tr>
					<tr>
					<td>File Location: </td><td><input type="file" name="fileaddress" size="40"><br><br></td>
					</tr>
					<tr>
					<td>Make this file public? </td><td><input type="checkbox" name="public"><br><br></td>
					</tr>
					<tr>
					<td>Use default conjunction list? </td><td><input type="checkbox" name="useDefault" checked><br><br></td>
					</tr>
					<tr>
					<td>Is your text file formatted? </td><td><input type="checkbox" name="isFormatted"><br><br></td>
					</tr>
					<tr>
					<td></td>
					<td><center><input type="submit" name="submit"></center></td>
					</tr>
				</table>
			</form>
			</td>
		</tr>
	</div>
</div>

<?php
	include 'footer.php';
?>