<?php include "controllers/dblink.php";  ?>
<?php require_once "show/nav.php"; ?> 
<?php 

$sql= "SELECT * FROM products ORDER BY id DESC limit 6";

      $result = $connection->prepare($sql);
      $result->execute();
      $outcome = $result->fetchAll(pdo::FETCH_ASSOC);

?>




   <body>
      
      <div class="banner_bg_main">
         
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="#">Best Sellers</a></li>
                           <li><a href="#">Trending</a></li>
                           <li><a href="#">New Releases</a></li>
                           <li><a href="#">Blog</a></li>
                           <li><a href="#">Customer Service</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="index.html"></a></div>
                  </div>
               </div>
            </div>
         </div>
         
         
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.html">Home</a>
                     <a href="#.php">About</a>
                     <a href="other.php">Other Products</a>
                     <a href="#">Blog</a>
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Men's wears</a>
                        <a class="dropdown-item" href="#">Women Wears</a>
                        <a class="dropdown-item" href="#">Children's collection</a>
                     </div>
                  </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search this blog">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                     <div class="lang_box ">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="images/flag-uk.png" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu ">
                           <a href="#" class="dropdown-item">
                           <img src="images/flag-france.png" class="mr-2" alt="flag">
                           French
                           </a>
                        </div>
                     </div>
                     <div class="login_menu">
                        <ul>
                           <li><a href="#">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><a href="#">
                              <i class="fa fa-user" aria-hidden="true"></i>
                             </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">New to Jerry's Stores ?? <br>we gad you covered </h1>
                              <div class="buynow_bt"><a href="payment.php">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Are You tired of fake Materials ? <br>Jerry's Stores got you covered !</h1>
                              <div class="buynow_bt"><a href="#">Explore</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">buy now<br>pay later</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- fashion section start -->
      <div class="fashion_section">
         <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">Available Products</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                        <?php foreach($outcome as $i => $display):  ?>
                           <div style="back-ground:black;" class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text"><?php  echo $display['heading'] ?></h4>
                                 <p class="price_text">$<?php  echo $display['price'] ?><span style="color: #262626;"></span></p>
                                 <div  class="electronic_img"><img src="items_images/<?php echo $display['images'];?>"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="payment.php">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="details.php?id=<?php echo $display['id']?>">See More</a></div>
                                 </div>
                              </div>
                           </div>

                           <?php endforeach; ?>
                        </div>
                     </div>
                  </div>
               </div>

       <br><br><br><br>
      <?php require_once "show_now/footer.php"; ?>