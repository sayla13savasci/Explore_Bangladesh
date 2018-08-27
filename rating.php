<?php
	$con=new mysqli("localhost","root","","travelandtour");
	session_start();
	$id=$_GET['id'];
	
	if(isset($_SESSION['id']))
	{
		
		


if($id==1 or $id==2 or $id==3 or $id==4or $id==5)
		{
	
			$sql="SELECT * FROM user_rating where user_id='".$_SESSION['id']."' and tour_id='".$_SESSION['tour_id']."' ";
			$results=$con->query($sql);
			if ($results->num_rows == 0)
			{
				$sqls="insert into user_rating(user_id,tour_id,rating) values ('".$_SESSION['id']."','".$_SESSION['tour_id']."','$id')";
				$result=$con->query($sqls);
				
				$sql="SELECT avg(rating) as aver FROM user_rating where tour_id='".$_SESSION['tour_id']."' ";
				$results=$con->query($sql);
				$row=mysqli_fetch_array($results);
				$e=round($row['aver']);
				$sql="update tours set avg_user_rating='$e' where tour_id='".$_SESSION['tour_id']."' ";
				$results=$con->query($sql);
			}
			else
			{
				$sql="update user_rating set user_id='".$_SESSION['id']."',tour_id='".$_SESSION['tour_id']."',rating='$id' where user_id='".$_SESSION['id']."' and tour_id='".$_SESSION['tour_id']."' ";
				$results=$con->query($sql);
				
				$sql="SELECT avg(rating) as aver FROM user_rating where tour_id='".$_SESSION['tour_id']."' ";
				$results=$con->query($sql);
				$row=mysqli_fetch_array($results);
				$e=round($row['aver']);
				$sql="update tours set avg_user_rating='$e' where tour_id='".$_SESSION['tour_id']."' ";
				$results=$con->query($sql);
			}
		}
		
	}
	?>