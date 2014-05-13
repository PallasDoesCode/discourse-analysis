<?php
	include 'header.php';
	include 'AdminModule.php';

	include_once('DatabaseModule.php');
	$dbMod = new DatabaseModule();
	$connection = $dbMod->connect();
	$adminUserMod = new AdminUserModule($connection);
    //if the user is not logged in then it will redirect them to the login page
	
    if(!$userMod->IsUserLoggedIn()){
        header("location: login.php?action=loginError");
    }
	
?>

<script type="text/javascript">
	$(document).ready(function()
	{
		/*
		*	This click event marks/unmarks the select all
		*	checkbox when its button container has been
		*	clicked then it marks/unmarks all the checkboxes
		*	in the table. 
		*/
		var checkAllBtn = $("#toggleBtn");
		var selectAllcheckbox = $("#selectAll");
		var checkboxes = $(".userCheckbox");
		
		checkAllBtn.click(function()
		{
			if (selectAllcheckbox.is(':checked'))
			{
				selectAllcheckbox.prop("checked", false);
				checkboxes.prop("checked", false);
			}
			
			else
			{
				selectAllcheckbox.prop("checked", true);
				checkboxes.prop("checked", true);
			}
		});
	});
	
</script>

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
			
			if($userMod->isAdmin())
			{
                $requestedUsers = $adminUserMod->QueryUserList(0, $adminUserMod->TotalNumberOfUsers(), "", "");
                
                if ( is_array($requestedUsers) )
                {
                    foreach ( $requestedUsers as $user )
                    {
                        echo '<tr class="tcontent">';
						echo '<td><input type="checkbox" class="userCheckbox" /></td>';
                        echo '<td class="userDetailsCell" width=200>';
                        echo '<a href="#" onclick="window.open(\'editUserName.php?uname='.$user['username'].'\', \'_blank\', \'width=200, height=200, resizable=no\' )">'.$user['username'].'</a>';
                        echo '</td>';
                        echo '<td class="userDetailsCell" width=200><a href="#" onclick="window.open( \'editUserEmail.php?uname='.$user['username'].'\', \'_blank\', \'width=200, height=200, resizable=no\'  )" > '.$user['email'].'</a></td>';
                        echo '<td class="userDetailsCell" width=200><a href="#" onclick="window.open( \'editUserRName.php?uname='.$user['username'].'\', \'_blank\', \'width=200, height=200, resizable=no\'  )" > '.$user['name'].'</a></td>';
                        echo '<td class="userDetailsCell" width=200><button type="pwchange" onclick="window.open( \'editUserPassword.php?uname='.$user['username'].'\', \'_blank\', \'width=200, height=200, resizable=no\'  )">Change Password</button></td>'; 
                        //echo '<td class="userDetailsCell" width=150>'.$user['Session'].'</td>';
						echo '</tr>';
                        
                    }			
                }
            }
			?>
    </table>
</div>

<?php
	include 'footer.php';
?>