
<?php
		 session_start();
          $con=new mysqli("localhost","root","", "travelandtour");
                // ^host       ^username  ^database name
		   $ee=$_SESSION['email'];
           //echo $ee;
		  // echo " ";
		   
		    $hotel_id=$_SESSION['hotel_id'];
			//echo $ff;

			//amount of per child and adult
		  $sql="SELECT * FROM hotels where hotel_id='$hotel_id'";	
		  $result=$con->query($sql);
          $amount_child=mysqli_fetch_array($result);
         // $amount_of_child=$amount_child['child_price'];
          //echo "Amount of per child:";
		 // echo  $amount_of_child;
		  //echo " ";
		  
		 // $amount_of_adult=$amount_child['adult_price'];
		  

		?>	
		   
	<?php  /* //number of adult and child calculation
		   $sql="SELECT * FROM order_tour where email='$ee'";	
		  $result=$con->query($sql);
          $num_child=mysqli_fetch_array($result);
         $number_child=$num_child['person_number_child'];
         echo "Number of child:";
		  echo $number_child;
		  echo " ";
		  
		  $number_adult=$num_child['person_number_adult'];
		  echo "Number of adult:";
		  echo $number_adult;
		  echo " ";
		  
		  //amount of per child and adult
		  $sql="SELECT * FROM tours where tour_id='$ff'";	
		  $result=$con->query($sql);
          $amount_child=mysqli_fetch_array($result);
          $amount_of_child=$amount_child['child_price'];
          echo "Amount of per child:";
		  echo  $amount_of_child;
		  echo " ";
		  
		  $amount_of_adult=$amount_child['adult_price'];
		  echo "Amount of per adult:";
		  echo  $amount_of_adult;
		  echo " ";
		  
		  //total amount for child
		  $total_cost_for_child=$number_child*$amount_of_child;
		  echo "Total cost of child";
		  echo $total_cost_for_child;
		   echo " ";
		  
		  $total_cost_for_adult=$number_adult*$amount_of_adult;
		  echo "Total cost of adult";
		  echo $total_cost_for_adult;
		   echo " ";
		  
		  $sub_total=$total_cost_for_child+$total_cost_for_adult;
		  echo "sub total:";
		  echo $sub_total;
		   echo " ";
		  	  
		  
		 //amount of each guest
          $sql="SELECT * FROM user_bank where user_email='$ee'";
          $result=$con->query($sql);
          $order_info=mysqli_fetch_array($result);
          $amount=$order_info['total_amount'];
          echo $amount; */
          
		  
?>

	
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="headerstyle.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<!--****************for modall***********-->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>

<!--
<div class="nav_div" class="w3-card-4">
<ul>
    <li><a  href="home.php">Home</a></li>
    <li><a  class="active"  href="tours.php">Tours</a></li>
    <li><a  href="hotels.php">Hotels</a></li>
    <li><a  href="offers.php">Offers</a></li>
    <li><a  href="contact_us.php">Contact Us</a></li>
</ul>  
</div>  -->

		
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
		<a  style="margin-left:670px;text-decoration:none" href="logout.php">Log Out</a>
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
</div>
<?php
}
?>
	

<?php
if(isset($_SESSION['id']))
{
	?>	
<div class="w3-row w3-card-4" style="width: 800px;height: 1100px;margin-left: 270px;margin-top: 70px;margin-bottom: 100px;">
  <div  style="background-color:#ff571a;height: 50px;">
  
  	<h4 style="color:white;text-align: center;font-weight: bold;font-size: 25px;margin-top: -30px;">UNPAID</h4> 
	
  </div>
    <div  class="w3-row" style="height: 120px;background-color: white">


<!--**********************modal end*******************************-->
<div id="demo">
		<button type="submit "style="margin-left: 330px;margin-top: 20px;padding: 15px 32px;font-size: 25px;background-color: #009999;color: white" 
		onclick="pay()">Pay Now</button>
	
		
		<script>
			function pay() {
				//maliha
				
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("demo").innerHTML =
					this.responseText;
				}
			  };
			  xhttp.open("GET", "pay_hotel.php", true);
			  xhttp.send();
						
				
				//maliha end			
		    
		}
		
		</script> 
</div>
		
		
		
	</div> 
	<!--invoice and customer details start-->
	<hr>
	<div class="w3-row" style="height: 400px;background-color:white">
		<div class="w3-col" style="width: 350px;height: 400px; background-color: white">
			<div style="margin-left: 30px;">
				<h2>INVOICE</h2>
				<hr>
				<?php
					
					$user_id=$_SESSION['id'];
					$sql2="SELECT email FROM users where user_id='$user_id'";
					$results=$con->query($sql2);
				    $user_email=mysqli_fetch_array($results);
				    $email=$user_email['email'];
				        
				
					$sql="SELECT * FROM order_hotel where email='$email'";	
						  	$result=$con->query($sql);
				          	$order_date=mysqli_fetch_array($result);
				         	$date_start=$order_date['check_in'];
				         	$date_end=$order_date['check_out'];
				        
			    ?>
			    <label for="invoice" style="font-size: 18px;font-weight: 10;">Invoice Date :</label><?php echo $date_start; ?>
			    <hr>
				<label for="due_date" style="font-size: 18px;font-weight: 10;">Due Date :</label><?php echo $date_end; ?>			
			</div>		
		</div>

		<div class="w3-col" style="width: 350px;height: 400px;margin-left: 70px; background-color:white">
		<h3 style="margin-left: 30px;">Customer Details</h3>
		<hr>
			<div style="margin-left: 40px;">
				<?php

					$sql="SELECT * FROM users where email='$email'";	
				  	$result=$con->query($sql);
		          	$guest=mysqli_fetch_array($result);
		         	$first_name=$guest['fname'];
		         	$last_name=$guest['lname'];
		         	$email=$guest['email'];
		         	$phone=$guest['phone'];
		         	//$address=$guest['address'];

		         

				?>

				<label for="fname" style="font-size: 17px;font-weight: 10;">First Name :</label><?php echo $first_name; ?>
				<hr>

				<label for="lname" style="font-size: 17px;font-weight: 10;">Last Name :</label><?php echo $last_name;?>
				<?php //echo "<br>" ?>
				<hr>
				<label for="email" style="font-size: 17px;font-weight: 10">Email :</label><?php echo $email;?>
				<?php //echo "<br>" ?>
				<hr>

				<label for="phone" style="font-size: 17px;font-weight: 10">Phone :</label><?php echo $phone;?>
				<?php //echo "<br>" ?>
				<hr>

				<!--<label for="address" style="font-size: 17px;font-weight: 10">Address :</label><?php //echo $address;?> -->
			</div>				
		</div>	
	</div>
	<hr>
		
	<div class="w3-row" style="height: 200px;background-color: white;margin-top: 10px;">
		<div class="w3-col" style="width: 350px;height: 400px; background-color:white">
			<div style="margin-left: 30px;margin-top: 20px">
				<h3>Tour Details</h3>
				<hr>
				<div style="margin-left: 30px;">
				<?php			
			  	//amount of per child and adult
				  $sql="SELECT * FROM hotels where hotel_id='$hotel_id'";	
				  $result=$con->query($sql);
		          $tour_detail=mysqli_fetch_array($result);		        
		          $hotel_name=$tour_detail['hotel_name'];
				  $hotel_place=$tour_detail['hotel_place'];
		          $dulax_room_price=$tour_detail['dulax_room_price'];
        		 $double_room_price=$tour_detail['double_room_price'];
        
     
				?>

				<label for="tourname" style="font-size: 17px;font-weight: 10;">Hotel Name:</label><?php echo $hotel_name; ?>
				<?php //echo "<br>" ?>
				<hr>

				<label for="tourtype" style="font-size: 17px;font-weight: 10;">Place:</label><?php echo $hotel_place ?>
				<?php //echo "<br>" ?>
				<hr>

				<label for="child_price" style="font-size: 17px;font-weight: 10;">Dulex Room Price:</label><?php echo $dulax_room_price; ?>
				<?php //echo "<br>" ?>
				<hr>

				<label for="adult_price" style="font-size: 17px;font-weight: 10;">Double Room Price:</label><?php echo $double_room_price; ?>
				<?php //echo "<br>" ?>
				<hr>
				</div>
			
			</div>			
		</div>

		<div class="w3-col" style="width: 350px;height: 400px;margin-left: 70px; background-color:white">
		<h3 style="margin-left: 30px;">Quantity & Details</h3>
		<hr>
		<div style="margin-left: 40px;">
			<?php

			 $sql2="SELECT * FROM order_hotel where email='$email'";
	        $results2=$con->query($sql2); 
	        $orders=mysqli_fetch_array($results2);

			$ordered_dulax=$orders['num_dulax'];
	        $ordered_twin=$orders['num_twin'];
	        //$date=$orders['date'];
	        //$child=$orders['person_number_child'];
	        //$adult=$orders['person_number_adult'];

	        $dulax_room_total_price=$ordered_dulax*$dulax_room_price;
	        $twin_room_total_price=$ordered_twin*$double_room_price;

	        $subtotal=$dulax_room_total_price+$twin_room_total_price;
	        $_SESSION['sub_total']=$subtotal; 
		  	  


			 
		   	   //amount of each guest
	          $sql="SELECT * FROM user_bank where user_email='$email'";
	          $result=$con->query($sql);
	          $order_info=mysqli_fetch_array($result);
	          $amount=$order_info['total_amount'];
			  $_SESSION['user_amount']=$amount;       

	           //remaiming amount will be
	          $remaining_amount=$amount-$subtotal;
			  $_SESSION['remaining_amount']=$remaining_amount;
	         
			?>

			<label for="numberOfChild" style="font-size: 17px;font-weight: 10;">Number Of Dulex Room :</label><?php echo $ordered_dulax; ?>
			<?php //echo "<br>" ?>
			<hr>

			<label for="numberOfAdult" style="font-size: 17px;font-weight: 10;">Number Of Twin Room:</label><?php echo  $ordered_twin; ?>
			<?php //echo "<br>" ?>
			<hr>

			<label for="amountforchild" style="font-size: 17px;font-weight: 10;">Total Cost For Dulex:</label><?php echo $dulax_room_total_price; ?>
			<?php //echo "<br>" ?>
			<hr>

			<label for="numberOfAdult" style="font-size: 17px;font-weight: 10;">Total Cost For twin:</label><?php echo $twin_room_total_price;?>
			<?php //echo "<br>" ?>
			<hr>

			<label for="sub_total" style="font-size: 17px;font-weight: 10;">Sub Total Amount:</label><?php echo $subtotal; ?>
			<?php //echo "<br>" ?>
			<hr>

			<!--<label for="total_amount" style="font-size: 17px;font-weight: 10;">Your Total Amount:</label><?php// echo $amount; ?>
			<?php //echo "<br>" ?>
			<hr>

			<label for="sub_total" style="font-size: 17px;font-weight: 10;">Your Remaining Amount Will be:</label><?php //echo $remaining_amount; ?>
			<?php //echo "<br>" ?> -->

		</div>
				
		</div>	
	</div>


</div>

	<?php
}

else
{
?>

	<div class="w3-row w3-card-4" style="width: 800px;height: 1200px;margin-left: 270px;margin-top: 70px;margin-bottom: 100px;">
	  	<div  style="background-color:#ff571a;height: 50px;">
	  		<h4 style="color:white;text-align: center;font-weight: bold;font-size: 25px;margin-top: -30px;">UNPAID</h4> 
	  	</div>

      	<div class="w3-row" style="height: 80px;background-color: white">


			<div id="demo">
				<button type="submit "style="margin-left: 330px;margin-top: 20px;padding: 15px 32px;font-size: 25px;background-color: #009999;color: white" 
				onclick="pay()">Pay Now</button>
			
				
				<script>
					function pay() {
						//maliha
						
						var xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("demo").innerHTML =
							this.responseText;
						}
					  };
					  xhttp.open("GET", "pay_guest_hotel.php", true);
					  xhttp.send();
								
						
						//maliha end			
				    
				}
				
				</script> 
			</div>
		</div>
		<!--invoice and customer details start-->
	<hr>
	<div class="w3-row" style="height: 400px;background-color:white">
		<div class="w3-col" style="width: 350px;height: 400px; background-color: white">
			<div style="margin-left: 30px;">
				<h2>INVOICE</h2>
				<hr>
				<?php
					$sql="SELECT * FROM order_hotel where email='$ee'";	
						  	$result=$con->query($sql);
				          	$order_date=mysqli_fetch_array($result);
				         	$date_start=$order_date['check_in'];
				         	$date_end=$order_date['check_out'];
				        
				        
			    ?>
			    <label for="invoice" style="font-size: 18px;font-weight: 10;">Invoice Date :</label><?php echo $date_start; ?>
			    <hr>
				<label for="due_date" style="font-size: 18px;font-weight: 10;">Due Date :</label><?php echo $date_end; ?>
			</div>		
		</div>

		<div class="w3-col" style="width: 350px;height: 400px;margin-left: 70px; background-color:white">
		<h3 style="margin-left: 30px;">Customer Details</h3>
		<hr>
			<div style="margin-left: 40px;">
				<?php

					$sql="SELECT * FROM hotel_guest_order where email='$ee'";
					$result=$con->query($sql);
		          	$guest=mysqli_fetch_array($result);
		         	$first_name=$guest['fname'];
		         	$last_name=$guest['lname'];
		         	$email=$guest['email'];
		         	$phone=$guest['phone'];
		            $address=$guest['address'];
		        
							         

				?>

				<label for="fname" style="font-size: 17px;font-weight: 10;">First Name :</label><?php echo $first_name; ?>
				<hr>

				<label for="lname" style="font-size: 17px;font-weight: 10;">Last Name :</label><?php echo $last_name;?>
				<?php //echo "<br>" ?>
				<hr>
				<label for="email" style="font-size: 17px;font-weight: 10">Email :</label><?php echo $email;?>
				<?php //echo "<br>" ?>
				<hr>

				<label for="phone" style="font-size: 17px;font-weight: 10">Phone :</label><?php echo $phone;?>
				<?php //echo "<br>" ?>
				<hr>

				<label for="address" style="font-size: 17px;font-weight: 10">Address :</label><?php echo $address;?>
			</div>				
		</div>	
	</div>
	<hr>
		
	<div class="w3-row" style="height: 200px;background-color: white;margin-top: 10px;">
		<div class="w3-col" style="width: 350px;height: 400px; background-color:white">
			<div style="margin-left: 30px;margin-top: 20px">
				<h3>Tour Details</h3>
				<hr>
				<div style="margin-left: 30px;">
				<?php			
			  	//amount of per child and adult	
				  $sql="SELECT * FROM hotels where hotel_id='$hotel_id'";	
				  $result=$con->query($sql);
		          $tour_detail=mysqli_fetch_array($result);		        
		          $hotel_name=$tour_detail['hotel_name'];
				  $hotel_place=$tour_detail['hotel_place'];
		          $dulax_room_price=$tour_detail['dulax_room_price'];
        		 $double_room_price=$tour_detail['double_room_price'];
        
				?>

				
				<label for="tourname" style="font-size: 17px;font-weight: 10;">Hotel Name:</label><?php echo $hotel_name; ?>
				<?php //echo "<br>" ?>
				<hr>

				<label for="tourtype" style="font-size: 17px;font-weight: 10;">Place:</label><?php echo $hotel_place ?>
				<?php //echo "<br>" ?>
				<hr>

				<label for="child_price" style="font-size: 17px;font-weight: 10;">Dulex Room Price:</label><?php echo $dulax_room_price; ?>
				<?php //echo "<br>" ?>
				<hr>

				<label for="adult_price" style="font-size: 17px;font-weight: 10;">Double Room Price:</label><?php echo $double_room_price; ?>
				<?php //echo "<br>" ?>
				<hr>
				</div>

				<hr>
				</div>
			
			</div>			
		</div>

		<div class="w3-col" style="width: 350px;height: 400px;margin-left: 70px;margin-top: -200px; background-color:white">
		<h3 style="margin-left: 30px;">Quantity & Details</h3>
		<hr>
		<div style="margin-left: 40px;">
			<?php

			  //number of adult and child calculation
			  $sql="SELECT * FROM order_hotel where email='$ee'";	
			  $results2=$con->query($sql); 
	        $orders=mysqli_fetch_array($results2);

			$ordered_dulax=$orders['num_dulax'];
	        $ordered_twin=$orders['num_twin'];
	        //$date=$orders['date'];
	        //$child=$orders['person_number_child'];
	        //$adult=$orders['person_number_adult'];

	        $dulax_room_total_price=$ordered_dulax*$dulax_room_price;
	        $twin_room_total_price=$ordered_twin*$double_room_price;

	        $subtotal=$dulax_room_total_price+$twin_room_total_price;
	        $_SESSION['sub_total']=$subtotal; 
		  	 


			 
		   	   //amount of each guest
	          $sql="SELECT * FROM user_bank where user_email='$email'";
	          $result=$con->query($sql);
	          $order_info=mysqli_fetch_array($result);
	          $amount=$order_info['total_amount'];
			  $_SESSION['user_amount']=$amount;       

	           //remaiming amount will be
	          $remaining_amount=$amount-$subtotal;
			  $_SESSION['remaining_amount']=$remaining_amount;
	         
			?>

			<label for="numberOfChild" style="font-size: 17px;font-weight: 10;">Number Of Dulex Room :</label><?php echo $ordered_dulax; ?>
			<?php //echo "<br>" ?>
			<hr>

			<label for="numberOfAdult" style="font-size: 17px;font-weight: 10;">Number Of Twin Room:</label><?php echo  $ordered_twin; ?>
			<?php //echo "<br>" ?>
			<hr>

			<label for="amountforchild" style="font-size: 17px;font-weight: 10;">Total Cost For Dulex:</label><?php echo $dulax_room_total_price; ?>
			<?php //echo "<br>" ?>
			<hr>

			<label for="numberOfAdult" style="font-size: 17px;font-weight: 10;">Total Cost For twin:</label><?php echo $twin_room_total_price;?>
			<?php //echo "<br>" ?>
			<hr>

			<label for="sub_total" style="font-size: 17px;font-weight: 10;">Sub Total Amount:</label><?php echo $subtotal; ?>
			<?php //echo "<br>" ?>
			<hr>		  
	         
			
			<hr>

	<!--		<label for="total_amount" style="font-size: 17px;font-weight: 10;">Your Total Amount:</label><?php //echo $amount; ?>
			<?php //echo "<br>" ?>
			<hr>

			<label for="sub_total" style="font-size: 17px;font-weight: 10;">Your Remaining Amount Will be:</label><?php //echo $remaining_amount; ?>
			<?php //echo "<br>" ?>   -->

		</div>
				
		</div>	
	</div>


</div>
<?php
}
?>


</body>
</html>
