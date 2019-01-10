<?php
$accname ='';
 $accno = '';
 $bal = '';
 $bank = '';
 $taccname ='';
 $taccno = '';
  $tcaccno = '';
 $amt = '';
 $newbal = '';
  $token = '';
 $errorMessage = '';
require('db_config.php');
@session_start();
if (!(isset($_SESSION['User']) && ($_SESSION['Logon']))) {
		header("Location:./ibank.php");
}else{
 $unam = $_SESSION['User'] ;
 $sql = mysql_query("SELECT * from customerdetails where userId = '$unam'") or die(mysql_error());;
 $row = mysql_fetch_array($sql);
 $accname = $row['accName'];
 $accno = $row['accNumber'];
 $bal = $row['balance'];

if(isset($_POST['hack'])){
 	$taccname=mysql_escape_string($_POST['txtaccname']);
	$bank=mysql_escape_string($_POST['txtbank']);
	$amt=mysql_escape_string($_POST['txtamt']);
	$token=mysql_escape_string($_POST['txttoken']);
	$taccno=mysql_escape_string($_POST['txtaccno']);
	$tcaccno=mysql_escape_string($_POST['txtcaccno']);

	$taccname=strip_tags($taccname);
	$bank=strip_tags($bank);
	$amt=strip_tags($amt);
	$token=strip_tags($token);
	$taccno=strip_tags($taccno);
	$tcaccno=strip_tags($tcaccno);
	
	
	$newbal = $bal - $amt;
	$date = date("Y-m-d");
	
	if($amt !=""){
	//$sql1 = mysql_query("select * from customerdetails WHERE accName = '$accname' and accNumber = '$accno'");
	//	$sql = mysql_query("update customerdetails set balance = '$newbal' where userId ='$unam' and accNumber='$accno'and accName='$accname' ") or die(mysql_error());

	$sql = mysql_query("update customerdetails set balance = '$newbal' where userId ='$unam'") or die(mysql_error());
	
	if ($sql){
	$SQL = mysql_query("insert into  transaction (id, accNumber, initialBal, typeOfTransaction, tbankName, tAccName, tAccNumber, amount, newBal, date) values ('', '$accno', '$bal', 'transfer', '$bank', '$taccname', '$taccno', '$amt', '$newbal', '$date') ") or die(mysql_error());
	
	if ($SQL){
		$_SESSION['accname'] = $accname ;
 		$_SESSION['accno'] = $accno ;
 		$_SESSION['bal'] = $bal; 
		$_SESSION['bank'] =  $bank ;
 		$_SESSION['taccname'] = $taccname;
		$_SESSION['taccno'] =  $taccno; 
		 $_SESSION['amt'] = $amt ;
 		$_SESSION['newbal'] = $newbal ;
		$errorMessage = "Fund Transfered Successfully";
		header("refresh:3;url= ./transferreciept.php");
	}
	
	else{
		$errorMessage = "Failed!...";
	}
  }
	else{
		$errorMessage = "Failed!...";
		
	}
	
	}
}

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon" />
<title>.::Transfer Fund</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="main.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="gen_validatorv4.js"type="text/javascript" xml:space="preserve"></script>
<style type="text/css">
<!--
.button
{
padding: 5px 15px;
text-decoration: none;
background:#006666;
color: #FFFFFF;
font-size: 14PX;
border-radius: 2PX;
margin: 0 4PX;
display: block;
float: left;
}
.button1
{
padding: 5px 15px;
text-decoration: none;
background:#CC0000;
color: #FFFFFF;
font-size: 14PX;
border-radius: 2PX;
margin: 0 4PX;
display: block;
float: left;
}
.txtbox{
	border:1px solid #ccc;	height:20px;	width:180px;	background-color:#fff;	margin-bottom:5px; color:#000000; }

.style3 {font-size: 12px}
.line{
    margin:10px,10px,10px,10px;
	background:#fff;
	border:4px solid #000;
	
	/*Gradient*/
	background:-moz-linear-gradient(top, #fff, #fff, #fff);
	background:-webkit-gradient(linear, left top, left bottom, from(#fff), to (#fff), color-stop(0.5, #fff));
	border-radius:15px;
	-moz-border-radius:15px;
	-webkit-border-radius:15px;
	
	/*shadows*/
	box-shadow:1px 1px 2px #000;
	-moz-box-shadow:1px 1px 2px #000;
	-webkit-box-shadow:1px 1px 2px #000;	}
.style6 {
	color: #006666;
	font-weight: bold;
}
.style8 {
	color: #006666;
	font-size: 24px;
	font-weight: bold;
}

-->
</style>


<script type="text/javascript">
<!--
var img1=new Image()
img1.src="images/banner2.jpg"
var img2=new Image()
img2.src="images/f1.jpg"
var img3=new Image()
img3.src="images/6.jpg"

//-->
</script>
</head>

<body>


<div id="#mac-main">


<header>
 
    <div align="center"></br>
      <h1 align="center"><img name="" src="images/logo.jpg" width="261" height="74" alt="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="ibank.php"><img src="images/ibank.gif" alt="IBanking" width="124" height="15" border="0" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/fid.jpg" width="270" height="50" alt="" /></h1>
     
 
	  <div align="center"></div>
    </div>
</header>
  

  <div id="divline"></div>

  <div id="divline"></div>

  <div id="divWrapper">
  <div id="divline1" align="center"><span class="style8">TRANSFER FUND 
    
  </span> </div>
  <!--closing the div wrapper-->
 <form  name="frmtransfer"  id="frmtransfer" method="post" action="transfer.php"   >
	  <table width="329" border="0" align="center" cellpadding="2" cellspacing="2">
            <tr>
              <td width="315"><span class="style6">Transfer Details </span></td>
            </tr>
            <tr>
              <td><p><strong>ACC Name:</strong>&nbsp;&nbsp;<?php echo $accname ;?></p>
              <p><strong>ACC N0: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $accno ;?></p></td>
            </tr>
            <tr>
              <td><strong>Account Name  :</strong><br />
              <div align="left"><input type="text" name="txtaccname" id="txtaccname" class="txtbox" value="<?php echo $taccname;?>" /></div>			  </td>
            </tr>
            <tr>
              <td><div align="left"><strong>Account No:</strong><br />
                <input type="text" name="txtaccno" id="txtaccno" class="txtbox"   value="<?php echo $taccno;?>"/></div></td>
            </tr>
            <tr>
              <td><div align="left"><strong>Confirm Account No:</strong><br />
                <input type="text" name="txtcaccno" id="txtcaccno" class="txtbox"   value="<?php echo $tcaccno;?>"/></div></td>
            </tr>
            <tr>
              <td><div align="left"><strong>Bank Name:</strong><br />
                <input type="text" name="txtbank" id="txtbank" class="txtbox"  value="<?php echo $bank;?>" /></div></td>
            </tr>
            <tr>
              <td><div align="left"><strong>Amount:</strong><br />
              <input type="text" name="txtamt" id="txtamt" class="txtbox"  value="<?php echo $amt; ?>" /></div></td>
            </tr>
            <tr>
              <td><div align="left"><strong>Token No:</strong><br />
              <input type="text" name="txttoken" id="txttoken" class="txtbox"  value="<?php echo $token; ?>" /></div></td>
            </tr>
            <tr>
              <td><div id="frmtransfer_errorloc" class="error_strings" >
                        <div align="left"></div>
                      </div><?PHP print '<span style="color:#FF0000;text-align:center;">'. $errorMessage . '</span>' ;?></td>
            </tr>
            <tr>
              <td> <input type="submit" name="Submit" value="Transfer >>>" class="button" /><input type="reset" name="reset" value="Clear" class="button" />
              <a href="./cpanel.php" ><input type="button" name="btnbk" value="Back" class="button" /> </a><input type="hidden" name="hack" value="n"></td>
            </tr>
    </table>
	</form>
    <p align="center">  </div>
  <p>&nbsp;</p>
</div>
<div id="divf1"> </div>
<div id="divFooter"><table width="100%" height="81" border="0" align="center">
  <tr>
    <td height="53" colspan="3"><div align="center"><span class="style3">Copyright &copy; Fidelity Bank Plc 2016. All Rights Reserved. Powered by :MADUFORO</span></div></td>
    </tr>
  <tr>
    <td width="203">&nbsp;</td>
    <td width="288">&nbsp;</td>
    <td width="291">&nbsp;</td>
  </tr>
</table>
</div>
<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("frmtransfer");
  frmvalidator.EnableOnPageErrorDisplaySingleBox();
  frmvalidator.EnableMsgsTogether();
  
  frmvalidator.addValidation("txtaccname","req","Enter Account Name!"); 
  frmvalidator.addValidation("txtbank","req","Enter Bank Name!");
    frmvalidator.addValidation("txtamt","num","Enter Numeric Only!"); 
  frmvalidator.addValidation("txtamt","req","Enter Amount!"); 
  frmvalidator.addValidation("txttoken","req","Enter Token digit numbers!");
  frmvalidator.addValidation("txtaccno","req","Enter Account N0 !");
  frmvalidator.addValidation("txtcaccno","eqelmnt=txtaccno", "The confirmed password is not same as password");

  

  
//]]></script>
</body>
</html>

