<?php 
session_start();
if(isset($_SESSION['user'])){ ?> 
 
 <?php } else{
        
        header("location:login.php");
      } ?>
