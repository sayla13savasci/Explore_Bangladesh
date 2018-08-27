<?php
	$con=new mysqli("localhost","root","","travelandtour");
	session_start();
	$id=$_GET['id'];
	
	if(isset($_SESSION['id']))
	{
		
		


if($id==1 or $id==2 or $id==3 or $id==4or $id==5)
		{
	
			$sql="SELECT * FROM hotel_user_rating where user_id='".$_SESSION['id']."' and hotel_id='".$_SESSION['hotel_id']."' ";
			$results=$con->query($sql);
			if ($results->num_rows == 0)
			{
				$sqls="insert into hotel_user_rating(user_id,hotel_id,rating) values ('".$_SESSION['id']."','".$_SESSION['hotel_id']."','$id')";
				$result=$con->query($sqls);
				
				$sql="SELECT avg(rating) as aver FROM hotel_user_rating where hotel_id='".$_SESSION['hotel_id']."' ";
				$results=$con->query($sql);
				$row=mysqli_fetch_array($results);
				$e=round($row['aver']);
				$sql="update hotels set avg_user_rating='$e' where hotel_id='".$_SESSION['hotel_id']."' ";
				$results=$con->query($sql);
			}
			else
			{
				$sql="update hotel_user_rating set user_id='".$_SESSION['id']."',hotel_id='".$_SESSION['hotel_id']."',rating='$id' where user_id='".$_SESSION['id']."' and hotel_id='".$_SESSION['hotel_id']."' ";
				$results=$con->query($sql);
				
				$sql="SELECT avg(rating) as aver FROM hotel_user_rating where hotel_id='".$_SESSION['hotel_id']."' ";
				$results=$con->query($sql);
				$row=mysqli_fetch_array($results);
				$e=round($row['aver']);
				$sql="update hotels set avg_user_rating='$e' where hotel_id='".$_SESSION['hotel_id']."' ";
				$results=$con->query($sql);
			}
		}
		
	}
	?>