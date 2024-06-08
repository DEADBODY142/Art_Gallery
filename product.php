<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/abstyle.css">
   <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- <link href="../css/style.css" rel='stylesheet' type='text/css' media="all"> -->
   <style>

   </style>

</head>

<body>
   <div class="about_container">
      <?php include_once "abheader.php" ?>
      <div id="heading">
         Products
      </div>
   </div>
   <section class="contact py-lg-4">
      <div class="container-fluid py-lg-5">
         <h3 class="title text-center mb-lg-5">
            <h2 class="head" align="center"><?php echo $_GET['artname']; ?></h2>
            <hr />
            <div class="row">
               <div class="side-bar col-lg-3" style="border: 1px solid #dedad9; ">
                  <div class="search-hotel" style="padding:10px;">
                     <h4 class="agileits-sear-head">Search Here..</h4>
                     <form action="search.php" method="post">
                        <input type="search" placeholder="Art name..." name="search" required style="border:0;background-color: rgba(0,0,0,0.2);padding:3px;padding-left: 1px;">
                        <!-- <input type="submit" name="submit"  style="padding-left: -12px;  "> -->
                        <button type="submit"><i class="fa fa-search" style="color:white; padding: 5px; cursor:pointer; background-color:black;"></i></button>

                     </form>
                  </div>
                  <!-- price range -->

                  <!-- //price range -->
                  <!--preference -->
                  <hr>
                  <div class="left-side">
                     <h4 class="agileits-sear-head">Art Type</h4>
                     <ul>
                        <li>
                           <?php
                           $ret = mysqli_query($con, "select * from tblarttype");
                           $cnt = 1;
                           while ($row = mysqli_fetch_array($ret)) {

                           ?>
                              <a class="nav-link" href="product.php?cid=<?php echo $row['ID']; ?>&&artname=<?php echo $row['ArtType']; ?>"><span class="span" style="color:black"><?php echo $row['ArtType']; ?></span></a> <?php } ?>
                        </li>

                     </ul>
                  </div>
                  <!-- // preference -->


               </div>
               <div class="left-ads-display col-lg-9">
                  <div class="row" style="margin-left: 2px;">
                     <?php
                     $cid = $_GET['cid'];
                     $ret = mysqli_query($con, "select tblarttype.ID as atid,tblarttype.ArtType as typename,tblartproduct.ID as apid,tblartproduct.Title,tblartproduct.Image,tblartproduct.ArtType from tblartproduct join tblarttype on tblarttype.ID=tblartproduct.ArtType where tblartproduct.ArtType='$cid'");
                     $cnt = 1;
                     $count = mysqli_num_rows($ret);
                     if ($count > 0) {
                        while ($row = mysqli_fetch_array($ret)) {

                     ?>
                           <div class="col-lg-4 col-md-6 col-sm-6 product-men women_two">
                              <div class="product-toys-info">
                                 <div class="men-pro-item">
                                    <div class="men-thumb-item">
                                       <span style="max-width: 300px; min-width:300px; max-height:300px; min-height: 300px"><a href="single-product.php?pid=<?php echo $row['apid']; ?>" style="color:#000"><img src="admin/images/<?php echo $row['Image']; ?>" class="img-thumbnail" alt=""></a></span>
                                       <div class="men-cart-pro">
                                          <div class="inner-men-cart-pro">
                                             <!-- <a href="single-product.php?pid=<?php echo $row['apid']; ?>" class="link-product-add-cart"> View Details</a> -->
                                          </div>
                                       </div>
                                       <!-- <span class="product-new-top">New</span> -->
                                    </div>
                                    <div class="item-info-product">
                                       <div class="info-product-price">
                                          <div class="grid_meta">
                                             <div class="product_price">
                                                <h4>
                                                   <a href="single-product.php?pid=<?php echo $row['apid']; ?>" style="color:#000"><?php echo $row['Title']; ?></a>
                                                </h4>
                                                <form action="checkout.php" method="post">
                                                   <input type="hidden" name="product_id" value="<?php echo $row['apid']; ?>" />
                                                   <input type="submit" name="submit" value="Buy Now" class="btn btn-success">
                                                </form>
                                             </div>

                                          </div>

                                       </div>
                                       <div class="clearfix"></div>
                                    </div>
                                 </div>
                              </div>
                           </div><?php }
                           } else { ?>
                        <h3 align="center" style="color:red;">No Record Found</h3>
                     <?php } ?>


                  </div>
               </div>
            </div>
      </div>
   </section>
   <?php include_once "footer.php" ?>
</body>