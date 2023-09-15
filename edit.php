<?php 
include("controllers/dblink.php");
session_start();
if(isset($_SESSION['admin'])){ ?> 
 
 <?php } else{
        
        header("location:adminlogin.php");
} ?>

<?php 

if ($_POST){


$target_dir = "./items_images/";
$target_file = $target_dir . basename($_FILES["images"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
 if(isset($_POST["submit"])) {
 $check = getimagesize($_FILES["images"]["tmp_name"]);
 if($check !== false) {
   echo "File is an image - " . $check["mime"] . ".";
   $uploadOk = 1;
 } else {
   echo "File is not an image.";
   $uploadOk = 0;
 }
 }


//  if (file_exists($target_file)) {
//  echo "Sorry, file already exists.";
//  $uploadOk = 0;
//  }


//  if ($_FILES["images"]["size"] > 500000) {
//  echo "Sorry, your file is too large.";
//  $uploadOk = 0;
//  }


//  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//  && $imageFileType != "gif" ) {
//  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//  $uploadOk = 0;
//  }


 if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
//    echo "The file ". htmlspecialchars( basename( $_FILES["images"]["name"])). " has been uploaded.";

 }
}
 

?>


<?php 
/*$id = $_GET["id"];

try{ 
    $select = "SELECT * FROM products WHERE id=? limit 1";
    $result= $connection->prepare($select);
    $result->execute([$id]);

   
    if($_POST){
    $sql= "UPDATE products SET images=?,heading=?,price=?,details=? WHERE id =? LIMIT 1";
        
     $action= $connection->prepare($sql);
     $images= $_POST["images"];
     //$images= $_FILES["images"];
     $heading= $_POST["heading"];
     $price= $_POST["price"];
     $details= $_POST["details"];
     
     
     $action->execute([$images,$heading,$price,$details,$id]);
     
     header("location:list.php");
    }
 
    }catch (PDOException $e) {
        echo $sql ."<br>". $e->getMessage();

    }
*/?>
<?php 
$id = $_GET["id"];

try{ include("controllers/dblink.php");
    $select = "SELECT * FROM products WHERE id=? limit 1";
    $result= $connection->prepare($select);
    $result->execute([$id]);

   
    if($_POST){
    $sql= "UPDATE products SET images=?,heading=?,details=?, price=? WHERE id =? LIMIT 1";
        
     $action= $connection->prepare($sql);
     $images= $_FILES["images"]["name"];

     $heading= $_POST["heading"];
     $details= $_POST["details"];
     $price= $_POST['price'];
     
     $action->execute([$images,$heading,$details,$price,$id]);
     echo "product updated successfully";
     header("location:dashboard.php");
    }
 
    }catch (PDOException $e) {
        echo $sql ."<br>". $e->getMessage();

    }
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

<?php foreach($result as $res){     ?>
<form style="margin:100px" method="post" enctype="multipart/form-data" >
        
        <label for="title">Product's Name:</label>
        <input class="form-control" value="<?=$res['heading']?>" type="text" name="heading" width="45px">
        
        <label for="title">Price:</label>
        <input class="form-control" value="<?=$res['price']?>" type="text" name="price" width="45px" >
        
        <br>
        <label for="title">Product's Description:</label>
        <textarea  name="details" id="content" type="text" class="form-control"  rows="" cols="10"><?=$res['details']?></textarea>

        <label for="title">Product's Image</label><br>
        <input class="form-group" type="file" name="images" value="<?//=$res['images']?>"  aria-describedby="emailHelp"> 
        <div >
  	      



        
        

        <?php } ?>
        <br>
        <input class="btn btn-sm btn-success" type="submit" value="Upload Products">
    </form>
    





<div class="container">
    <div class="row">
        <div class="col-md-5">


             
             
    
  
               

      </div>
  
  </div>

</div>

  <div class="container">
    <div class="row">
        <div class="col-md-5">

        </div>
         
      
      </div>
  
    </div>

</div>


<div class="container">
    <div class="row">
        <div class="col-md-5">

        </div>
         
      
      </div>
  
    </div>

</div>






















</form>

 

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>


