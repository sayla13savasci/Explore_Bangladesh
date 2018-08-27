<!DOCTYPE html>
<html>
<head>
<title>Invoice</title>
</head>
<body>
<?php


session_start();
          $con=new mysqli("localhost","root","", "travelandtour");
                // ^host       ^username  ^database name
		   $a=$_SESSION['user_amount'];
		   $b=$_SESSION['remaining_amount'];
		   $total=$_SESSION['sub_total'];
		   $email=$_SESSION['emaill'];
		   
		   					
		   
		   
		    if($total<$a)
			{
				  //amount of each guest
	          $sql="update user_bank set total_amount='$b'  where user_email='$email'";
			 
	          $result=$con->query($sql);
			  
			  echo "<div style='margin-top:10px;background-color: #d9d9d9'>

			   <label for='total_amount' style='font-size: 17px;font-weight: 10;margin-left:240px;'>Your Total Amount:&nbsp BDT</label>&nbsp $a
				
				<br>
				

				<label for='sub_total' style='font-size: 17px;font-weight: 10;margin-left:240px;'>Your Remaining Amount:&nbsp BDT</label>&nbsp $b
			
				</div>
				";
				
	          
			}	

				else{
					
					echo "<div style='margin-top:10px;background-color: #d9d9d9'>

				   <label for='total_amount' style='font-size: 17px;font-weight: 10;margin-left:240px;'>Your Total Amount:&nbsp BDT</label>&nbsp $a
					
					<br>
					

					<label for='sub_total' style='font-size: 17px;font-weight: 10;margin-left:240px;'>Your Due:&nbsp BDT</label>&nbsp $b


					<h4 style='color:red;margin-left:150px'>&#10006;Sorry sir you do not have sufficient balance to order this tour</h4>
					<h4 style='color:red;margin-left:150px'>&#10006;Better luck next time</h4>
					
					
				
					</div>
					";
				
					
					
				}
	?>


 


</body>
</html> 