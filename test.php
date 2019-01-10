<?php
// Insert the page header
  $page_title = 'Customer Login';
  
  require_once('header.php');
  
  
require_once('connectvars.php');
// Clear the error message
$error_msg = "";
// If the user isn't logged in, try to log them in
if (!isset($_COOKIE['cust_id'])) {
if (isset($_POST['submit'])) {

$dbc = mysqli_connect('localhost', 'root', 'justice', 'network');
// Connect to the database
//$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Grab the user-entered log-in data
$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

if (!empty($user_username) && !empty($user_password)) {
if($user_username == "a" && $user_password == "b"){
/*
// Look up the username and password in the database
$query = "SELECT id, username, password FROM test WHERE username = '$user_username' AND ".
 "password = 'user_password'";

$data = mysqli_query($dbc, $query)
or die('error');

if (mysqli_num_rows($data) == 1) {
// The log-in is OK so set the user ID and username cookies, and redirect to the home page
$row = mysqli_fetch_array($data);

echo  $row['username'];

setcookie('cust_id', $row['id']);
setcookie('username', $row['username']);

echo('success');*/

//$profile_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/about-us.html';
//header('Location: ' . 'about-us.html');
header('refresh:3, url=about-us.html');
exit();
}
else {
// The username/password are incorrect so set an error message
echo( 'Sorry, you must enter a valid username and password to log in.');
}
}
else {
// The username/password weren't entered so set an error message
echo('Sorry, you must enter your username and password to log in.');
}
}

}
 

  // Show the leftcontent
  //require_once('../leftcontent.php');
?>

<div id="form">
	   
	    <div id="form_wrapper" class="form_wrapper">
					<form class="login active" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						username:<input type="text" name="username" />
						password:<input type="text" name="password" />
						<input type="submit" name="submit" value="submit" />
					</form>
				</div>                                   
                <div class="art-postcontent art-postcontent-0 clearfix"><p><br></p></div>
</article></div>
                    </div>
                </div>
				

            </div><footer class="art-footer clearfix">
<p><a href="../index.php">Home</a> | <a href="../about-us.html">About Us</a>&nbsp;| &nbsp;<a href="file:///C|/xampp/htdocs/contact-us.php">Contact Us</a></p>
<p><a href="../contact-us.html">Copyright © 2016.Developed by MADUFORO BENEDICT All Rights Reserved.</a></p>
<p><a href="../contact-us.html"><br></a></p>
</footer>

    </div>
</div>


</body></html>