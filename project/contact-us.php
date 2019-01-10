<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <meta charset="utf-8">
    <title>Network Activity | Contact Us</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="../style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="../style.responsive.css" media="all">
   <link rel="stylesheet" href="form.css">

    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>



</head>
<body>
<div id="art-main">
    <div class="art-sheet clearfix">
<header class="art-header clearfix">


    <div class="art-shapes">
<h1 class="art-headline" data-left="20.95%">
    <a href="#">Diamond Bank Plc.</a>
</h1>
<h2 class="art-slogan" data-left="28.32%">SIMULATION OF BANKING MODEL FOR A CASHLESS SOCIETY<p style="color:orange;">(Designed By EMENYONU AMARACHI)</p></h2>

<div class="art-object851129558" data-left="1.12%"></div>

            </div>

                
                    
</header>
<nav class="art-nav clearfix">
    <ul class="art-hmenu"><li><a href="index.php">Home</a></li><li><a href="#">Login</a><ul><li><a href="customer-login.php">Customer Login</a></li><li><a href="login.php">Admin Login</a></li></ul></li><li><a href="about-us.html">About Us</a></li><li><a href="contact-us.php" class="active">Contact Us</a></li></ul> 
    </nav>
                        <div class="art-layout-cell art-content clearfix"><article class="art-post art-article">
                                <h2 class="art-postheader">Contact Us</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell" style="width: 50%" >
        <p><img width="149" height="149" alt="" class="art-lightbox" src="../images/images(3)(1).jpg" style="border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(156, 175, 196); border-right-color: rgb(156, 175, 196); border-bottom-color: rgb(156, 175, 196); border-left-color: rgb(156, 175, 196); border-top-width: 2px; border-right-width: 2px; border-bottom-width: 2px; border-left-width: 2px;">&nbsp;</p>
        <p><span style="font-weight: bold; font-size: 16px; color: #E2341D;">Corporate Headquaters</span></p>
        <p>Central Business District,Wuse 2<span style="font-weight: bold;"><br></span></p>
        <p>Herbert Macaulay Way,</p>
        <p>&nbsp;P.M.B 190,Garki,Abuja.<br></p>
        <p><span style="font-weight: bold; font-size: 16px; color: #E2341D;">For more enquiry</span></p>
        <p>Please fill out the comment on the form and be replied.</p>
        <p><br></p>
    </div><div class="art-layout-cell" style="width: 50%" >
  <?php    
	  if (isset($_POST['submit'])) {
$to= "justiceuche5@yahoo.com";  
$u=(empty ($_POST['name']))? die ('Please fill out all required form element(s) <a href="updatestaff.php">Click Here to go back</a>'):$_POST['name'];
$p=(empty ($_POST['phone']))? die ('Please fill out all required form element(s) <a href="updatestaff.php">Click Here to go back</a>'):$_POST['phone'];
$c=(empty ($_POST['comment']))? die ('Please fill out all required form element(s) <a href="updatestaff.php">Click Here to go back</a>'):$_POST['comment'];
$db = new mysqli('localhost', 'root', 'justice', 'network')
	or die('error connecting to MYSQL');
$SqlStatement ="INSERT INTO contact VALUES ('".$to."','".$u."','".$p."','".$c."')";
$result =$db ->query($SqlStatement);

if ($result) {
	echo 'Message Sent Sucessfully!!';
	header("refresh:2; url=contact-us.php");
	exit;
	}
else if (!$result) {
	echo 'Message Not Sent!!';
	header("refresh:5; url=contact-us.php");
	exit;
}
}
?>

	  
	  
	  
	  
	  
	   <div id="form">
	   
	    <div id="form_wrapper" class="form_wrapper">
					<form class="login active" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<h3>Customer Comment Form</h3>
						<div>
							<label>Customer Name:</label>
							<input type="text" name="name"  />
			
						</div>
						<div>
							<label>Phone Number: </label>
							<input type="text" name="phone"  />
							
						</div>
						<div>
							<label>Comment: </label>
							<textarea cols="10" rows="10" name="comment"></textarea>
						</div>
						<div class="bottom">
							<input type="submit" name="submit" value="Submit"></input>
							<a  rel="register" class="linkform"></a>
							<div class="clear"></div>
						</div>
					</form>
				</div>
	</div>
    </div>
    </div>
</div>
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell" style="width: 100%" >
        <p><br></p>
    </div>
    </div>
</div>
</div>
</article></div>
                    </div>
                </div>
            </div><footer class="art-footer clearfix">
<p><a href="index.php">Home</a> | <a href="about-us.html">About Us</a>&nbsp;| &nbsp;<a href="contact-us.php">Contact Us</a></p>
<p><a href="contact-us.php">Copyright © 2018. All Rights Reserved.</a></p>
<p><a href="contact-us.php"><br></a></p>
</footer>

    </div>
   
</div>


</body></html>