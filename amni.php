<?php
  
  /* $con=new mysqli("localhost","root","", "travelandtour");
          // ^host       ^username  ^database name
    
    $sql="SELECT * FROM  hotel_place_details";
    $results=$con->query($sql);
    
    

    
     while($row=mysqli_fetch_array($results))
    {
        echo "<tr>";
        echo "<td>".$row['hotel_place']."</td>"; 
        echo "</tr>"; 
    
    }  */
    
 
    
   /* $results=$con->query($sql);
    echo "<table align='center'  class='w3-card-4' style='width:70%;background-color:#7de8e3'>";  
    echo "<tr>";
    echo "<td>"."     "."</td>";
    echo "<td>"."     "."</td>";    
    echo "<td style='width: 20px'>"."     "."</td>";
    echo "</tr>"; 
    
    while($row=mysqli_fetch_array($results))
    {
        echo "<tr>";
        echo "<td>".$row['tour_image']."</td>"; 
        echo "<td>".$row['tour_name']."<br>".$row['tour_details_short']."<br>".$row['tour_type']."<br>".$row['day']." ".$row['night']."</td>";
        echo "<td><a style='background-color: red'  href='tour_details.php?tour_id=".$row['tour_id']."'><img src='button.png'  style='width:100px;height:50px;border:0;hover:'>
</a></td>";
        echo "</tr>"; 
    
    } */
  

?>



<!DOCTYPE html>
<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- jquery 3.2.1 library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="hotelstyle.css">
<link rel="stylesheet" type="text/css" href="newstyle.css">

</head>
<body>





<div class="nav_div" class="w3-card-4">
<ul>
    <li><a  href="home.php">Home</a></li>
    <li ><a href="tours.php">Tours</a></li>
    <li class="active"><a  href="hotels.php">Hotels</a></li>
    <li><a  href="offers.php">Offers</a></li>
    <li><a  href="contact_us.php">Contact Us</a></li>
</ul>  
</div>


<!--sayla slider<div class="w3-content w3-section" style="max-width:1000px">
  <img class="mySlides" src="6.jpg" style="width:155% ;height:400px">
  <img class="mySlides" src="7.jpg" style="width:155%;height:400px">
   <img class="mySlides" src="8.jpg" style="width:155%;height:400px">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>  -->


<!--code of slider strats maliha-->
<div id="container" style="margin-top: 25px;">
    <img class="slides" src="hotel_slider_image/hotel1.jpg"/>
    <img class="slides" src="hotel_slider_image/hotel2.jpg"/>
    <img class="slides" src="hotel_slider_image/hotel3.jpg"/>
    <img class="slides" src="hotel_slider_image/hotel4.jpg"/>
    <img class="slides" src="hotel_slider_image/hotel5.jpg"/>
    <button class="btn" onclick="plusindex(-1)"  id="btn1">&#10094;</button>
    <button class="btn" onclick="plusindex(1)" id="btn2">&#10095;</button>
</div>

<script type="text/javascript">
 var index=1;
  function plusindex(n) {
    index=index+1;
    showimage(index);
    // body...
  }
  showimage(1);
  function showimage(n){
    var i;
    var x=document.getElementsByClassName("slides"); 
    if(n>x.length){index=1};
    if(n<1){index=x.length};
    for(i=0;i<x.length;i++)
    {
      x[i].style.display="none"; 
    }
    x[index-1].style.display="block";
  }
    autoSlide();
        function autoSlide(){
            var i;
            var x=document.getElementsByClassName("slides");
            for(i=0;i<x.length;i++)
            {
                x[i].style.display="none";
            }
            if(index>x.length){ index=1 };
            x[index-1].style.display="block";
            index++;
            
        
            setTimeout(autoSlide,1000);
      }
</script>
<!--code of slider end -->


<div class="simple-text">
  <h1 class="w3-hover-opacity" style="color:#009999;padding-top: 6px;text-align: center;font-weight: bold;">&#9748; Save up to 30% on hotels.</h1>
  <p style="padding-left: 60px; margin-top:25px;font-weight: bold;font-size: 18px;">Explore Bangladesh compares prices from 200+ booking sites to help you find the lowest price on the right hotel for you.</p>
</div>


<div class="row" style="margin-top: 90px;">
  <div class="col-md-4" style="width: 350px;height: 600px;margin-left:100px;">
    <div class="w3-hover-opacity w3-card-2 design_text_one" style="height: 250px;">
      <h4 style="text-align: center;background-color: #009999;color: white;height:30px;">Property Type</h4>
      <p>&#9996; Apeartment</p>
      <p>&#9996; Hotel</p>
      <p>&#9996; Guest House</p> 
      <p>&#9996; Motel</p> 
      <p>&#9996; Residence</p>
      <p>&#9996; Resort</p>   
    </div>

    <div class="tour-type w3-card-2 w3-hover-opacity" style="height: 430px;">
      <h4 style="margin-top: 50px;text-align: center; background-color: #009999;color: white;height:30px;">Amnities</h4>

      <p>&#9634; Airport Transport</p>
      <p>&#9634; Business center</p>
      <p>&#9634; Disabled Facilities</p>
      <p>&#9634; NIght Club</p>
      <p>&#9634; Wifi Internet</p>
      <p>&#9634; Spa</p>
      <p>&#9634; Children Activities</p>
      <p>&#9634; Air Conditioner</p>
      <p>&#9634; Card Accepted</p>  
      <p>&#9634; Elevator</p>  
      <p>&#9634; Pet Allowed</p>  
      <p>&#9634; Shuttle Bus Service</p>   
    </div>
    
  </div>  

  <input type="hidden" id="aminities" value="<?php echo htmlspecialchars_decode($_GET['compna']);?>">

  <div class="col-md-8" style="width:900px;"  id="pagination_data">
          
  </div>
</div>



<!--code of pagination ajax-->
<script type="text/javascript">

$(document).ready(function(){
  var compna= $('#aminities').val();

  load_data(1,compna);
  function load_data(page,compna){
    console.log(compna);
    $.ajax({
      url:"bla.php",
      method:"POST",
      data: {page: page,compna: compna},
        success: function(data){
          console.log(data);
          $('#pagination_data').html(data);

        } 

    } )
  }

$(document).on('click', '.pagination_link', function() {

  var page= $(this).attr("id");
  var compna = $('#aminities').val();
  load_data(page, compna);
  
  
});

});

</script>

              

</body>
</html>
