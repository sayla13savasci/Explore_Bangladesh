<?php session_start();

 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
            
        $email = $_POST["email"];
        $password = $_POST["password"];

        
        $db_handle = mysqli_connect("localhost","root","","travelAndTour");
        // $db_found = mysqli_select_db($db_handle,"restaurant");

    // if($db_found){
            $SQL = "SELECT * FROM users where  email='$email' and password='$password'";
            $result = mysqli_query($db_handle,$SQL);
            
            
            if(mysqli_num_rows($result)){
                header("Location:modal.php");
            
            }
            else {
                
                header("Location:login.php");

            }

        // }
    // else{
    //  echo "Db not found";

    // }
            mysqli_close($db_handle);
}

?>


<?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
    
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
            echo "<h1 style='color:lightgreen; margin-left:100px;'>User Have Successfully Registered!!. </h1>";
        }else{
            echo "<h1 style='color:red; margin-left:100px;'>Failed to Registered!!. </h1>";
        }
               
    }

?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="homestyle.css">


<style>
div.navbar{

    background-color: white;

}


body{
    background-color: red;
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
.nav{
    background-color: white;
    color: gray;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.nav:hover {
    opacity: 0.8;
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
    width: 20%;
    border-radius: 30%;
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
    width: 80%; /* Could be more or less, depending on screen size */
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
</head>
<body>

<div class="navbar">

<ul>
    <li><a class="nav" href="home.php">Home</a></li>
    <li><a class="nav" href="tours.php">Tours</a></li>
    <li><a class="nav" href="hotels.php">Hotels</a></li>
    <li><a class="nav" href="offers.php">Offers</a></li>
    <li><button class="nav" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">LOG IN</button></li>
    <li><button class="nav" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">SIGN UP</button></li>    
</ul>

</div>



<div id="id01" class="modal">
  
  <form method="post"  class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="abc.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" name="email" placeholder="Enter Email" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" name="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
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
        
      <button type="submit">Register</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>


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

</body>
</html>
