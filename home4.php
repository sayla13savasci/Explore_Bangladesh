
<?php 
	
	session_start();

	if($_SERVER["REQUEST_METHOD"]=="POST"){
			if(isset($_POST['btn1']))
	{
		
		$password = $_POST["password"];
		$email = $_POST["email"];
	
		$db_handle = mysqli_connect("localhost","root","","travelAndTour");
		// $db_found = mysqli_select_db($db_handle,"restaurant");

		$SQL = "SELECT * FROM users where password='$password' and email='$email'";
		$result = mysqli_query($db_handle,$SQL);
		$row=mysqli_fetch_array($result);
		
			
		if(mysqli_num_rows($result)){
			$_SESSION['id']=$row['user_id'];
				header("Location:home.php");
		}
	   	else{
		echo "<h1 style='color:red;'>Failed to Login!!. </h2>";
		}
	   		mysqli_close($db_handle);
	}
	
}
?>

<?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
		
			if(isset($_POST['btn2']))
	{
    
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
		
		$password=md5($password);
        
        
        $con=new mysqli("localhost","root","", "travelAndTour");
                    // ^host       ^username  ^database name

        $sql="insert into users(fname,lname,email,phone,password) values
              ('$fname','$lname','$email','$phone','$password')";

      $result=$con->query($sql);
        if ($con->affected_rows > 0) {
           // echo "<h1 style='color:lightgreen; margin-left:100px;'>User Has Successfully Registered!!. </h1>";
        }else{
            echo "<h1 style='color:red; margin-left:100px;'>Failed to Register!!. </h1>";
        }
               
    }
}	

?>

<?php

  if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST['btn3']))
	{
		
		echo "iubnconrer73834hud g g";
		echo "khxny8 bryi rriu";
		
		$db_handle = mysqli_connect("localhost","root","","travelAndTour");
		$namee=mysqli_real_escape_string($db_handle, $_POST["search"]);

		$sql="SELECT * FROM tours where tour_name='$namee'";
		$results=$db_handle->query($sql);
		if ($results->num_rows > 0) {
			$row=mysqli_fetch_array($results);
			$c=$row['tour_id'];
			header('location:tour_details.php?tour_id='.$c);			
		}
		else
		{
			$sql="SELECT * FROM hotels where hotel_name='$namee'";
			$results=$db_handle->query($sql);
			if ($results->num_rows > 0) 
			{
				$row=mysqli_fetch_array($results);
				$c=$row['hotel_id'];
				
				header('location:hotel_details.php?hotel_id='.$c);	
			}
			else
			{
			$sql="SELECT * FROM hotels where hotel_place='$namee'";
			$results=$db_handle->query($sql);
			if ($results->num_rows > 0) 
			{
				$row=mysqli_fetch_array($results);
				$c=$row['hotel_place'];
				
				header('location:hotels_place.php?hotel_place='.$c);	
			}
				
			}  
		}   
	}
  }


?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="tourstyle2.css">  

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- trying calender -->

<!--jQuery References--> 
<script src="http://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js" type="text/javascript"></script>

<!--Theme-->
<link href="http://cdn.wijmo.com/themes/aristo/jquery-wijmo.css" rel="stylesheet" type="text/css" />

<!--Wijmo Widgets CSS-->
<link href="http://cdn.wijmo.com/jquery.wijmo-pro.all.3.20172.118.min.css" rel="stylesheet" type="text/css" />

<!--Wijmo Widgets JavaScript-->
<script src="http://cdn.wijmo.com/jquery.wijmo-open.all.3.20161.90.min.js" type="text/javascript"></script>
<script src="http://cdn.wijmo.com/jquery.wijmo-pro.all.3.20161.90.min.js" type="text/javascript"></script>
<script src="http://cdn.wijmo.com/interop/wijmo.data.ajax.3.20161.90.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="tourstyle.css">
<link rel="stylesheet" type="text/css" href="newstyle.css">

<style type="text/css">



li.loogo{
//position: absolute;
//top: 240 px;
bottom: 550px;
	
}


.des{
	font-size:70%;
	position: absolute;
	top: 520px;
	
}

.btn-group .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    float: left;
	border-radius: 9px;
	position: absolute;
	left: 692px;
	top: 245px;
}

.btn-group .button:hover {
    background-color: #4fe34f;
}


.cal{
width: 30px;
height: 40px;
position: absolute;	
right: 120px;
left: 540px;
top: 246px;
border-radius: 50px;
	
}

/* Search option */

input[type=text1],input[list=browsers]{
    width: 40%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 9px;
    font-size: 16px;
    background-color: white;
    background-image: url('location.png');
    background-position: -5px 3px; 
	background-size: 40px 40px;
    background-repeat: no-repeat;
	//padding: 1px 10px 5px 5px;
	//margin: 50px;   
	 padding: 12px 20px;
    margin: 8px 0px;
}

.hum{
	position: absolute;
	bottom:90px;
	left: 30px;
	top: 240px;
	height:50px;
 } 

body {
	background-image: url("1.jpg");
	background-position: -1px 100px; 
	//background-size: 1300px 400px;
	background-size: 100%;
	background-repeat: no-repeat;
	margin-top: 10px;
}

	/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button.navigation1{
	background-color:white; 
    color: black;
    padding: 24px 20px;
    margin right: 50px;
    border: none;
    cursor: pointer;
    width: 100%;
    font-size: 15px;
   position: absolute;
   right: 150px;
   //left: 35px;

}

button.navigation2{
	background-color:white; 
    color: black;
    padding: 24px 20px;
    margin right: 50px;
    border: none;
    cursor: pointer;
    width: 100%;
    font-size: 15px;
   position: absolute;
   right: 50px;

}

.navigation {
	
	font-size:20px;
	top:30px;
}


button.navigation1:hover:not(.active) {
    // background-color: Whitesmoke;
    //color:YellowGreen;
	color: #7de8e3;
}

button.navigation2:hover:not(.active) {
    // background-color: Whitesmoke;
    //color:YellowGreen;
	color: #7de8e3;
}




/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 40%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;}
.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
  max-width: 1500px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
 // background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

   


</style>
</head>


<!---  trying calender  -->

<script type="text/javascript">
$(document).ready(function () {
	var check_in=$('input[name="check_in"]');
    $("#textbox1").wijinputdate(
        {
            showTrigger: true
    });
	
});
</script>


<!---  trying calender  -->

<script type="text/javascript">
$(document).ready(function () {
	var check_out=$('input[name="check_out"]');
    $("#textbox2").wijinputdate(
        {
            showTrigger: true
    });
});
</script>

<body>


<div class="nav_div" class="w3-card-4">

<?php
if(isset($_SESSION['id']))
{
	?>
	<div class="hate" style="margin-top:30px;margin-bottom:-100px;height:200px;width:1300px; ">
		<a  style="margin-left:30px;text-decoration:none;font-size:20px; font-weight:400;color:black"  href="tours.php">Tours</a>
		<a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="hotels.php">Hotels</a>
		<a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="offers.php">Offers</a>
		<a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="contact_us.php">Contact Us</a>
		<a  style="margin-left:700px;text-decoration:none" href="logout.php">Log Out</a>
	</div>
	
	<?php
}
else
{
?>
  <div class="hate" style="margin-top:30px;margin-bottom:-100px;height:200px;width:1300px; ">
		<a  style="margin-left:30px;text-decoration:none;font-size:20px; font-weight:400;color:black"  href="tours.php">Tours</a>
		<a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="hotels.php">Hotels</a>
		<a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="Offers.php">Offers</a>
		<a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="contact_us.php">Contact Us</a>
		<button class="navigation1" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">LOG IN</button> 
		<button class="navigation2" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">SIGN UP</button> 
</div>
<?php
}
?>
</div>

<p style="margin-left:30px; margin-top:86px;font-weight:600; color:white;">Location </p><br>

<div>
<form method="post">
<div> <input style="width:514px;"list="browsers" name="search" class="hum" placeholder="   Search..">
<datalist id="browsers">
<?php

$db_handle = mysqli_connect("localhost","root","","travelAndTour");
$SQL = "SELECT * FROM tours";
$result = mysqli_query($db_handle,$SQL);
while($row=mysqli_fetch_array($result)){	
	echo '<option value="'.$row['tour_name'].'">';	
}
		
?>

<?php

$db_handle = mysqli_connect("localhost","root","","travelAndTour");
$SQL = "SELECT * FROM hotels";
$result = mysqli_query($db_handle,$SQL);
while($row=mysqli_fetch_array($result)){	
	echo '<option value="'.$row['hotel_name'].'">';	
}
		
?>

<?php

$db_handle = mysqli_connect("localhost","root","","travelAndTour");
$SQL = "SELECT * FROM hotels";
$result = mysqli_query($db_handle,$SQL);
while($row=mysqli_fetch_array($result)){	
	echo '<option value="'.$row['hotel_place'].'">';	
}
		
?>

 </datalist>
 </div>
 
<div class="btn-group">
  <button type="submit" name="btn3" style="margin-left:150px;" class="button">Find hotels</button> 
</div>
</form>
</div>

<!--modal for login-->
<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit" name="btn1">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>


<!--modal for sign up-->

<div id="id02" class="modal">
  
  <form method="post" class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="fname" required>

      <label><b>Last Name</b></label>
      <input type="text" placeholder="Enter Last Name" name="lname" required>

      <label><b>Phone Number</b></label>
      <input type="text" placeholder="Enter Phone NUmber" name="phone" required>

      <label><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit"name="btn2">Register</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>


<div class="slideshow-container">

 <!-- <div class="mySlides fade">
 <img src="1.jpg" style="width:100%">  
</div> 

<div class="mySlides fade">
  <img src="3.jpg" style="width:100%">
</div>

<!--<div class="mySlides fade">
  <img src="66.jpg" style="width:100%">
 
</div> -->

</div>
<br>

<div style="text-align:center">
 <!-- <span class="dot"></span> 
  <span class="dot"></span> 
 <!-- <span class="dot"></span> -->
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 1000); // Change image every 2 seconds
}
</script>



<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>

<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


 
<!-- trying calendeer -->

<div> <p style="margin-left:470px; margin-top:-90px;font-weight:600; color:white;">Check in </p><br></div>
<div class="cal">  <input type="text" id="textbox1" name="check_in" /> </div>
<br>


<div><p style="margin-left:680px; margin-top:-80px;font-weight:600; color:white;">Check out </p><br> </div>
<div class="cal"style="margin-left:151px;">  <input type="text" id="textbox2" name="check_out"/> </div>


<div class="des" style="margin-top:100px;"> <h1>Popular Tours </h1>  </div>


		<?php
				$con=new mysqli("localhost","root","", "travelandtour");
				$sql="SELECT * FROM tours order by avg_user_rating DESC limit 4";
		  
				$results=$con->query($sql);
				$row=mysqli_fetch_array($results);
			   
				
				
				while($row=mysqli_fetch_array($results)){
								$image = $row['tour_image'];
								$tour_name = $row['tour_name'];
								
								echo "<div class='row w3-card-4' style='padding-left:2px;width:900px;height:200px;background-color:white;margin-top:50px;'>
										<div class='row-md-2 tour-image'>
											<img src='tour_images/".$image."'  class='w3-border w3-padding  w3-card-4'  height='180' width='260'/>
										</div>
										 <div class='w3-col'>
											$tour_name
										 </div>
									</div>";
									
										}
	?>
			
		
	

</html>