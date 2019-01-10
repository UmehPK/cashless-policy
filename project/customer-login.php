<?php ob_start(); ?>
<?php
require_once('connectvars.php');
// Clear the error message
$error_msg = "";
// If the user isn't logged in, try to log them in
if (!isset($_COOKIE['cust_id'])) {
if (isset($_POST['submit'])) {
// Connect to the database
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Grab the user-entered log-in data
$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
if (!empty($user_username) && !empty($user_password)) {
// Look up the username and password in the database
$query = "SELECT cust_id, username FROM newaccount WHERE username = '$user_username' AND " .
"password ='$user_password'";
$data = mysqli_query($dbc, $query)
or die('error');
if (mysqli_num_rows($data) == 1) {
// The log-in is OK so set the user ID and username cookies, and redirect to the home page
$row = mysqli_fetch_array($data);
setcookie('cust_id', $row['cust_id']);
setcookie('username', $row['username']);

echo 'success';
$profile_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/customer-profile.php';
header('Location: ' . $profile_url);
}
else {
// The username/password are incorrect so set an error message
$error_msg = 'Sorry, you must enter a valid username and password to log in.';
}
}
else {
// The username/password weren't entered so set an error message
$error_msg = 'Sorry, you must enter your username and password to log in.';
}
}
}
?>


<?php
// Start the session
  //require_once('logic/startsession.php');
  
 // Insert the page header
  $page_title = 'Customer Login';
  
  require_once('header.php');

  // Show the leftcontent
  //require_once('leftcontent.php');
?>

<div id="login">

	<div id="form">
    
    <?php
// If the cookie is empty, show any error message and the log-in form; otherwise confirm the log-in
if (empty($_COOKIE['cust_id'])) {
//<img src=".$error." alt="" style="position:absolute; top:35px;left:373px" />;
echo '<p style="color:red; font-size:1.2em; text-align:center;">' . $error_msg . '</p>';
?>
				<div id="form_wrapper" class="form_wrapper">
					<form class="login active" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<h3>Customer Login</h3>
						<div>
							<label>Username:</label>
							<input type="text" name="username" id="red" />
							<span class="error">This is an error</span>
						</div>
						<div>
							<label>Password: </label>
							<input type="password" name="password" id="green" />
							<span class="error">This is an error</span>
						</div>
						<div class="bottom">
							<div class="remember"><input type="checkbox" /><span>Keep me logged in</span></div>
							<input type="submit" name="submit" value="Login"></input>
							<a href="create-account.php" rel="register" class="linkform">You don't have an account yet? Register here</a>
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
</div>

<?php
}
else {
// Confirm the successful log in
echo('<p class="login-msg" style="background:lightgreen;
	color:white;
	font-size:1.1em;
	width:455px;
	position:relative;
	text-transform:uppercase;
	top:3%;
	left:15%;
	padding:12px;
	text-align:center;">YOU ARE LOGGED IN AS ' . $_COOKIE['username'] . '.</p>');
}
?>
  <div class="art-postcontent art-postcontent-0 clearfix"><p><br></p></div>

                    </div>
                </div>
            </div><footer class="art-footer clearfix">
<p><a href="index.php">Home</a> | <a href="about-us.html">About Us</a>&nbsp;| &nbsp;<a href="contact-us.php">Contact Us</a></p>
<p><a href="contact-us.php">Copyright © 2017. All Rights Reserved.</a></p>
<p><a href="contact-us.php"><br></a></p>
</footer>

    </div>
   
</div>


</body></html>