
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

<body>
<div class="nav_div" class="w3-card-4">
<ul>
    <li><a  href="home.php">Home</a></li>
    <li><a  class="active"  href="tours.php">Tours</a></li>
    <li><a  href="hotels.php">Hotels</a></li>
    <li><a  href="offers.php">Offers</a></li>
    <li><a  href="contact_us.php">Contact Us</a></li>
</ul>  
</div>


<!---personal information for order start -->
<div class="w3-row" style="margin-top: 30px;margin-left: 150px;">
  <div class="w3-col s7 w3-white w3-card-4" style="height: 450px;">
    <div style="height: 50px;background-color: #00cccc;margin-top:-10px;">
      <h4 style="text-align: center;padding-top: 5px;">First Become A Traveller</h4>    
    </div>

    <div class="w3-row">
      <div class="w3-col s6 w3-red" style="height: 250px;">

        
      </div>

      <div class="w3-col s6 w3-green" style="height: 250px;">
        
      </div>
    </div>

    


  </div>

  <div class="w3-col s4 w3-gray w3-center" style="margin-left: 20px;">
    <h4>s6</>
  </div>
</div>

<!---personal information for order end -->



</body>
</html>
