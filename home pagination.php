<?php
         $output='';      
		//connection with database
		$con=new mysqli("localhost","root","", "travelandtour");
					// ^host       ^username  ^database name
		

	    //dcelare the number of page we want in per page
		 //$per_page_books=2; 

		//find out the number of results in database

		 $sql="SELECT * FROM tours order by avg_user_rating DESC limit 4";
   
		 $results=$con->query($sql);
		 $row=mysqli_fetch_array($results);
		 


		$myOutput = '<div class="container">
						<div class="row ">
							<div class="col-md-8">';
											
						while($row=mysqli_fetch_array($results)){
						$image = $row['tour_image'];
						$output .=	'<div class="row well" style="padding-left:2px;">
									<div class="col-md-2 tour-image">
										<img src="tour_images/'.$image.'"  class="w3-border w3-padding  w3-card-4" alt="Norway" height="180" width="260"/>
									</div>';
									
									
						

						$output .=	'<div class="col-md-5 detail" style="padding-left:70px;">
										<strong>'.$row['tour_name'].'</strong>
										<p style="width: 250px">'.$row['tour_details_short'].'</p>'.
										'Day: '.$row["day"].' Night: '.$row["night"].'<br>
									</div>';

						$output .=	'<div class="col-md-1 more-detail" style="padding-left:50px;">
										<a href="tour_details.php?tour_id='.$row["tour_id"].'" class="btn btn-success w3-hover-opacity" style="background-color:#009999">DETAILS</a>
									</div>';
						$output .= '</div>';
					}

					
				$myOutput .= $output;
				$myOutput .= '</div>
						</div>
					</div>';

		echo $myOutput;

?>
