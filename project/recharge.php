<?php
// Start the session
  require_once('startsession.php');
  
 // Insert the page header
  $page_title = 'Recharge Page';
  
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
$amt= $row['Amount'];
$acctname=$row['Name'];
$acctnum=$row['Accountnum'];
//echo $amt;
if (isset($_POST['submit'])) {
//$accname = (empty ($_POST['accname']))? die ('Please fill out all required form element(s) <a href="recharge.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['accname']));
//$accnumber = (empty ($_POST['accnumber']))? die ('Please fill out all required form element(s) <a href="recharge.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['accnumber']));
$amount = (empty ($_POST['amount']))? die ('Please fill out all required form element(s) <a href="recharge.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['amount']));
$network = (empty ($_POST['network']))? die ('Please fill out all required form element(s) <a href="recharge.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['network']));
$phonenumber = (empty ($_POST['phonenumber']))? die ('Please fill out all required form element(s) <a href="recharge.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['phonenumber']));
//$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
	$newbal = $amt - $amount;
	$date = date("Y-m-d");
//$db = new mysqli('localhost', 'root', 'justice', 'network')
	//or die('error connecting to MYSQL');
$sql = "update newaccount set Amount = '$newbal' where cust_id = '$id'";
$result = $db->query($sql);

$db = new mysqli('localhost','root','','network');
$query = "INSERT INTO transaction VALUES ('".$acctname."','".$acctnum."','".$amount."','".$network."','".$phonenumber."','Recharge', NOW(),'".$date."','VTU')";
$result= $db ->query($query);

echo '<center style="font-size:20px; font-weight:bold;">'.$phonenumber.'&nbsp;'. 'was Recharged Successfully'.'</center>'; 

/*// If the cookie is empty, show any error message and the log-in form; otherwise confirm the log-in
if (empty($_COOKIE['cust_id'])) {
//<img src=".$error." alt="" style="position:absolute; top:35px;left:373px" />;
$error_msg=
echo '<p style="color:red; font-size:1.2em; text-align:center;">' . $error_msg . '</p>';*/
}

?>
				<div id="form_wrapper" class="registerr">
					<form class="register active" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<h3>Phone Recharge Form</h3>
						<div class="column">
							<div>
								<label>Select Network:</label>
								<!--<input type="text" name="accname" />-->
								<select name="network">
                                <option value="" selected="selected">Select Type</option>
                                <option value="MTN">MTN</option>
                                <option value="GLO">GLO</option>
								<option value="AIRTEL">AIRTEL</option>
								<option value="ETISALAT">ETISALAT</option>
                                </select>
							</div>
							
							<div>
								<label>Phone Number:</label>
								<input type="text" name="phonenumber"/>
							</div>
                  
                            							 <div>
								<label>Amount To Recharge:</label>
								<input type="text" name="amount" />
							</div>
							
						</div>
						<div class="column">
						<div>
								<label>Account Name:</label>
								<label><?php echo '<center style="font-size:20px; font-weight:bold;">' .$acctname.'.</center>';?></label>

								<!--<select name="accounttype">
                                <option value="" selected="selected">Select Type</option>
                                <option value="Savings">Savings</option>
                                <option value="Current">Current</option>
                                </select>-->
                            </div>
						<div>
								<label>Account Number:</label>
							<label><?php echo '<center style="font-size:20px; font-weight:bold;">' .$acctnum.'.</center>';?></label>

							</div>

						
							<div>
								<label> Account Balance in Naira:</label>
								<!--<input type="text" name="withdrawername"/>-->
								<label><?php echo '<center style="font-size:20px; font-weight:bold;">' .$amt.'.</center>';?></label>
							</div>
														<!--<div>
							<label>Upload Image:</label>
							<input type="file" name="image" id="image">
					</div>-->
						</div>						
												
						<div class="bottom">
							<input type="submit" name="submit" value="Recharge"></input>
							<a rel="register" class="linkform"></a>
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
</div>
