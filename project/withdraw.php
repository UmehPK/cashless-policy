<?php
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
$amt= $row['Amount'];
$acctname=$row['Name'];
$acctnum=$row['Accountnum'];

//echo $amt;
if (isset($_POST['submit'])) {
$amount = (empty ($_POST['amount']))? die ('Please fill out all required form element(s) <a href="withdraw.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['amount']));
$acctranfer = (empty ($_POST['acctranfer']))? die ('Please fill out all required form element(s) <a href="withdraw.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['acctranfer']));
$acctransferno = (empty ($_POST['acctransferno']))? die ('Please fill out all required form element(s) <a href="withdraw.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['acctransferno']));
$bankname = (empty ($_POST['bankname']))? die ('Please fill out all required form element(s) <a href="withdraw.php">Click Here to go back</a>'):mysqli_real_escape_string($db, trim($_POST['bankname']));

//$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
	$newbal = $amt - $amount;
	$date = date("Y-m-d");
//$db = new mysqli('localhost', 'root', 'justice', 'network')
	//or die('error connecting to MYSQL');
$sql = "update newaccount set Amount = '$newbal' where cust_id = '$id'";
$result = $db->query($sql);



$db = new mysqli('localhost','root','','network');
$query = "INSERT INTO transaction VALUES ('".$acctname."','".$acctnum."','".$amount."','".$acctranfer."','".$acctransferno."','Transfer', NOW(),'".$date."','".$bankname."')";
$result= $db ->query($query);

$querys = "SELECT * FROM newaccount WHERE Accountnum = '$acctransferno'";
$data = mysqli_query($db, $querys)
or die('error');
$row = mysqli_fetch_array($data);
$amta= $row['Amount'];

$newbals = $amta + $amount;

$sql = "update newaccount set Amount = '$newbals' where Accountnum = '$acctransferno'";
$results = $db->query($sql);


echo '<center style="font-size:20px; font-weight:bold;">'.$amount.'&nbsp;'. 'was Transfered To'.'&nbsp;'. $acctransferno .'&nbsp;'.'Successfully'.'</center>'; 


}
?>
				<div id="form_wrapper" class="registerr">
					<form class="register active" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<h3>Fund Transfer Form</h3>
						<div class="column">
							<div>
								<label>Account Name:</label>
					         <label><?php echo '<center style="font-size:20px; font-weight:bold;">' .$acctname.'.</center>';?></label>
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
                  
                            							 
							
						</div>
						<div class="column">
						<div>
						<div>
								<label>Amount to Transfer in  Naira:</label>
								<input type="text" name="amount" />
							</div>
								<label>Bank Name:</label>
								<!--<input type="text" name="acctranfer"/>-->
								<select name="bankname">
                                <option value="" selected="selected">Select Type</option>
                                <option value="Diamond Bank">Diamond Bank</option>
                                <option value="Access Bank">Access Bank</option>
								<option value="Fidelity Bank">Fidelity Bank</option>
								<option value="Enterprise Bank">Enterprise Bank</option>
                                </select>
                            </div>
						<div>
								<label>Account Name  To Tranfer :</label>
								<input type="text" name="acctranfer"/>
								<!--<select name="accounttype">
                                <option value="" selected="selected">Select Type</option>
                                <option value="Savings">Savings</option>
                                <option value="Current">Current</option>
                                </select>-->
                            </div>
						<div>
								<label>Account Number To Transfer:</label>
								<input type="text" name="acctransferno"/>
							</div>
														<!--<div>
							<label>Upload Image:</label>
							<input type="file" name="image" id="image">
					</div>-->
						</div>						
						<div class="bottom">
							<input type="submit" name="submit" value="Transfer"></input>
							<a rel="register" class="linkform"></a>
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
</div>


<?php
  // Insert the page footer
  //require_once('footer.php');
?>