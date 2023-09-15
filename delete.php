<?php 
session_start();
if(isset($_SESSION['admin'])){ ?> 
 
 <?php } else{
        
        header("location:adminlogin.php");
      } ?>



<?php 

try{

    include("controllers/dblink.php");
    //include("logic.php");
    $id =$_GET['id']; //we set a variable to obtain unique data.
    $sql= "DELETE FROM products where id ='$id'";

     $action= $connection->prepare($sql);
     $action->execute();
     
     echo "Product deleted successfully";
     header("location:list.php");
    }catch (PDOException $e) {
        echo $sql ."<br>". $e->getMessage();

    }
?>