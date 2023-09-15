<?php 
session_start();
if(isset($_SESSION['admin'])){ ?> 
 
 <?php } else{
        
        header("location:adminlogin.php");//line 1-5 set the login seesion here
      } ?>


<?php 

include "controllers/dblink.php"; 

$sql= "SELECT * FROM products ORDER BY id DESC ";

      $result = $connection->prepare($sql);
      $result->execute();
      $outcome = $result->fetchAll(pdo::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jerry stores</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="public/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="public/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet"  href="sty.css">
</head>
<body>
  
<table class="table">

  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Title</th>
      <th scope="col">Price($)</th>
      
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
   
  <?php  foreach($outcome as $i => $display): ?> 
    <tr>
      <th scope="row"><?php $i +1 ?> </th>
      <td></td>
      <td><?php  echo $display['heading'] ?></td>
      <td><?php  echo $display['price'] ?></td>
      
      <td>
      <?php echo "<td><a class='btn btn-sm btn-success' href='edit.php?id=".$display['id']."'>Edit</a>"; ?>

     <?php echo "<td><a href='delete.php?id=".$display['id']."'><button type='submit' class='btn btn-sm btn-danger' title='Delete Post' onclick='return confirm(&quot;Confirm delete ?&quot;)'><i class='fa fa-trash-o' aria-hidden='true'>Delete</i></button></a>" ?>

      
      
    </tr>


    <?php endforeach; //another method for writing foreach most especially with HTML ?>
 

  </tbody>
</table>


