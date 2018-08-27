<?php

	
		
		$con=new mysqli("localhost","root","", "bookproject");
					// ^host       ^username  ^database name
		
		$sql="SELECT * FROM books";
		
		$results=$con->query($sql);
		echo "<table border='1' align='center' style='width:100%'>";	
		echo "<tr>";
		echo "<td>"."Book Name"."</td>";	
		echo "<td>"."Auther Name"."</td>";
		echo "<td>"."Edition"."</td>";
		echo "<td>"."Preferance"."</td>";	
		echo "<td>"."View Detail"."</td>";
		echo "</tr>";
		
		while($row=mysqli_fetch_array($results))
		{
				echo "<tr>";
				
				echo "<td>".$row['title']."</td>";
				echo "<td>".$row['auther_name']."</td>";
				echo "<td>".$row['preferance']."</td>";
				echo "<td>".$row['edition']."</td>";
				echo "<td><a href='book.php?id=".$row['id']."'>Click Here</a></td>";
				echo "</tr>";
		
		}
	

?>

<html>
<head>
<style>
body{
	background-color:#FFF8DC;
}

ul {
    list-style-type: none;
    margin-right: 250px;
    padding: 10;
    overflow: hidden;
    background-color: #FFF8DC;
}

li {
    float: right;
}

li a {
    display: block;
    color: gray;
    text-align: center;
    padding: 24px 20px;
    margin-right:50 px;
    text-decoration: none;
}

li a:hover {
    background-color: Whitesmoke;
    color:YellowGreen;
}

h3.homepage_header{
	padding-top:20px;
	padding-left:500px;
	font-size: 30px;
	font-style: italic;
	color:#FFF8DC;
	
}

div.div_1{
	height: 100px;
	background-color:green;
	margin-top:0px;
}

</style>


</head>

<body>
<ul>
		<li><a href="bookDelete.php">Book Delete</a></li>
		<li><a href="showBook.php">Book Show</a></li>
		<li><a href="insert_book.php">Book Insert</a></li>
	</ul>
  

</body>

<div class="div_1"> 
	 <h3 class="homepage_header">SHOW BOOKS</h3>
	</div>

</html>