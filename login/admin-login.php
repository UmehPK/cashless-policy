<?php
require_once('connectvars.php');
// Clear the error message
$error_msg = "";
// If the user isn't logged in, try to log them in
if (!isset($_COOKIE['admin'])) {
if (isset($_POST['submit'])) {
// Connect to the database
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Grab the user-entered log-in data
$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

if (!empty($user_username) && !empty($user_password)) {
	
if($user_username == "admin" && $user_password == "admin"){

//setcookie('admin', $user_username);
//setcookie('username', $user_username);
$profile_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '../admin-profile.php';
header('Location: ' . $profile_url);
}
else {
// The username/password are incorrect so set an error message
$error_msg = 'Please, if you are not the admin, kindly leave this page.';
}
}
else {
// The username/password weren't entered so set an error message
$error_msg = 'Sorry, you must enter your username and password to log in.';
$error="webimages/ALERT1.jpg";
}
}
}
?>


<?php
// Start the session
  //require_once('logic/startsession.php');
  
 // Insert the page header
  $page_title = 'Admin Login';
  
  require_once('../header.php');

  // Show the leftcontent
  //require_once('leftcontent.php');
?>
<div id="form">
    
    <?php
// If the cookie is empty, show any error message and the log-in form; otherwise confirm the log-in
if (empty($_COOKIE['cust_id'])) {
//<img src=".$error." alt="" style="position:absolute; top:35px;left:373px" />;
echo '<p style="color:red; font-size:1.2em; text-align:center;">' . $error_msg . '</p>';
?>

                        <div class="art-layout-cell art-content clearfix"><article class="art-post art-article">
                                <h2 class="art-postheader">Admin Login</h2>
                                                
												<div id="form_wrapper" class="form_wrapper">
					<form class="login active" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<h3>ADMIN Login</h3>
						<div>
							<label>Username:</label>
							<input type="text" name="username" />
							<span class="error">This is an error</span>
						</div>
						<div>
							<label>Password: <a href="forgot_password.html" rel="forgot_password" class="forgot linkform">Forgot your password?</a></label>
							<input type="password" name="password" />
							<span class="error">This is an error</span>
						</div>
						<div class="bottom">
							<div class="remember"><input type="checkbox" /><span>Keep me logged in</span></div>
							<input type="submit" name="submit" value="Login"></input>
							<a href="register.html" rel="register" class="linkform">You don't have an account yet? Register here</a>
							<div class="clear"></div>
						</div>
					</form>
				</div>

												
												
												
												
                <div class="art-postcontent art-postcontent-0 clearfix"><p><br></p></div>
</article></div>
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

            </div><footer class="art-footer clearfix">
<p><a href="index.html">Home</a> | <a href="about-us.html">About Us</a>&nbsp;| &nbsp;<a href="../contact-us.php">Contact Us</a></p>
<p><a href="contact-us.html">Copyright © 2016.Developed by MADUFORO BENEDICT All Rights Reserved.</a></p>
<p><a href="contact-us.html"><br></a></p>
</footer>

    </div>
   
</div>


</body></html>