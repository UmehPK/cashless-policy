<?php
// Start the session
  require_once('startsession.php');
  
 // Insert the page header
  $page_title = 'Customer profile';
  
  require_once('header.php');

?>

<div id="login">

	<div id="form">
	<?php
				echo '<center style="text-transform:uppercase;"><h1>Welcome To Your Profile</h1>' .$_COOKIE['username']. '.</center>';
     ?>		
	 <div style="text-align:center; font-size:20px; ">
	            <p>Here, <?php echo '<span style="text-transform:uppercase;" >'.$_COOKIE['username'].'.</span>'; ?> you can perform any of this transaction in your account that are available to you.
				<h3>Which are as follows;</h3>
				<ol>
				   <li>Make Fund Transfer</li>
				   <li>Make Phone Recharge</li>
				   <li>Check Your Balance Information</li>
				   <li>And Logout if you are done with your Transaction</li>
				   
				</ol>
				<p>Note<span style="color:red">*</span>Remember to keep safe your login details as for any loss the Bank will not be held responsible.</p>
				<h4>Thanks for Choosing <span style="color:#00FF00">DIAMOND BANK</span></h4>
				</p>
	 
	 </div>
			<div class="clear"></div>
			</div>
</div>
       </div>
            </div><footer class="art-footer clearfix">
<p><a href="index.html">Home</a> | <a href="about-us.html">About Us</a>&nbsp;| &nbsp;<a href="contact-us.php">Contact Us</a></p>
<p><a href="contact-us.php">Copyright © 2017.All Rights Reserved.</a></p>
<p><a href="contact-us.php"><br></a></p>
</footer>

    </div>
   
</div>


</body></html>