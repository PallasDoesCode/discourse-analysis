<?php 
    include 'header.php';
    //if the user is not logged in then it will redirect them to the login page
    if(!$userMod->IsUserLoggedIn()){
        header("location: login.php?action=loginError");
    }
    include 'fileModule.php';
?>

<style>
    .leftButtonPanel{
        padding-bottom: 20px;
        margin-left: auto;
        margin-right: auto;
        width:40%;
        height: 30px;
    }
    .leftButtonPanel li{
        padding-bottom: 20px;
        list-style: none;
        display: inline-block;
    }
    
</style>
<div class="container">
    <br />
    <!--<div style="width:80%; margin-left: 10%; top: -5%;"> 
        <table align="center" id="myFileHeaderTable">
            <tr><th class="checkbox"></th><th class="fileName">File Name</th><th class="fileSize">File Size ?</th><th class="lastUpdate">Last Updated</th><th class="owner">Owner</th><td class="empty"></td></tr>
        </table>
    </div>
    <div style="height: 500px; width: 80%; overflow-y:auto; overflow-x: hidden; margin-left: 10%; top:-10%;">
        <table align="center" id="myFileTable">
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td class="checkbox"><input type="checkbox" id="someID" ></td><td class="fileName">Some Other File Name </td><td class="fileSize">75 KB</td><td class="lastUpdate">2/4/2013 9:47 AM</td><td class="owner">John Doe</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name 2 </td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>            
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr class="evenTableRow"><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
            <tr><td><input type="checkbox" id="someID" ></td><td>Some File Name</td><td>55 KB</td><td>2/26/2013 9:02 AM</td><td>Justin Ervin</td></tr>
        </table>
    </div>-->
    <div style="height: 500px; width: 80%; overflow-y:auto; overflow-x: hidden; margin-left: 10%; top:-10%;">
    	<?php
    		//get files from database here and put them into a table
    		$fileMod = new FileModule($connection);
    		$userName = $userMod->getUserName();
    		$fileArray = $fileMod->getFilesInfo($userName);
    	
    		echo "<table align='center' id='myFileTable'>
    					<tr>
    						<th></th>
    						<th>File Name</th>
    						<th>Public</th>
    						<th>Last Update</th>
    					</tr>";
    		for($i=0; $i<count($fileArray); $i++) { //loop through every row
    			$row = $fileArray[$i];
    			$fileName = $row['fileName'];
    			
    			if ($row['public']) { 	$public = "Yes";}
    			else { 					$public = "No";}
    			
    			$lastUpdate = $row['lastUpdate'];
    			
    			if ($i%2 == 0) { //if even row, then set row's class
    				$class = "class='evenTableRow'";
    			}
    			else {
					$class = "";
    			}
    			
    			echo "<tr $class>";
    			echo "<td><input type='checkbox' id='$fileName'></td>
    				  <td>$fileName</td>
    				  <td>$public</td>
    				  <td>$lastUpdate</td>";
    		 	echo "</tr>";
    		}
    		echo "</table>";
    
    	?>
    </div>
    <div class="leftButtonPanel">
        <ul>
            <li><a class="navButton" href="applet.html" target="_blank">Edit in workspace</a></li>
            <li><a class="navButton" href="" >View in workspace</a></li>
            <li><a class="navButton" href="" >Delete File</a></li>
        </ul>
    </div>






</div>
<?php include 'footer.php';?>

