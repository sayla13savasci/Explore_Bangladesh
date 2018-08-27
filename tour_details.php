
<?php
session_start();
if(isset($_SESSION['id']))
{

  $tour_id=$_GET['tour_id'];
  //echo $tour_id;
   $_SESSION["tour_id"] =$tour_id;
  //echo $_SESSION['tour_id'];
  $user_id=$_SESSION['id'];
  
    $con=new mysqli("localhost","root","", "travelandtour");
          // ^host       ^username  ^database name


  
	$sql="SELECT * FROM users WHERE user_id='$user_id'";  
    $results=$con->query($sql);
    $details=mysqli_fetch_array($results);
	
	 $emaill=$details['email'];
     
   

  if($_SERVER["REQUEST_METHOD"]=="POST"){
  
    $person_number_child= $_POST["person_number_child"];
    $person_number_adult= $_POST["person_number_adult"]; 
    $date = $_POST["date"];
    $email = $emaill;
    $_SESSION["emaill"] =$email;
    
    $sql="insert into order_tour(person_number_adult,person_number_child,date,email) values
        ('$person_number_adult','$person_number_child','$date','$email')";

   $result=$con->query($sql);
    if ($con->affected_rows > 0){
        header("Location:final_tour_order.php");
         
    }else{
       
       header("Location:final_tour_order.php");

    }
 }
}
else
{
	$tour_id=$_GET['tour_id'];
  //echo $tour_id;

 
   $_SESSION["tour_id"] =$tour_id;
  //echo $_SESSION['tour_id'];



  if($_SERVER["REQUEST_METHOD"]=="POST"){
  
    $person_number_child= $_POST["person_number_child"];
    $person_number_adult= $_POST["person_number_adult"]; 
    $date = $_POST["date"];
    $email = $_POST["email"];
    $_SESSION["emaill"] =$email;
    
    $con=new mysqli("localhost","root","", "travelandtour");
          // ^host       ^username  ^database name

    $sql="insert into order_tour(person_number_adult,person_number_child,date,email) values
        ('$person_number_adult','$person_number_child','$date','$email')";

   $result=$con->query($sql);
    if ($con->affected_rows > 0){
        header("Location:final_tour_order.php");
         
    }else{
       
       header("Location:final_tour_order.php");

    }
 }
}
?>

<?php 
    $con=new mysqli("localhost","root","", "travelandtour");
    
    $sql="SELECT * FROM tours WHERE tour_id='$_GET[tour_id]'";  
    $results=$con->query($sql);
    $details=mysqli_fetch_array($results);

  /*  $sql="SELECT * FROM order_tour WHERE tour_id='$_GET[tour_id]'";  
    $results=$con->query($sql);
    $details=mysqli_fetch_array($results); */
    
  ?>
  
  
 <?php 
	

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
				header("Location:tour_details.php?tour_id=".$tour_id);
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
            echo "<h1 style='color:lightgreen; margin-left:100px;'>User Has Successfully Registered!!. </h1>";
        }else{
            echo "<h1 style='color:red; margin-left:100px;'>Failed to Register!!. </h1>";
        }
               
    }
}	

?> 



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="tourstyle.css">
<link rel="stylesheet" type="text/css" href="tourdetails.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<!-- Stars  -->
<style>

.stars-container {
  position: relative;
  display: inline-block;
  color: transparent;
  margin-left: 125px;
  font-size: 40px;
  
}

.stars-container:before {
  position: absolute;
  top: 0;
  left: 0;
  content: '★★★★★';
  color: #cccccc;
}

.stars-container:after {
  position: absolute;
  top: 0;
  left: 0;
  content: '★★★★★';
  color: #ff4400;
  overflow: hidden;
}

.stars-0:after { width: 0%; }
.stars-10:after { width: 10%; }
.stars-20:after { width: 20%; }
.stars-30:after { width: 30%; }
.stars-40:after { width: 40%; }
.stars-50:after { width: 50%; }
.stars-60:after { width: 60%; }
.stars-70:after { width: 70%; }
.stars-80:after { width: 80%; }
.stars-90:after { width: 90%; }
.stars-100:after { width: 100; }
</style>

<style type="text/css">

	/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 8px 20px;
    margin: 8px 0;
    display: block;
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



</style>

<style type="text/css">
  input[type=email], select {
    
    padding: 12px 20px;
    margin: 8px 0;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 40%;
    background-color: #00b3b3;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div.form_div {
    border-radius: 5px;
    padding: 20px;
    margin-left: 70px;

}

input[type=email], select {
    width: 80%;
    padding: 12px 20px;
    margin: 18px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
} 

</style>

</head>
<body>


<!--ajax code for rating -->

<script>
	function showUser(str) {
		if (str=="") {
    		document.getElementById("txtHint").innerHTML="";
    		return;
  	}
  	if (window.XMLHttpRequest) {
    		// code for IE7+, Firefox, Chrome, Opera, Safari
    		xmlhttp=new XMLHttpRequest();
  	} else { // code for IE6, IE5
    		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	xmlhttp.onreadystatechange=function() {
    		if (this.readyState==4 && this.status==200) {
      			document.getElementById("txtHint").innerHTML=this.responseText;
    		}
  	}
  	xmlhttp.open("GET","rating.php?id="+str,true);
  	xmlhttp.send();
	}
</script>


<div class="nav_div" class="w3-card-4">
<?php
if(isset($_SESSION['id']))
{
	?>
	<div class="hate" style="margin-top:30px;margin-bottom:-100px;height:200px;width:1300px; ">
		<a  style="margin-left:30px;text-decoration:none;font-size:20px; font-weight:400;color:black"  href="home.php">Home</a>
		<a  style="margin-left:30px;text-decoration:none;font-size:20px; font-weight:400;color:black"  href="tours.php">Tours</a>
		<a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="hotels.php">Hotels</a>
		<a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="offers.php">Offers</a>
		<a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="contact_us.php">Contact Us</a>
		<a  style="margin-left:700px;text-decoration:none; margin-left:600px;" href="logout.php">Log Out</a>
		
		
	</div>
	<?php
}

else
{
?>
<div class="hate" style="margin-top:30px;margin-bottom:-100px;height:200px;width:1300px; ">
		<a  style="margin-left:30px;text-decoration:none;font-size:20px; font-weight:400;color:black"  href="home.php">Home</a>
		<a  style="margin-left:30px;text-decoration:none;font-size:20px; font-weight:400;color:black"  href="tours.php">Tours</a>
		<a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="hotels.php">Hotels</a>
		<a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="contact_us.php">Contact Us</a>
		<button class="navigation1" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">LOG IN</button> 
		<button class="navigation2" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">SIGN UP</button> 
</div>
<?php
}
?>
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

    <div class="container" style="background-color:#f1f1f1; width:490px;">
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

<h4 style="color: #009999;font-size: 32px;font-weight: 700;margin-left: 200px">&#x26F5  Book A Tour More Then 200 Places</h4>

<div class="w3-row" style="height: 450px;width: 1100px;margin-left: 120px;margin-top: 20px;">
   <?php
        $con=new mysqli("localhost","root","", "travelandtour");
        $sql="SELECT * FROM tours WHERE tour_id='$_GET[tour_id]'";  
        $results=$con->query($sql);
        $details=mysqli_fetch_array($results);
        $image=$details['tour_image'];

        echo "
               <img src='tour_images/".$image."'  class='w3-border w3-padding' alt='Norway' height='450' width='1100'/>
              "

       
    ?>
    
</div>


<div class="w3-row" style="width: 1200px;height: 650px;margin-left: 120px;margin-top: 30px;">

<?php
if(isset($_SESSION['id']))
{
	?>

  <div class="w3-col w3-card-4  bootstrap-iso container-fluid" style="width: 650px;height: 650px;">

    <div class="booking_options" style="background-color: #009999;margin-top: -10px">
      <p>Booking Options...</p>
    </div>

    <div class="seller">
      <h4>Seller:</h4>
    </div>

    <div class="bootstrap-iso">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-16">


            <div class="form_div">
              <!--form start-->
                <form method="POST">
                  <label for="name" style="font-size: 17px;font-weight: 200;">Adult :</label> BDT <?php echo $details['adult_price'];?>           
              
                  <!--<label for="name">Adult</label>-->
                    <br>

                  <label for="Number">Number :</label>
                  <select id="number" type="text" name="person_number_adult" required="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                  </select>
                  <br>
                  <br>
            
          <label for="name" style="font-size: 17px;font-weight: 200;">Child : </label> BDT<?php echo $details['child_price'];?>           
                 <!-- <label for="name">Child</label>  -->
                  <br>

                  <label for="Number">Number :</label>
                  <select id="number" type="text" name="person_number_child" required="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                  </select>

                  <br>
                  <br>

                  <label class="control-label" for="date">Date:</label>
                  <input style="width: 100%;" class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" required="" />
                  <br>

                <!-- <label for="email" style="font-size: 17px;font-weight: 20;">email :</label>
                  <input style="width: 280px;" id="a" type="email" name="email" required=""> -->
             
                  <input type="submit" value="Book Now..">
                 
                </form>
                <!--form end-->

              </div>
              <!--form div ens-->
            </div>
          </div>
        </div>
      </div>
  </div>
  <!--form col sesh-->
  	<?php
}

else
{
?>
  <div class="w3-col w3-card-4  bootstrap-iso container-fluid" style="width: 650px;height: 650px;">

    <div class="booking_options" style="background-color: #009999;margin-top: -10px">
      <p>Booking Options...</p>
    </div>

    <div class="seller">
      <h4>Seller:</h4>
    </div>

    <div class="bootstrap-iso">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-16">


            <div class="form_div">
              <!--form start-->
                <form method="POST">
                  <label for="name" style="font-size: 17px;font-weight: 200;">Adult :</label> BDT <?php echo $details['adult_price'];?>           
              
                  <!--<label for="name">Adult</label>-->
                    <br>

                  <label for="Number">Number :</label>
                  <select id="number" type="text" name="person_number_adult" required="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                  </select>
                  <br>
                  <br>
            
          <label for="name" style="font-size: 17px;font-weight: 200;">Child : </label> BDT<?php echo $details['child_price'];?>           
                 <!-- <label for="name">Child</label>  -->
                  <br>

                  <label for="Number">Number :</label>
                  <select id="number" type="text" name="person_number_child" required="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                  </select>

                  <br>
                  <br>

                  <label class="control-label" for="date">Date:</label>
                  <input style="width: 100%;" class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" required="" />
                  <br>

                 <label for="email" style="font-size: 17px;font-weight: 20;">email :</label>
                  <input style="width: 280px;" id="a" type="email" name="email" required="">
             
                  <input type="submit" value="Book Now..">
                 
                </form>
                <!--form end-->

              </div>
              <!--form div ens-->
            </div>
          </div>
        </div>
      </div>
  </div>
  <!--form col sesh-->
  <?php
}
?>
	


  <div class="w3-col w3-card-4" style="width: 400px;height: 600px;margin-left: 50px;">
    <div style="background-color:#ff7c4d;margin-top: -10px;height: 50px;">
      <h4 style="font-size: 23px;font-weight: 600;color: white;margin-left: 30px">Rating..</h4>
    </div>
    <?php
        $sql="SELECT * FROM tours WHERE tour_id='$tour_id'";  
        $results=$con->query($sql);
        $details=mysqli_fetch_array($results);
        $image=$details['tour_image'];
        $name=$details['tour_name'];      
    ?>

    <?php echo "<div class='col-md-2 tour-image' style='margin-left:60px;margin-top:20px;'>
                    <img src='tour_images/".$image."'  class='w3-border w3-padding  w3-card-4' alt='Norway' height='180' width='260'/>
                  </div>"

      ?>
      <?php
        echo "<p style='font-size:20px;margin-top:10px;text-align:center;'>$name</p>"
      ?>
	  
	  
	  <?php
		if(isset($_SESSION['id']))
		{
	?>
		
		<label style="margin-left:100px;font-weight:600" for="Number">Rating :</label>
              <select style="width:100px;height:50px;margin-left:10px;" id="number" type="text" name="rate" onchange="showUser(this.value)" required="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option
              </select>			  
			  
			  <br>
			  
			  <!--  stars  -->
			  
			  
			  <?php
			  
				$sql="SELECT * FROM tours where tour_id='$tour_id' ";
				$results=$con->query($sql);
				
				while($row=mysqli_fetch_array($results))
					{
						
						$b=$row['avg_user_rating'];
						
					}
					  
			  ?>
			  
			
			  <input type="hidden" value="enter">  
			  
			    <?php
			if($b == '0')
			{
				?><div><span class="stars-container stars-0">★★★★★</span></div><?php
			}
			if($b == '0.5')
			{
				?><div><span class="stars-container stars-10">★★★★★</span></div><?php
			}
			if($b == '1')
			{
				?><div><span class="stars-container stars-20">★★★★★</span></div><?php
			}
			if($b == '1.5')
			{
				?><div><span class="stars-container stars-30">★★★★★</span></div><?php
			}
			if($b == '2')
			{
				?><div><span class="stars-container stars-40">★★★★★</span></div><?php
			}
			if($b == '2.5')
			{
				?><div><span class="stars-container stars-50">★★★★★</span></div><?php
			}
			if($b == '3')
			{
				?><div><span class="stars-container stars-60">★★★★★</span></div><?php
			}
			if($b == '3.5')
			{
				?><div><span class="stars-container stars-70">★★★★★</span></div><?php
			}
			if($b == '4')
			{
				?><div><span class="stars-container stars-80">★★★★★</span></div><?php
			}
			if($b == '4.5')
			{
				?><div><span class="stars-container stars-90">★★★★★</span></div><?php
			}
			if($b == '5')
			{
				?><div><span class="stars-container stars-100">★★★★★</span></div><?php
			}
			?>
			  
			 
	<?php	
	}
	
	else
	{
	?>
	
			<!--  stars  -->
			  
			  
			  <?php
			  
				$sql="SELECT * FROM tours where tour_id='$tour_id' ";
				$results=$con->query($sql);
				
				while($row=mysqli_fetch_array($results))
			{
				
				$b=$row['avg_user_rating'];
				
			}
			  
			  ?>
			  
			
			  <input type="hidden" value="enter">  
			  
			    <?php
			if($b == '0')
			{
				?><div><span class="stars-container stars-0">★★★★★</span></div><?php
			}
			if($b == '0.5')
			{
				?><div><span class="stars-container stars-10">★★★★★</span></div><?php
			}
			if($b == '1')
			{
				?><div><span class="stars-container stars-20">★★★★★</span></div><?php
			}
			if($b == '1.5')
			{
				?><div><span class="stars-container stars-30">★★★★★</span></div><?php
			}
			if($b == '2')
			{
				?><div><span class="stars-container stars-40">★★★★★</span></div><?php
			}
			if($b == '2.5')
			{
				?><div><span class="stars-container stars-50">★★★★★</span></div><?php
			}
			if($b == '3')
			{
				?><div><span class="stars-container stars-60">★★★★★</span></div><?php
			}
			if($b == '3.5')
			{
				?><div><span class="stars-container stars-70">★★★★★</span></div><?php
			}
			if($b == '4')
			{
				?><div><span class="stars-container stars-80">★★★★★</span></div><?php
			}
			if($b == '4.5')
			{
				?><div><span class="stars-container stars-90">★★★★★</span></div><?php
			}
			if($b == '5')
			{
				?><div><span class="stars-container stars-100">★★★★★</span></div><?php
			}
			?>
	
	
	<?php
}
?>

    
  </div>


  
</div>




<!--#####################description part start#################-->
<div class="w3-card-4" style="width: 650px;height:550px;  margin-left: 120px;margin-top: 50px;margin-bottom: 100px;">
  <div class="description" style="background-color: #009999;text-align: center;">
    <p style="text-align: center;">Description</p>
  </div>
    <?php 
      $con=new mysqli("localhost","root","", "travelandtour");
      
      $sql="SELECT * FROM full_tour_details WHERE tour_id='$_GET[tour_id]'";  
      $results=$con->query($sql);
      $full_details=mysqli_fetch_array($results);

    /*  $sql="SELECT * FROM order_tour WHERE tour_id='$_GET[tour_id]'";  
      $results=$con->query($sql);
      $details=mysqli_fetch_array($results); */
    
  ?>
    <?php    
      echo "<p style='color:#008080;font-size:30px;margin-left:30px;margin-top:10px;font-weight:500'>".$details['tour_name']."</p>";
    ?>

    <?php 
      echo "<h4 style='margin-left:30px;margin-top:-25px;color:#595959;font-weight:500;'>Package Includes:</h4>";   
      echo "<p style='color:#4d4d4d;font-size:15px;margin-left:30px;margin-top:-3px'>".$full_details['package_includes']."</p>";
    ?>
    <?php echo "<br>" ?>

    <?php 
      echo "<h4 style='margin-left:30px;margin-top:-25px;color:#595959;font-weight:500;'>Package Excludes:</h4>";   
      echo "<p style='color:#4d4d4d;font-size:15px;margin-left:30px;margin-top:-3px'>".$full_details['package_excludes']."</p>";
    ?>
    <?php echo "<br>" ?>

    <?php 
      echo "<h4 style='margin-left:30px;margin-top:-25px;color:#595959;font-weight:500;'>Tour Itinerary:</h4>";   
      echo "<p style='color:#4d4d4d;font-size:15px;margin-left:30px;margin-top:-3px'>".$full_details['tour_ltinerary']."</p>";
    ?>
</div>
<!--#####################description part end#################-->


<!--footer part strat-->
  <?php //include 'footer.php';?>
<!--footer part end-->


              

<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
</body>
</html>
