<?php
	include 'header.php';
	include 'UserModel.php';

	include_once('DatabaseModule.php');
	$dbMod = new DatabaseModule();
	$connection = $dbMod->connect();
	$userModel = new UserModel($connection);
	
	//	Redirect the user if they are not logged in
    if(!$loginModel->IsUserLoggedIn())
	{
        header("location: login.php?action=loginError");
    }	
	
	//	Redirect the user if they are logged in and but are not an admin
	else if ($loginModel->IsUserLoggedIn() && !$loginModel->isAdmin())
	{
		header("location: myFiles.php");
	}
?>

<div class="container">
    <br />
	
    <!-- User Information -->
	<div id="userOptions">
		<button id="toggleBtn" type="button" ><input id="selectAll" type="checkbox" /></button>
		<button id="add" type="button" name="add">Add</button>
		<button id="edit" type="button" name="edit">Edit</button>
		<button id="delete" type="button" name="delete">Delete</button>
	</div>
	
	<br /><br />
	
    <table id="userTable">
		<tr>
			<th></th>
			<th class="columnHeading">Username</th>
			<th class="columnHeading">E-mail</th>
			<th class="columnHeading">Full Name</th>
			<th class="columnHeading">Password</th>
			<th class="columnHeading">Last Logged In</th>
			<th class="columnHeading"># of Files Uploaded</th>
			<th class="columnHeading">Permission</th>
		</tr>
		
		<?php
			$requestedUsers = $userModel->QueryUserInfo(0, $userModel->TotalNumberOfUsers(), "", "");
			
			if ( is_array($requestedUsers) )
			{
				foreach ( $requestedUsers as $user )
				{					
					echo '<tr class="tcontent">';
					echo '<td><input type="checkbox" class="userCheckbox" /></td>';
					echo '<td class="userDetailsCell" width=200>';
					echo '<a href="#" onclick="window.open(\'editUserName.php?uname=' . $user['username'].'\', \'_blank\', \'width=200, height=200, resizable=no\' )">' . $user['username'] . '</a>';
					echo '</td>';
					echo '<td class="userDetailsCell" width=200><a href="#" onclick="window.open( \'editUserEmail.php?uname=' . $user['username'] . '\', \'_blank\', \'width=200, height=200, resizable=no\'  )" > ' . $user['email'] . '</a></td>';
					echo '<td class="userDetailsCell" width=200><a href="#" onclick="window.open( \'editUserRName.php?uname=' . $user['username'] . '\', \'_blank\', \'width=200, height=200, resizable=no\'  )" > ' . $user['name'] . '</a></td>';
					echo '<td class="userDetailsCell" width=200><button type="pwchange" onclick="window.open( \'editUserPassword.php?uname=' . $user['username'].'\', \'_blank\', \'width=200, height=200, resizable=no\'  )">Change Password</button></td>'; 
					echo '<td class="userDetailsCell" width=150>' . $user['Session'].'</td>';
					echo '</tr>';
				}			
			}
		?>
    </table>
</div>

<?php
	include 'footer.php';
?>