
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


<div class="nav_div" class="w3-card-4">
<ul>
    <li><a  href="home.php">Home</a></li>
    <li><a  class="active"  href="tours.php">Tours</a></li>
    <li><a  href="hotels.php">Hotels</a></li>
    <li><a  href="offers.php">Offers</a></li>
    <li><a  href="contact_us.php">Contact Us</a></li>
</ul>  
</div>


<div class="w3-card-4" style="width: 700px;height:300px;  margin-left: 250px;margin-top: 50px;">
  <div class="description">
    <p>Description</p>
  </div>

 <?php echo $details['tour_details_full'];?> 
</div>



<div class="footer">

  <div class="about_us" style="color:white">
    <h4 class="ab" style="text-decoration: underline;text-decoration-color: #8875f0">About Us</h4>
    <p>How To Book</p>
    <p>About Us</p>
    <p>Become Partner</p>   
  </div>

  <div class="about_us" style="color:white">
     <h4 class="sp" style="text-decoration: underline;text-decoration-color: #8875f0">Support</h4>
     <p>contact us</p>
     <p>Terms And Conditions</p>
     <p>Partner Registration</p>
     
  </div>

  <div class="about_us">
    <a href="home2.php" target="_blank" style="color:white">Home</a>    
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
</body>
</html>
