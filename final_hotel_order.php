
<?php

   session_start();
    $hotel_id=$_SESSION['hotel_id'];
    //echo $hotel_id;
    $email=$_SESSION['email'];
    //echo $email;
    
    $con=new mysqli("localhost","root","", "travelandtour");
          // ^host       ^username  ^database name
   
?>

<?php

  if($_SERVER["REQUEST_METHOD"]=="POST"){
  
    $fname= $_POST["fname"];
    $lname= $_POST["lname"];
    $email= $_POST["email"];
    $phone= $_POST["phone"];
    $address= $_POST["address"];
    $_SESSION["new_email"] =$email;

    
    
    $con=new mysqli("localhost","root","", "travelandtour");
          // ^host       ^username  ^database name

    $sql="insert into hotel_guest_order(fname,lname,email,phone,address) values
        ('$fname','$lname','$email','$phone','$address')";

   $result=$con->query($sql);
    if ($con->affected_rows > 0){
       echo "successfully ordered";
         
    }else{
       
      echo "failed to order";

    }

  }


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
        header("Location:final_hotel_order.php?hotel_id=".$hotel_id);
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
<html><link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>


<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<link rel="stylesheet" type="text/css" href="tourstyle.css">
<link rel="stylesheet" type="text/css" href="final_tour_order.css">
<style>
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



<style>
 input[type=submit]:hover {
      background-color: #009999;
      width: 280px;
      
     
  }

  input[type=submit]{
      font-size: 20px;
      width: 280px;
      
     
  }

input{
    width: 280px;
    height: 60px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

table.register_table.th,td {
      padding-top: 20px;
      padding-left: 90px;    
}
  table.register_table{
  margin-left: -70px;
  margin-top:-5px;
}
body{
  background-color: #f8f8ff;
}
</style>
</head>

<body>

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
    <a  style="margin-left:30px;text-decoration:none; font-size:20px; font-weight:400;color:black"  href="offers.php">Offers</a>
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





<?php
if(isset($_SESSION['id']))
{
  ?>
<div class="w3-row" style="margin-top:-10px;margin-left: 130px;">
<!---personal information for order column start -->
    <div class="w3-col s7 w3-white w3-card-4" style="height:400px;width: 650px;">
      <!--personal info header-->
      <div style="background-color:#009999;height: 55px;margin-top: -10px;">
        <h4 style="text-align: center;margin-bottom: 5px;color: #f8f8ff; font-size: 25px;">Personal Information</h4>
       </div>
     <hr>

 
      <div class="w3-row" >
        <?php
          $user_id=$_SESSION['id'];
          $sql="SELECT * FROM users WHERE user_id='$user_id'";  
          $results=$con->query($sql);
          $details=mysqli_fetch_array($results);
          $fname=$details['fname'];
          $lname=$details['lname'];
          $phone=$details['phone'];
          $email=$details['email'];
      ?>
        <table class="register_table" >   
        
        <tr> 
              
          <td><h3 for="fname" style="font-size: 17px;font-weight: 20;">First Name :</h3> <?php 
        echo"<p style='color:#4d4d4d;font-size:15px;margin-left:0px;margin-top:-3px;background-color:#cccccc;height:30px;width:230px;
        border-radius:3px;text-align:justify;'>".$fname."</p>";?></td>
        
        
        <td><h3 for="lname" style="font-size: 17px;font-weight: 20;">Last Name :</h3> <?php 
        echo"<p style='color:#4d4d4d;font-size:15px;margin-left:0px;margin-top:-3px;background-color:#cccccc;height:30px;width:230px;
        border-radius:3px;text-align:justify;'>".$lname."</p>";?></td>
        
        </tr> 

        <tr>
          
          <td><h3 for="email" style="font-size: 17px;font-weight: 20;">Email :</h3> <?php 
        echo"<p style='color:#4d4d4d;font-size:15px;margin-left:0px;margin-top:-3px;background-color:#cccccc;height:30px;width:230px;
        border-radius:3px;text-align:justify;'>".$email."</p>";?></td>
        
        <td><h3 for="phone" style="font-size: 17px;font-weight: 20;">Phone :</h3> <?php 
        echo"<p style='color:#4d4d4d;font-size:15px;margin-left:0px;margin-top:-3px;background-color:#cccccc;height:30px;width:230px;
        border-radius:3px;text-align:justify;'>".$phone."</p>";?></td>
        </tr>

        </table>
      </div>

    
      <!--terms and policy row start-->
      <div class="w3-row" style="height: 50px;background-color:#ff8c00;margin-top: 140px;">
         <h4  class="w3-hover-opacity" style="margin-left: 10px;font-size: 20px;color: white;">&#9924;Please read the terms and policy before proceed to booking.</h4> 
              
      </div>

      <div class="w3-row w3-card-4" style="height: 350px;margin-top:20px;width: 650px;background-color: white">
          <div style="background-color:#009999;height: 55px;margin-top: -10px;">
            <h4 style="text-align: center;margin-bottom: 5px;color: #f8f8ff; font-size: 25px;">Terms And Policy</h4>
          </div> 

          <div class="margin-top:100px;"> 
         <?php
      
       $con=new mysqli("localhost","root","", "travelandtour");
        $sql="SELECT * FROM hotels WHERE hotel_id='$hotel_id'";  
        $results=$con->query($sql);
        $details=mysqli_fetch_array($results);
        //$terms_and_policy=$details['terms_and_policy'];
      
         echo "<p style='color:#4d4d4d;font-size:17px;margin-left:30px;margin-top:26px;font-style:oblique;font-weight:550'>".$details['terms_and_policy']."</p>";
        
       ?>  
        </div>     
      </div>
        <!--terms and policy row end-->
    </div>
 <!---personal information for order column  end-->


 
<!--summary column start-->
  <div class="w3-col s4  w3-center" style="background-color: white;height: 800px; margin-left: 30px;">
    <div style="background-color:#ffa333;height: 55px;margin-top: -10px;">
      <h4 style="text-align: center;margin-bottom: 5px;color: #f8f8ff; font-size: 25px;">&#9989;Booking Summary</h4>
    </div>
    
    <div class="w3-row w3-white">

      <?php 
        //$con=new mysqli("localhost","root","", "travelandtour");
        $sql="SELECT * FROM hotels WHERE hotel_id='$hotel_id'";  
        $results=$con->query($sql);
        $details=mysqli_fetch_array($results);
        $image=$details['hotel_image'];
        $name=$details['hotel_name'];
        $dulax_room_price=$details['dulax_room_price'];
        $double_room_price=$details['double_room_price'];
        
       //$night=$details['night'];
       // $adult_price=$details['adult_price'];
        //$child_price=$details['child_price'];



        $sql2="SELECT * FROM order_hotel where email='$email'";
        $results2=$con->query($sql2); 
        $orders=mysqli_fetch_array($results2);

        $check_in=$orders['check_in'];
        $check_out=$orders['check_out'];
        $ordered_dulax=$orders['num_dulax'];
        $ordered_twin=$orders['num_twin'];
        //$date=$orders['date'];
        //$child=$orders['person_number_child'];
        //$adult=$orders['person_number_adult'];

        $dulax_room_total_price=$ordered_dulax*$dulax_room_price;
        $twin_room_total_price=$ordered_twin*$double_room_price;

        $subtotal=$dulax_room_total_price+$twin_room_total_price;

      ?>

      <?php echo "<div class='col-md-2 hotel-image' style='margin-left:27px;margin-top:20px;'>
                    <img src='hotel_images/".$image."'  class='w3-border w3-padding  w3-card-4' alt='Norway' height='180' width='260'/>
                  </div>"

      ?>

      <?php
        echo "<p style='font-size:20px;margin-top:10px;'>$name</p>"
      ?>

      <hr>
      <label for="day" style="font-size: 17px;font-weight: 20;">Day :</label><?php echo $check_in; ?>
      <hr>
      <label for="night" style="font-size: 17px;font-weight:20;">Night :</label><?php echo $check_out; ?>
      <hr>
      <label for="date" style="font-size: 17px;font-weight:20;">Ordered Dulax Room:</label><?php echo  $ordered_dulax; ?>
      <hr>
      <label for="child" style="font-size: 17px;font-weight:20;">Ordered Twin Room:</label><?php echo $ordered_twin; ?>
      <hr>
      <label for="child" style="font-size: 17px;font-weight:20;">Ordered Twin Room Total Price:</label><?php echo $twin_room_total_price; ?>
      <hr>

      <label for="child" style="font-size: 17px;font-weight:20;">Ordered Dulax Room Total Price:</label><?php echo $dulax_room_total_price?>
      <hr>

      <label for="child" style="font-size: 17px;font-weight:20;">Total Amount You Should Give IN A Day:</label><?php echo $subtotal?>
        
    </div>
  </div>
  <!--summary column end-->
  
</div>
  </div>
  <?php
}

else
{
?>

<div class="w3-row" style="margin-top: 30px;margin-left: 130px;">
<!---personal information for order column start -->
  	<div class="w3-col s7 w3-white w3-card-4" style="height: 500px;width: 720px;">
  		<!--personal info header-->
    	<div style="background-color:#009999;height: 55px;margin-top: -10px;">
        <h4 style="text-align: center;margin-bottom: 5px;color: #f8f8ff; font-size: 25px;">Personal Information</h4>
      </div>

    	<!--booking options-->
    	<div class="w3-row" style="background-color:#ffffff;height: 80px;">
    		<div class="w3-col s5 w3-hover-opacity" style="height: 60px; background-color:#372f6a; margin-top: 20px;margin-left: 150px;">
        		<h4 style="color: white;text-align: center;">&#9977; Book as a Guest</h4>       
      		</div>
      		
    	</div>
      <hr>


 <!--  <div class="w3-row" style="height: 100px; margin-left: 20px;margin-bottom:10px;">
    
        <strong style="color: black">Notes / Additional Requests:</strong>
        <textarea style="margin-top: 7px; width: 670px;height: 90px; border: 2px solid #00cccc;background-color: #f8f8f8;border-radius: 4px;" placeholder="you can enter any notes or any additional information you want included with your order here"></textarea>   
    </div>
-->

    	<div class="w3-row" >
    		<table class="register_table" > 	
    		<form method="POST">
    		
    		<tr> 
          	 	
    			<td><input type="text" name="fname" placeholder="First Name"></td>
    			<td><input type="text" name="lname" placeholder="Last Name"></td>
    		</tr>	

    		<tr>
    			
    			<td><input type="email" name="email" placeholder="Confirm Email Address"></td>
          <td><input type="phone" name="phone" placeholder="Mobile Number"></td>
    			
    		</tr>

    		<tr>
    			<td><input type="text" name="address" placeholder="Address"></td>
          <td><input type="submit" value="Submit"></td>
    		</tr>   
    		</form>
    		</table>
      </div>

      <!--terms and policy row start-->
      <div class="w3-row" style="height: 50px;background-color:#ff8c00;margin-top: 70px;">
         <h4  class="w3-hover-opacity" style="margin-left: 10px;font-size: 25px;color: white;">&#9924;Please read the terms and policy before proceed to booking.</h4>         
      </div>

      <div class="w3-row w3-card-4" style="height: 350px;margin-top:20px;width: 720px;background-color: white">
          <div style="background-color:#009999;height: 55px;margin-top: -10px;">
            <h4 style="text-align: center;margin-bottom: 5px;color: #f8f8ff; font-size: 25px;">Terms And Policy</h4>
            <div class="margin-top:100px;">
            <?php
      
       $con=new mysqli("localhost","root","", "travelandtour");
        $sql="SELECT * FROM hotels WHERE hotel_id='$hotel_id'";  
        $results=$con->query($sql);
        $details=mysqli_fetch_array($results);
        //$terms_and_policy=$details['terms_and_policy'];
      
         echo "<p style='color:#4d4d4d;font-size:17px;margin-left:30px;margin-top:26px;font-style:oblique;font-weight:550'>".$details['terms_and_policy']."</p>";
        
       ?>  
          </div>  
          </div>     
      </div>
        <!--terms and policy row end-->
    </div>
 <!---personal information for order column  end-->


<!--summary column start-->
  <div class="w3-col s4  w3-center" style="background-color: white;height: 800px; margin-left: 30px;">
    <div style="background-color:#ffa333;height: 55px;margin-top: -10px;">
      <h4 style="text-align: center;margin-bottom: 5px;color: #f8f8ff; font-size: 25px;">&#9989;Booking Summary</h4>
    </div>
    
    <div class="w3-row w3-white">

      <?php 
        $con=new mysqli("localhost","root","", "travelandtour");
        $sql="SELECT * FROM hotels WHERE hotel_id='$hotel_id'";  
        $results=$con->query($sql);
        $details=mysqli_fetch_array($results);
        $image=$details['hotel_image'];
        $name=$details['hotel_name'];
        $dulax_room_price=$details['dulax_room_price'];
        $double_room_price=$details['double_room_price'];
        //$day=$details['day'];
        //$night=$details['night'];
       // $adult_price=$details['adult_price'];
        //$child_price=$details['child_price'];



        $sql2="SELECT * FROM order_hotel where email='$email'";
        $results2=$con->query($sql2); 
        $orders=mysqli_fetch_array($results2);

        $check_in=$orders['check_in'];
        $check_out=$orders['check_out'];
        $ordered_dulax=$orders['num_dulax'];
        $ordered_twin=$orders['num_twin'];
        //$date=$orders['date'];
        //$child=$orders['person_number_child'];
        //$adult=$orders['person_number_adult'];

        $dulax_room_total_price=$ordered_dulax*$dulax_room_price;
        $twin_room_total_price=$ordered_twin*$double_room_price;

        $subtotal=$dulax_room_total_price+$twin_room_total_price;

       
      ?>
      <?php echo "<div class='col-md-2 hotel-image' style='margin-left:30px;margin-top:20px;'>
                    <img src='hotel_images/".$image."'  class='w3-border w3-padding  w3-card-4' alt='Norway' height='180' width='260'/>
                  </div>"

      ?>
      <?php
        echo "<p style='font-size:20px;margin-top:10px;color:black;'>$name</p>"
      ?>

      <hr>
      <label for="day" style="font-size: 17px;font-weight: 20;">Day :</label><?php echo $check_in; ?>
      <hr>
      <label for="night" style="font-size: 17px;font-weight:20;">Night :</label><?php echo $check_out; ?>
      <hr>
      <label for="date" style="font-size: 17px;font-weight:20;">Ordered Dulax Room:</label><?php echo  $ordered_dulax; ?>
      <hr>
      <label for="child" style="font-size: 17px;font-weight:20;">Ordered Twin Room:</label><?php echo $ordered_twin; ?>
      <hr>
      <label for="child" style="font-size: 17px;font-weight:20;">Ordered Twin Room Total Price:</label><?php echo $twin_room_total_price; ?>
      <hr>

      <label for="child" style="font-size: 17px;font-weight:20;">Ordered Dulax Room Total Price:</label><?php echo $dulax_room_total_price?>
      <hr>

      <label for="child" style="font-size: 17px;font-weight:20;">Total Amount You Should Give IN A Day:</label><?php echo $subtotal?>
          
          
    </div>
  </div>
  <!--summary column end-->
</div>

<?php

}
?>

<!---personal information for order col and summary col end -->


 <!--booking div start -->
	<div class="w3-row" style="width: 800px;margin-top: 150px;">
		<h4 class="w3-hover-opacity" style="color:#666666;font-weight: bold;margin-left: 150px;">By clicking to complete this booking I acknowledge that I have read and accept the Rules & Restrictions.</h4>
	</div>
<!--booking div ends -->

<div class="w3-row w3-hover-opacity" style="height: 30px;margin-left: 130px;width:650px;background-color:#00b3b3;border-radius: 3px;border:2px solid #009999; text-align:center;margin-bottom:100px;" >
  <a href="payment_of_hotel.php" 
  style="text-decoration: none;font-size:17px;color: white;width:1000px;">
   Confirm This Booking</a>
</div>


</html>
