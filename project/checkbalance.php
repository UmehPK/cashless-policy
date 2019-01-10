<?php
// Start the session
  require_once('startsession.php');
  
 // Insert the page header
  $page_title = 'Check Balance';
  
  require_once('header.php');

 $cust_id = $_SESSION['cust_id'];

?>

<!--<div id="register">
	<div id="form">-->
    
<?php
 // Make sure the user is logged in before going any further.
	if (!isset($_SESSION['cust_id'])) {
	echo '<p class="login">Please <a href="customer-login.php">log in</a> to access this page.</p>';
	exit();
	}
	
?>

<div id="login">

	<div id="form">
    
    <?php
	require_once('connectvars.php');
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$id= $_SESSION['cust_id'];
	if (isset($_POST['submit'])) {
$accname = (empty ($_POST['accname']))? die ('Please fill out all required form element(s) <a href="withdraw.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['accname']));
$accnumber = (empty ($_POST['accnumber']))? die ('Please fill out all required form element(s) <a href="withdraw.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['accnumber']));
$accounttype = (empty ($_POST['amount']))? die ('Please fill out all required form element(s) <a href="withdraw.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['amount']));
//$acctranfer = (empty ($_POST['acctranfer']))? die ('Please fill out all required form element(s) <a href="withdraw.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['acctranfer']));
//$acctransferno = (empty ($_POST['acctransferno']))? die ('Please fill out all required form element(s) <a href="withdraw.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['acctransferno']));
$query = "SELECT * FROM newaccount WHERE cust_id = '$id'";
$data = mysqli_query($db, $query)
or die('error');
$row = mysqli_fetch_array($data);
$amt= $row['Amount'];
echo $amt;



/*// If the cookie is empty, show any error message and the log-in form; otherwise confirm the log-in
if (empty($_COOKIE['cust_id'])) {
//<img src=".$error." alt="" style="position:absolute; top:35px;left:373px" />;
echo '<p style="color:red; font-size:1.2em; text-align:center;">' . $error_msg . '</p>';*/
}
?>
				<div id="form_wrapper" class="registerr">
					<form class="register active" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<h3>Check Balance</h3>
						<div class="column">
							<div>
								<label>Account Name:</label>
								<input type="text" name="accname" />
							</div>
							
							<div>
								<label>Account Number:</label>
								<input type="text" name="accnumber"/>
							</div>
  
						</div>
						<div class="column">
						<div>
								<label>Account Type:</label>
								<select name="accounttype">
                                <option value="" selected="selected">Select Type</option>
                                <option value="Savings">Savings</option>
                                <option value="Current">Current</option>
                                </select>
                            </div>
						<div>
								<label>Account Balance in Naira:</label>
							<label><?php echo '<center style="font-size:20px; font-weight:bold;">' .$amt.'.</center>';?></label>
							</div>

						
					</div>						
						<div class="bottom">
							<input type="submit" name="submit" value="Check Balance"></input>
							<a rel="register" class="linkform"></a>
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>

 </div>
 <footer class="art-footer clearfix">
<p><a href="index.html">Home</a> | <a href="about-us.html">About Us</a>&nbsp;| &nbsp;<a href="contact-us.php">Contact Us</a></p>
<p><a href="contact-us.php">Copyright © 2016. All Rights Reserved.</a></p>
<p><a href="contact-us.php"><br></a></p>
</footer>

    </div>
   
</div>


</body></html>