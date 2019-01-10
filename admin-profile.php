<?php
// Start the session
  require_once('startsession.php');
 
 // Insert the page header
  $page_title = 'supervisor Profile';
  
  require_once('header.php');

  // Show the leftcontent
  //require_once('leftcontent.php');
  
 // require_once('logic/appvars.php');
  
  require_once('connectvars.php');
?>

<div id="hod-profile">

	<div class="hod-profile">
        
       <?php          	                   
   // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the user data from MySQL
	$query = "SELECT std_id, FullName, picture FROM student";
	
  	$data = mysqli_query($dbc, $query);
	
  // Loop through the array of user data, formatting it as HTML
   echo '<h4 style="font-size:1.3em; text-transform:uppercase; color:blue; text-align:center;">Admin Use Only</h4>';
  echo '<h4 style="font-size:1.2em; text-transform:uppercase; color:gray; text-align:center;">All Registered SIWES Students In <span style="font-size:1.1em; color:blue;">Abia Poly</span></h4>';
  
  echo '<ul class="thumbnails">';
  while ($row = mysqli_fetch_array($data)) {
    if (is_file(MM_UPLOADPATH . $row['picture']) && filesize(MM_UPLOADPATH . $row['picture']) > 0) {
      echo '<li><img src="' . MM_UPLOADPATH . $row['picture'] . '" alt="' . $row['FullName'] . '" />';
    }
    else {
      echo '<li><img src="' . MM_UPLOADPATH . 'nopix.png' . '" alt="' . $row['FullName'] . '" />';
    }
	//echo '<a style="color:red; font-size:0.7em; text-decoration:none;" href="admin-delete.php?staff_id=' . $row['staff_id'] . '">DELETE</a>&nbsp; <span style="color:blue;font-size:0.8em;text-transform:lowercase;">'. $row['fullname']. '</span></li>';
	
	 echo '<a style="color:red; font-size:0.7em; text-decoration:none;" href="admin-delete.php?std_id=' . $row['std_id'] . '">DELETE</a>&nbsp; <span style="color:blue;font-size:0.8em;text-transform:lowercase;">'. $row['FullName']. '</span></li>';
  }
  echo '</ul>';

  mysqli_close($dbc);
?>
       
                    
</div>
</div>
    
<?php
  // Insert the page footer
  require_once('footer.php');
?>