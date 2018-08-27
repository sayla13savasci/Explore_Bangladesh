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
		   
		   $user_id=$_SESSION['id'];
					$sql2="SELECT email FROM users where user_id='$user_id'";
					$results=$con->query($sql2);
				    $user_email=mysqli_fetch_array($results);
				    $email=$user_email['email'];
				        
		   
		   
		    if($total<$a)
			{
				  //amount of each guest
	          $sql="update user_bank set total_amount='$b'  where user_email='$email'";
			 
	          $result=$con->query($sql);
			  
			  echo "<div style='margin-top:10px;background-color: #d9d9d9'>

			   <label for='total_amount' style='font-size: 17px;font-weight: 10;margin-left:240px;'>Your Total Amount:</label>&nbsp $a
				
				<br>
				

				<label for='sub_total' style='font-size: 17px;font-weight: 10;margin-left:240px;'>Your Remaining Amount:</label>&nbsp $b
			
				</div>
				";
				
	          
			}	

				else{
					
					echo "<div style='margin-top:10px;background-color: #d9d9d9'>

				   <label for='total_amount' style='font-size: 17px;font-weight: 10;margin-left:240px;'>Your Total Amount:</label>&nbsp $a
					
					<br>
					

					<label for='sub_total' style='font-size: 17px;font-weight: 10;margin-left:240px;'>Your Remaining Amount:</label>&nbsp $b
					<h4 style='color:red;'>Sorry sir you do not have sufficient balance to order this tour</h4>
					<h4 style='color:red;'>Better luck next time</h4>
					
				
					</div>
					";
				
					
					
				}
	?>


 


</body>
</html> 