<?php
  
   session_start();
   session_destroy();
   unset($_SESSION['id']);
   //echo 'You have successfully loggedout';
   $_SESSION['message']="You are now logged out";
   header("location: home.php");
  
?>
