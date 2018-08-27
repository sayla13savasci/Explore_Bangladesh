<?php
 

  if($_SERVER["REQUEST_METHOD"]=="POST"){
  
    $person_type = $_POST["person_type"];
    $person_number= $_POST["person_number"];
    $date = $_POST["date"];
    
    
    $con=new mysqli("localhost","root","", "travelandtour");
          // ^host       ^username  ^database name

    $sql="insert into order_tour(person_type,person_number,date) values
        ('$person_type','$person_number','$date')";

   $result=$con->query($sql);
    if ($con->affected_rows > 0) {
      echo "<h1 style='color:lightgreen; margin-left:100px;'>User Have Successfully Registered!!. </h1>";
    }else{
      echo "<h1 style='color:red; margin-left:100px;'>Failed to Registered!!. </h1>";
    }
          
  }


?>

<?php 
  $con=new mysqli("localhost","root","", "travelandtour");
  
  $sql="SELECT * FROM tours WHERE tour_id='$_GET[tour_id]'";  
  $results=$con->query($sql);
  $details=mysqli_fetch_array($results);
  
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





</body>
</html>
