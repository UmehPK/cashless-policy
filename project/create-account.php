<?php
require_once('startsession.php');

@$cust_id = $_SESSION['admin'];
                                 
 // Insert the page header
  $page_title = 'Create Account Page';
  
  require_once('header.php');


								?>
								<?php

if (isset($_POST['submit'])) {
$random= mt_rand();
$name=(empty ($_POST['name']))? die ('Please fill out all required form element(s) <a href="create-account.php">Click Here to go back</a>'):$_POST['name'];
$sex=(empty ($_POST['sex']))? die ('Please fill out all required form element(s) <a href="create-account.php">Click Here to go back</a>'):$_POST['sex'];
$dob=(empty ($_POST['dob']))? die ('Please fill out all required form element(s) <a href="create-account.php">Click Here to go back</a>'):$_POST['dob'];
$occup=(empty ($_POST['occup']))? die ('Please fill out all required form element(s) <a href="create-account.php">Click Here to go back</a>'):$_POST['occup'];
$state=(empty ($_POST['state']))? die ('Please fill out all required form element(s) <a href="create-account.php">Click Here to go back</a>'):$_POST['state'];
$status=(empty ($_POST['status']))? die ('Please fill out all required form element(s) <a href="create-account.php">Click Here to go back</a>'):$_POST['status'];
$username=(empty ($_POST['username']))? die ('Please fill out all required form element(s) <a href="create-account.php">Click Here to go back</a>'):$_POST['username'];
$password=(empty ($_POST['password']))? die ('Please fill out all required form element(s) <a href="create-account.php">Click Here to go back</a>'):$_POST['password'];
//$rpassword=(empty ($_POST['rpassword']))? die ('Please fill out all required form element(s) <a href="create-account.php">Click Here to go back</a>'):$_POST['rpassword'];
$phone=(empty ($_POST['phone']))? die ('Please fill out all required form element(s) <a href="create-account.php">Click Here to go back</a>'):$_POST['phone'];
$accounttype=(empty ($_POST['accounttype']))? die ('Please fill out all required form element(s) <a href="create-account.php">Click Here to go back</a>'):$_POST['accounttype'];
$accountamt=(empty ($_POST['accounttype']))? die ('Please fill out all required form element(s) <a href="create-account.php">Click Here to go back</a>'):$_POST['accountamt'];

$db = new mysqli('localhost', 'root', '', 'network')
	or die('error connecting to MYSQL');
$SqlStatement ="INSERT INTO newaccount(cust_id,Name,Accountnum,Sex,DOB,Occupation,State,Status,username,password,phone,Accounttype,Amount) VALUES (0,'".$name."','".$random."','".$sex."','".$dob."','".$occup."','".$state."','".$status."','".$username."','".$password."','".$phone."','".$accounttype."','".$accountamt."')";
$result =$db ->query($SqlStatement);


/*$random= mt_rand();

$db = new mysqli('localhost', 'root', 'justice', 'network')
	or die('error connecting to MYSQL');

$SqlStatement ="INSERT INTO test(id,username,accountno,accounttype,amount) VALUES (0,'".$name."','".$random."','".$accounttype."','".$accountamt."')";
$data =$db ->query($SqlStatement);
*/
if ($result) {
    echo'<div style="background-color:gainsboro; height:100px;">';
    echo '<center><h1>Account Created Sucessfully!!</h1></center>'."<br/>";
    echo  "<center><h2>Your Account Number is : </h2></center>" . "<center><h2>". $random. "</h2></center>";
	//echo   "<center>". mt_rand(). "</center>";
	echo '</div>';
	//header("refresh:5; url=create-account.php");
	
	exit;
	}
else if (!$result) {
	echo 'Failed To Create Account!!';
	//header("refresh:5; url=create-account.php");
	exit;
}
}
?>

<?php
//echo  "Your Account Number is :" . mt_rand();


?>



						<div id="register">
	<div id="form">

								
								
								<div id="form_wrapper" class="registerr">
					<form class="register active" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<h3>Create New Account</h3>
						<div class="column">
							<div>
								<label>Full Name:</label>
								<input type="text" name="name" placeholder="Enter Your Full Name" />
							</div>
							<div>
								<label>Sex:</label>
								<select name="sex">
                                <option value="" selected="selected">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                </select>
							</div>
							<div>
								<label>Date of Birth:</label>
								<input type="text" name="dob" placeholder="YYYY/MM/DD"/>
							</div>
                  
                            <div>
								<label>Occupation:</label>
								<input type="text" name="occup" placeholder="Enter Your Occupation"/>
							</div>
							 <div>
								<label>State:</label>
								<input type="text" name="state" placeholder="Enter Your State"/>
							</div>
							
						</div>
						<div class="column">
							<div>
								<label>Username:</label>
								<input type="text" name="username" placeholder="Username"/>
							</div>
							<div>
								<label>Password:</label>
								<input type="password" name="password" placeholder="Password"/>
							</div>
							<div>
								<label>M/Status:</label>
								<input type="text" name="status" placeholder="Enter Your Marital Status"/>
							</div>                            <div>
								<label>Phone Number:</label>
								<input type="text" name="phone" placeholder="Enter Your Phone Number"/>
                            </div> 
							 <div>
								<label>Account Type:</label>
								<select name="accounttype">
                                <option value="" selected="selected">Select Type</option>
                                <option value="Savings">Savings</option>
                                <option value="Current">Current</option>
                                </select>
                            </div> 
							<div>
							<label>Initial Deposit:</label>
							<input type="text" name="accountamt" >
					</div>
						</div>
						<div class="bottom">
							<div class="remember">
							</div>
							<input type="submit" name="submit" value="Register" />
							<a  rel="login" class="linkform"></a>
							<div class="clear"></div>
						</div>
					</form>
				</div>

								
								
								
								
								
								
								
								
								
								
								
								
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><p><br></p></div>
</article></div>
                    </div>
                </div>
            </div><footer class="art-footer clearfix">
<p><a href="index.php">Home</a> | <a href="about-us.html">About Us</a>&nbsp;| &nbsp;<a href="contact-us.php">Contact Us</a></p>
<p><a href="contact-us.php">Copyright © 2018.Developed by EMENYONU AMARACHI All Rights Reserved.</a></p>
<p><a href="contact-us.php"><br></a></p>
</footer>

    </div>
   
</div>


</body></html>