<?php
// Start the session
  require_once('startsession.php');
  
 // Insert the page header
  $page_title = '.::All Transaction';
  
  require_once('header.php');

 //$cust_id = $_SESSION['cust_id'];

?>
<?php



								//connecting,selecting the database.
								$connect = mysql_connect('localhost', 'root', '')
	   or die('Could not connect: ' . mysql_error());	
	$db = 'network';
	mysql_select_db($db) or die('Could not select database ('.$db.') because of : '.mysql_error());
                                $query = 'SELECT * FROM transaction';
	                            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
								// Printing results in HTML
	echo "<br><br><b style=\"color:#A8E91C;\">Fetched Information...</b><br>";
	echo "<table border='1' width='500' style=\"margin:0px auto;\">\n";
	echo "\t<tr>\n";
		echo "<th>Account Name</th>";
		echo "<th>Account No.</th>";
		echo "<th>Amount</th>";
		echo "<th>Recieve Accountname</th>";
		echo "<th>Recieve Accountno</th>";
		echo "<th>Transaction Type</th>";
		echo "<th>Time of Transaction</th>";
		echo "<th>Date of Transaction</th>";
	    echo "<th>Bank Name</th>";

	echo "</tr>";
	$count = 0;
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	   echo "\t<tr>\n";
	   foreach ($line as $col_value) {
		   echo "\t\t<td>$col_value</td>\n";
	   }
	   $count++;
	   echo "\t</tr>\n";
	}
	
	echo "</table>\n";
	
	if ($count < 1) {
		echo "<br><br>No rows were found in this table.<br><br>";
	} else {
		echo "<br><br>".$count." rows were found in this table.<br><br>";
	}
	
	// We will free the resultset...
	mysql_free_result($result);	
								?>
<?php echo'<a href="admin-profile.php">Click here to go to Admin Menu.</a>';?>
