<?php
// Start the session
  require_once('startsession.php');
  
 // Insert the page header
  $page_title = 'Change Login Details';
  
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
/*// If the cookie is empty, show any error message and the log-in form; otherwise confirm the log-in
if (empty($_COOKIE['cust_id'])) {
//<img src=".$error." alt="" style="position:absolute; top:35px;left:373px" />;
echo '<p style="color:red; font-size:1.2em; text-align:center;">' . $error_msg . '</p>';*/
// Start the session
  require_once('startsession.php');
  
 // Insert the page header
  $page_title = '.::Fund Transfer Page';
  
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
$query = "SELECT * FROM newaccount WHERE cust_id = '$id'";
$data = mysqli_query($db, $query)
or die('error');
$row = mysqli_fetch_array($data);
$amt= $row['username'];
$amt2= $row['password'];
//echo $amt;
//echo $amt2;
if (isset($_POST['submit'])) {
$oldname = (empty ($_POST['oldname']))? die ('Please fill out all required form element(s) <a href="change.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['oldname']));
$oldpass = (empty ($_POST['oldpass']))? die ('Please fill out all required form element(s) <a href="change.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['oldpass']));
$newname = (empty ($_POST['newname']))? die ('Please fill out all required form element(s) <a href="change.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['newname']));
$newpass = (empty ($_POST['newpass']))? die ('Please fill out all required form element(s) <a href="change.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['newpass']));
//cctransferno = mysqli_real_escape_string($db, trim($_POST['acctransferno']));
//$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
if($oldname == $amt && $oldpass ==$amt2){

//$db = new mysqli('localhost', 'root', 'justice', 'network')
	//or die('error connecting to MYSQL');
$sql = "update newaccount set username = '$newname',password = '$newpass' where cust_id = '$id'";
$result = $db->query($sql);
}
}
?>
				<div id="form_wrapper" class="registerr">
					<form class="register active" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<h3>Deposit Form</h3>
						<div class="column">
							<div>
								<label>Old Username:</label>
								<input type="text" name="oldname" />
							</div>
							
							<div>
								<label>New Username:</label>
								<input type="text" name="newname"/>
							</div>
                  
						</div>
						<div class="column">
						<div>
								<label>Old Password:</label>
								<input type="text" name="oldpass"/>
                            </div>
						<div>
								<label>New Password:</label>
								<input type="text" name="newpass"/>
							</div>
						</div>						
						<div class="bottom">
							<input type="submit" name="submit" value="Change"></input>
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
<p><a href="contact-us.php">Copyright © 2017. All Rights Reserved.</a></p>
<p><a href="contact-us.php"><br></a></p>
</footer>

    </div>
   
</div>


</body></html>

