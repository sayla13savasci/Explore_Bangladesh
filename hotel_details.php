<?php 
  session_start();
  $hotel_id=$_GET['hotel_id'];
  //echo $hotel_id;
  $_SESSION["hotel_id"] =$hotel_id;
  //echo $_SESSION['hotel_id'];
  
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
        header("Location:hotel_details.php?hotel_id=".$hotel_id);
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
        
        
        $sql="insert into users(fname,lname,email,phone,password) values
              ('$fname','$lname','$email','$phone','$password')";
         $con = mysqli_connect("localhost","root","","travelAndTour");
    

      $result=$con->query($sql);
        if ($con->affected_rows > 0) {
            //echo "<h1 style='color:lightgreen; margin-left:100px;'>User Has Successfully Registered!!. </h1>";
        }else{
            echo "<h1 style='color:red; margin-left:100px;'>Failed to Register!!. </h1>";
        }
               
    }
} 

?> 
 

<?php
if(isset($_SESSION['id']))
{
    $user_id=$_SESSION['id'];
    $con = mysqli_connect("localhost","root","","travelAndTour");
    $sql="SELECT * FROM users WHERE user_id='$user_id'";  
    $results=$con->query($sql);
    $details=mysqli_fetch_array($results);
  
    $emaill=$details['email'];
     


  if($_SERVER["REQUEST_METHOD"]=="POST"){
     if(isset($_POST['btn3']))
  {
  
    $number_of_room= $_POST["number_of_room"];
    $number_of_room_du= $_POST["number_of_room_du"]; 
    $check_in = $_POST["date"];
    $check_out = $_POST["datetwo"];
    //$email = $_POST["email"];
    $email = $emaill;
    $_SESSION["email"] =$email;
    
    
    
    $sql="insert into order_hotel(check_in,check_out,email,num_dulax,num_twin) values
        ('$check_in','$check_out','$email','$number_of_room_du','$number_of_room')";

   $result=$con->query($sql);
    if ($con->affected_rows > 0) {
        header("Location:final_hotel_order.php");
         
    }else{
       
       header("Location:hotel_hotel_order.php");

    }
  }
          
  }
}
else
{

  if($_SERVER["REQUEST_METHOD"]=="POST"){
     if(isset($_POST['btn3']))

  {
    $con = mysqli_connect("localhost","root","","travelAndTour");
  
    $number_of_room= $_POST["number_of_room"];
    $number_of_room_du= $_POST["number_of_room_du"]; 
    $check_in = $_POST["date"];
    $check_out = $_POST["datetwo"];
    $email = $_POST["email"];
    $_SESSION["email"] =$email;
    
    
    
    $sql="insert into order_hotel(check_in,check_out,email,num_dulax,num_twin) values
        ('$check_in','$check_out','$email','$number_of_room_du','$number_of_room')";

   $result=$con->query($sql);
    if ($con->affected_rows > 0) {
        header("Location:final_hotel_order.php");
         
    }else{
       
       header("Location:hotel_hotel_order.php");

    }
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
  color: #ffa333;
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
  input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 50%;
    background-color: #4CAF50;
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
  	xmlhttp.open("GET","hotel_rating.php?id="+str,true);
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
    <a  style="margin-left:700px;text-decoration:none" href="logout.php">Log Out</a>
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
    <a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="offers.php">Offers</a>
    <a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="contact_us.php">Contact Us</a>
    <button class="navigation1"  onclick="document.getElementById('id01').style.display='block'" style="width:auto;">LOG IN</button> 
    <button class="navigation2"  onclick="document.getElementById('id02').style.display='block'" style="width:auto;">SIGN UP</button> 
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

<!--#####################modal end#################-->







<h4 style="color: #009999;font-size: 32px;font-weight: 700;margin-left: 90px">&#x26F5 Explore Bangladesh Offers Charmimg,Family-friendly & Romantic Hotels</h4>


<div class="w3-row" style="height: 450px;width: 1100px;margin-left: 100px;margin-top: 20px;">
   <?php
        $con=new mysqli("localhost","root","", "travelandtour");
        $sql="SELECT * FROM hotels WHERE hotel_id='$_GET[hotel_id]'";  
        $results=$con->query($sql);
        $details=mysqli_fetch_array($results);
        $image=$details['hotel_image'];

        echo "
               <img src='hotel_images/".$image."'  class='w3-border w3-padding' alt='Norway' height='450' width='1100'/>
              "

       
    ?>
    
</div>


<h4 style="color:#ff571a;font-size: 35px;font-weight:700;margin-left: 300px ">Know Better.Book Better.Go Better</h4>


<div class="w3-row" style="width: 1200px;height:670px;  margin-left: 100px;margin-top: 50px;
 background-color: white">
 <!--form col start-->
 <?php
if(isset($_SESSION['id']))
{
  ?>
  <div class="w3-col w3-card-4" style="width: 700px;"> 
    <div class="booking_options" >
      <div style="background-color: #009999;height: 50px;margin-left: -20px;margin-top: -20px;">
        <p style="margin-left: 20px;">Booking Options...<p>
      </div>
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
                  <form method="post">
                  
                    <label for="name">Dulax Room</label>
                    <br>                   
                    <label for="Number">Number:</label>
                    <select id="number" type="text" name="number_of_room" required="">
					<option value="0">0</option>

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
      				
      				
                    <label for="name">Double Or Twin Room</label>  
                    <br>

                     <label for="Number">Number:</label>
                    <select id="number" type="text" name="number_of_room_du" required="">
					<option value="0">0</option>
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
                    <label class="control-label" for="date">Check In:</label>
                    <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" required=""/>
                    <br>

                     <label class="control-label" for="date">Check Out:</label>
                    <input class="form-control" id="datetwo" name="datetwo" placeholder="MM/DD/YYY" type="text" required=""/>
                    <br>

                       
                    <input style="background-color:#009999" type="submit" name="btn3" value="Book Now..">
                  </form>
                  <!--form end-->

                </div>
              </div>
            </div>    
          </div>
        </div>
  </div>
      <?php
}

else
{
?>
  
    <div class="w3-col w3-card-4" style="width: 700px;"> 
    <div class="booking_options" >
      <div style="background-color: #009999;height: 50px;margin-left: -20px;margin-top: -20px;">
        <p style="margin-left: 20px;">Booking Options...<p>
      </div>
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
                  <form method="post">
                  
                    <label for="name">Dulax Room</label>
                    <br>                   
                    <label for="Number">Number:</label>
                    <select id="number" type="text" name="number_of_room">
					<option value="0">0</option>
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
              
              
                    <label for="name">Double Or Twin Room</label>  
                    <br>

                     <label for="Number">Number:</label>
                    <select id="number" type="text" name="number_of_room_du">
					<option value="0">0</option>
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
                    <label class="control-label" for="date">Check In:</label>
                    <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
                    <br>

                     <label class="control-label" for="date">Check Out:</label>
                    <input class="form-control" id="datetwo" name="datetwo" placeholder="MM/DD/YYY" type="text"/>
                    <br>

                    <label for="email" style="font-size: 17px;font-weight: 20;">email :</label>
                    <input style="width: 280px;" id="a" type="email" name="email" required="">
                          
                    <input style="background-color:#009999" type="submit" name="btn3" value="Book Now..">
                  </form>
                  <!--form end-->

                </div>
              </div>
            </div>    
          </div>
        </div>
  </div>
 <?php
}
?>


<div class="w3-col w3-card-4" style="width: 400px;height: 700px;margin-left: 50px;">
    <div style="background-color:#ff7c4d;margin-top: -10px;height: 50px;">
      <h4 style="font-size: 23px;font-weight: 600;color: white;margin-left: 30px">Rating..</h4>
    </div>
    <?php
	
		$con = mysqli_connect("localhost","root","","travelAndTour");
  
        $sql="SELECT * FROM hotels WHERE hotel_id='$hotel_id'";  
        $results=$con->query($sql);
        $details=mysqli_fetch_array($results);
        $image=$details['hotel_image'];
        $name=$details['hotel_name'];      
    ?>

    <?php echo "<div class='col-md-2 tour-image' style='margin-left:60px;margin-top:20px;'>
                    <img src='hotel_images/".$image."'  class='w3-border w3-padding  w3-card-4' alt='Norway' height='180' width='260'/>
                  </div>"

      ?>
      <?php
        echo "<p style='font-size:20px;margin-top:10px;text-align:center;'>$name</p>"
      ?>
	  
	  
	  <?php
		if(isset($_SESSION['id']))
		{
			
	?>
		
		<label style="margin-left:130px;font-weight:600" for="Number">Rating :</label>
              <select style="width:100px;height:50px;margin-left:130px;" id="number" type="text" name="rate" onchange="showUser(this.value)" required="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option
              </select>			  
			  
			  <br>
			  
			  <!--  stars  -->
			  
			  
			  <?php
			  
				$sql="SELECT * FROM hotels where hotel_id='$hotel_id' ";
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
			  
				$sql="SELECT * FROM hotels where hotel_id='$hotel_id' ";
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

  
 <!--
  <div class="w3-col" style="width:400px;height: 400px; margin-left: 50px;background-color:white">
    
    <?php
      /*  $con=new mysqli("localhost","root","", "travelandtour");
        $sql="SELECT * FROM dulax_double_image";  
        $results=$con->query($sql);
        $details=mysqli_fetch_array($results);
        $imagedulax=$details['dulax_image'];
        $imagedouble=$details['doube_image'];

        echo "<div class='col-md-2 hotel-image' style='margin-left:40px;margin-top:20px;'>
                    <img src='hotel/".$imagedouble."'  class='w3-border w3-padding  w3-card-4' alt='Norway' height='180' width='260'/>
              </div>";

        echo "<h4 style='margin-left:90px;color:#009999;font-size:25px;font-weight:600;'>Couple Bed <h4>"; */
             
    ?>
    <hr>

    <?php
     /* echo "<div class='col-md-2 hotel-image' style='margin-left:40px;margin-top:20px;'>
                    <img src='hotel/".$imagedulax."'  class='w3-border w3-padding  w3-card-4' alt='Norway' height='180' width='260'/>
              </div>";

      echo "<h4 style='margin-left:100px;color:#009999;font-size:25px;font-weight:600'>Twin Bed <h4>"; */

    ?>


  </div> -->
</div>



<div class="w3-row w3-card-4" style="height: 300px;width: 700px;background-color: white;margin-left: 100px;margin-top: 70px;margin-bottom: 100px;">
  <div style="height: 50px;background-color:#009999;margin-top: -20px;">
    <p style="margin-left: 20px;color: white;font-size: 20px;font-weight: 500;">Description..</p>
  </div>

  <div style="margin-left: 30px;">
    <?php 
      $con=new mysqli("localhost","root","", "travelandtour");
      
      $sql="SELECT * FROM hotels WHERE hotel_id='$_GET[hotel_id]'";  
      $results=$con->query($sql);
      $details=mysqli_fetch_array($results); 
      echo $details['full_details'];
    ?>   
  </div>
  
</div>


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

<script>
    $(document).ready(function(){
      var date_input=$('input[name="datetwo"]'); //our date input has the name "date"
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
