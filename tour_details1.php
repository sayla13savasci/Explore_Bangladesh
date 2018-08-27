<?php
  $tour_id=$_GET['tour_id'];
  //echo $tour_id;

  session_start();
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
    if (($con->affected_rows > 0) && (isset($_SESSION)) ){
        header("Location:final_tour_order.php");
         
    }else{
       
       header("Location:final_tour_order.php");

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


<style>
<!-- star rating -->

.stars-container {
  position: relative;
  display: inline-block;
  color: transparent;
}

.stars-container:before {
  position: absolute;
  top: 0;
  left: 0;
  content: '★★★★★';
  color: lightgray;
}

.stars-container:after {
  position: absolute;
  top: 0;
  left: 0;
  content: '★★★★★';
  color: #003366;
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

<!--     -->
</style>


<style type="text/css">
  input[type=text,email], select {
    width: 80%;
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

</head>
<body>


<div class="nav_div" class="w3-card-4">
<?php
if(isset($_SESSION['id']))
{
	?>
	<ul>
<li class="loogo"><a href="home.php"><img src="logo4.png" alt="Icon"  height="78" width="78" style="margin-top:-30px;"  /></image></a></li>

 <!--   <li><a  href="">Home</a></li> -->
    <li><a  href="tours.php">Tours</a></li>
    <li><a  href="hotels.php">Hotels</a></li>
    <li><a  href="offers.php">Offers</a></li>
    <li><a  href="contact_us.php">Gallery</a></li>
    <li><a  href="contact_us.php">Contact Us</a></li>
    <li><a  href="logout.php" style="float:right;">Logout</a></li>
</ul>  
	<?php
}

else
{
?>
<ul>
<li class="loogo"><a href="home.php"><img src="logo4.png" alt="Icon"  height="78" width="78" style="margin-top:-30px;"  /></image></a></li>

 <!--   <li><a  href="">Home</a></li> -->
    <li><a  href="tours.php">Tours</a></li>
    <li><a  href="hotels.php">Hotels</a></li>
    <li><a  href="offers.php">Offers</a></li>
    <li><a  href="contact_us.php">Gallery</a></li>
    <li><a  href="contact_us.php">Contact Us</a></li>
	<li><button class="navigation1" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">LOG IN</button></li> 
	<li><button class="navigation2" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">SIGN UP</button></li>
</ul>  
<?php
}
?>
</div>

<h4 style="color: #009999;font-size: 32px;font-weight: 700;margin-left: 200px">&#x26F5  Book A Tour More Then 200 Places</h4>

<div class="w3-row" style="height: 450px;width: 1100px;margin-left: 100px;margin-top: 20px;">
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


<!--##########from start###############-->
<div class="w3-card-4" style="width: 700px;height:630px;  margin-left: 250px;">
  <div class="booking_options" style="background-color: #009999;">
    <p>Booking Options...</p>
  </div>

  <div class="seller">
    <h4>Seller:</h4>
  </div>

  <div class="bootstrap-iso">
    <div class="container-fluid">
      <div class="row" style="width:1000px;">
        <div class="col-md-8 col-sm-8 col-xs-16">

          <div class="form_div">
          <!--form start-->
            <form method="POST">
  			      <label for="name" style="font-size: 17px;font-weight: 20;">Adult :</label> BDT <?php echo $details['adult_price'];?>           
          
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
				
			<label for="name" style="font-size: 17px;font-weight: 20;">Child : </label> BDT<?php echo $details['child_price'];?>           
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
              <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" required="" />
              <br>

             <label for="email" style="font-size: 17px;font-weight: 20;">email :</label>
              <input style="width: 280px;" id="a" type="email" name="email" required="">
         
              <input type="submit" value="Book Now..">
             
            </form>
            <!--form end-->

          </div>
        </div>
		<div class="w3-col" style="height:500px;width:200px; background-color:red;margin-left:50px;">
		
			
              <!--<label for="name">Adult</label>-->
                <br>

              <label for="Number">Rating :</label>
              <select id="number" type="text" name="rate" onchange="showUser(this.value)" required="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option
              </select>
              <br>
			  
		<!--	  <input type="submit" value="enter">  -->
				
		</div>
		
		
      </div>    
    </div>
  </div>

</div>



<!--##########from end###############-->


<!--#####################description part start#################-->
<div class="w3-card-4" style="width: 700px;height:550px;  margin-left: 250px;margin-top: 50px;">
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
      echo "<p style='color:#ff4400;font-size:30px;margin-left:30px;margin-top:10px;font-weight:500'>".$details['tour_name']."</p>";
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
  <?php include 'footer.php';?>
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
