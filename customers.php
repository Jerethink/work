<?php 
session_start();
if(isset($_SESSION['admin'])){ ?> 
 
 <?php } else{
        
        header("location: adminlogin.php");
      } ?>

<?php 

include "controllers/dblink.php"; 

$sql= "SELECT * FROM users ORDER BY id DESC";

      $result = $connection->prepare($sql);
      $result->execute();
      $outcome = $result->fetchAll(pdo::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Jerry Store</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet"  href="sty.css">
</head>
   <body>
   <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="dashboard.php">Dashboard</a></li>
                           <li><a href="index.php">Home</a></li>
                           <li><a href="#">New Releases</a></li>
                           <li><a href="#">Blog</a></li>
                           <li><a href="#">Customer Service</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>


<table class="table">

  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">First Name</th>
      <th scope="col">Surname</th>
      <th scope="col">email</th>
      
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
   
  <?php  foreach($outcome as $i => $display): ?> 
    <tr>
      <th scope="row"><?php $i +1 ?> </th>
      <td></td>
      <td><?php  echo $display['first_name'] ?></td>
      <td><?php  echo $display['last_name'] ?></td>
      <td><?php  echo $display['email'] ?></td>
      
      <td>
      
     <?php echo "<td><a href='deleteuser.php?id=".$display['id']."'><button type='submit' class='btn btn-sm btn-danger' title='Delete Post' onclick='return confirm(&quot;Confirm delete ?&quot;)'><i class='fa fa-trash-o' aria-hidden='true'></i> Delete</button></a>" ?>

      
      
    </tr>


    <?php endforeach; ?>
 

  </tbody>
</table>



</body>
</html>