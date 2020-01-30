<?php
session_start();
$conn = mysqli_connect("sql311.byetcluster.com","b13_17335684","harishots","b13_17335684_lilo");
	
$message="";
if(!empty($_POST["login"])) {
	$result = mysqli_query($conn,"SELECT * FROM users WHERE user_name='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["user_id"] = $row['user_id'];
	} else {
	$message = "Invalid Username or Password!";
	}
}
if(!empty($_POST["logout"])) {
	$_SESSION["user_id"] = "";
	session_destroy();
}
?>
<html>
	<head>
		<title>GLAMS - Bee Smart</title>
		<link rel="stylesheet" href="style.css"/>
		<link rel="shortcut icon" href="logo.ico"/>
	</head>
	<body>
	<div id="header">
	<div id="logo"><img src="logo.png"></div>
	<div id="menu">
		<a href="#contact"><li>Contact Us</li></a>
		<a href="index.html"><li style="color:#19acca;">Home</li></a>
	</div>
	</div>
	<div class="space"></div>
	<a name="home">
	<div class="content">
	<div id="intro"><p><b>FEEL THE DIFFERENCE WITH US</b></p><ul>
<li class="hl">Admission Related Help Desk - 7251813111, 7251814111, 7251815111, 7251816111</li></br>
<li class="hl">New Admission Form Filling, Document Upload Related Help Desk - 9068557136</li></br>
<li class="hl">Hostel Booking Related Help Desk - 9068557140</li></br>
<li>Our Mission, envision ourselves as a Pace-setting University of Academic Excellence focused on Education, Research and Development in Established and Emerging Professions.</li><br/>
<li class="hl">PREP App - Student's Employability Enhancement Design<img src="icon_new.gif" class="new"></li></br>
<li class="hl">PREP Seed - Student's Employability Practice Portal<img src="icon_new.gif" class="new"></li>
</ul>
 </div>
<div id="form">
<div id="form1"><center>
<p>Login to find out more!</p><br/>
<?php if(empty($_SESSION["user_id"])) { ?>
<form method="post" action="">
<div id="error-message" style="height:auto;background-color:rgba(0,0,0,0);text-align:center;color:#FF0000;border:0px;"><?php if(isset($message)) { echo $message; } ?></div>
<select name="type">
	<option selected="selected" value="Regular Student">Regular Student</option>
	<option value="New Admission">New Admission</option>
</select>
<input type="text" placeholder="User ID" name="user_name">
<input type="password" placeholder="PASSWORD" name="password">
<input type="submit" value="LOGIN" class="button">
</form>
<a style=" text-decoration:underline; cursor:pointer; color:White; font-size: 14px;" onclick="window.alert('Improve Your Memory...')">Forgot Password</a>

<?php 
} else { 
$result = mysqlI_query($conn,"SELECT * FROM users WHERE user_id='" . $_SESSION["user_id"] . "'");
$row  = mysqli_fetch_array($result);
?>
<form action="" method="post" id="frmLogout">
<div class="member-dashboard">Welcome <?php echo ucwords($row['display_name']); ?>, You have successfully logged in!<br>
Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
</form>
<?php } ?>

</center>
</div>
</div>
	</div></a>
	<div class="space"></div>
	<div class="space"></div>
	
	<a name="contact">
	<div class="space" style="background-color:white;"></div>
	<div id="contact"><center><h2>CONTACT US</h2>
	<p>
NEED ANY HELP? WE WOULD LOVE TO HEAR FROM YOU</br>
</br>
GLA UNIVERSITY </br>
17KM STONE, NH-2, </br>
MATHURA-DELHI ROAD </br>
MATHURA-281 406 (U.P.) INDIA </br>
 +91-5662-250900, +91-5662-250909 </br>
 WWW.GLA.AC.IN    GLAUSOFTWARESUPPORT@GLA.AC.IN</p></center>
 </div>
	</a>
	<div id="footer"><p>GLAMS © 2015 GLA University All Right Reserved.</p></div>
	</body>
</html>