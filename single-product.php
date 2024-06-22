<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['checkout'])) {
    if (!isset($_SESSION['login_name'])) {

        echo "<script>alert('Please Login');</script>";
    } else {
        echo "<script type='text/javascript'> document.location ='checkout.php'; </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/abstyle.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <link href="../css/style.css" rel='stylesheet' type='text/css' media="all"> -->
    <style>
        .spenq {
            margin-top: 100px;
            background-color: green;
        }

        .spenq a {
            color: white;
            text-decoration: none;
        }

        .spenq a:hover {
            color: gainsboro;
        }
    </style>

</head>

<body>
    <div class="about_container">
        <?php include_once "abheader.php" ?>
        <div id="heading">
            Product Info
        </div>
    </div>
    <section class="banner-bottom py-lg-5 py-3" style="padding: 50px;">
        <div style="border: 1px solid rgba(0,0,0,0.2);padding:30px">
            <div class="inner-sec-shop pt-lg-4 pt-3">
                <?php
                $pid = $_GET['pid'];
                $ret = mysqli_query($con, "select tblarttype.ID as atid,tblarttype.ArtType as typename,tblartmedium.ID as amid,tblartmedium.ArtMedium as amname,tblartproduct.ID as apid,tblartist.Name,tblartproduct.Title,tblartproduct.Dimension,tblartproduct.Orientation,tblartproduct.Size,tblartproduct.Artist,tblartproduct.ArtType,tblartproduct.ArtMedium,tblartproduct.SellingPricing,tblartproduct.Description,tblartproduct.Image,tblartproduct.Image1,tblartproduct.Image2,tblartproduct.Image3,tblartproduct.Image4,tblartproduct.RefNum,tblartproduct.ArtType from tblartproduct join tblarttype on tblarttype.ID=tblartproduct.ArtType join tblartmedium on tblartmedium.ID=tblartproduct.ArtMedium join tblartist on tblartist.ID=tblartproduct.Artist where tblartproduct.ID='$pid'");
                $ret2 = mysqli_query($con, "select status from orders where product_id=$pid && status=1");

                $order_status = mysqli_fetch_array($ret2);
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                    // echo ("select status from orders where product_id=$pid where status=1");

                ?>
                    <div class="row">
                        <div class="col-lg-4 single-right-left ">
                            <div class="grid images_3_of_2">
                                <div class="flexslider1">
                                    <span style="height: 20%;width: 20%"><img src="admin/images/<?php echo $row['Image']; ?>" data-imagezoom="true" class="img-fluid" alt=" ">
                                    </span>

                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 single-right-left simpleCart_shelfItem">
                            <h3 style="color:royalblue"><?php echo $row['Title']; ?>(by <?php echo $row['Name']; ?>)</h3>

                            </p>


                            <div class="color-quality">
                                <div class="color-quality-right">
                                    <h5>Dimension : <?php echo $row['Dimension']; ?></h5>
                                    <h5>Orientation : <?php echo $row['Orientation']; ?></h5>

                                </div>
                            </div>
                            <div class="occasional">
                                <h5>Art Type : <?php echo $row['typename']; ?></h5>

                                <h5>Art Medium : <?php echo $row['amname']; ?></h5>
                                <h5>Art Reference Number : <?php echo $row['RefNum']; ?></h5>
                                <h5>Price : Rs. <?php echo $row['SellingPricing']; ?></h5>

                                <!-- <div class="clearfix"> </div> -->
                            </div>

                            <div class="occasion-cart" style="margin-top:20px">
                                <div>

                                    <!-- <span class="spenq" style="border: 1px solid black;padding:6px;border-radius:12px; "><a href="art-enquiry.php?eid=<?php echo $row['apid']; ?>">Enquiry</a></span></button> -->
                                    <form method="post">
                                        <input type="hidden" name="product_id" value="<?php
                                                                                        $_SESSION['prd_id'] = $row['apid'];
                                                                                        echo $row['apid']; ?>" />
                                        <?php if ($order_status > 0) { ?>
                                            <input type="submit" value="Purchase" class="btn btn-danger" id="purchaseBtn">
                                        <?php } else { ?>
                                            <input type="submit" value="Buy Now" name='checkout' class="btn btn-success">
                                        <?php } ?>

                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"> </div>
                        <!--/tabs-->
                        <div class="responsive_tabs" style="margin-top: 30px; padding-left: 20px;border: 1px solid black;padding-right:12px;">
                            <div id="horizontalTab">
                                <h4 style="padding-top: 20px;">Description</h4>
                                <hr style="background-color:#eee">
                                <div class="resp-tabs-container">
                                    <!--/tab_one-->
                                    <div class="tab1">
                                        <div class="single_page">
                                            <h5 style="color:royalblue"><?php echo $row['Title']; ?></h5>
                                            <p><?php echo $row['Description']; ?>
                                            </p>

                                        </div>
                                    </div>
                                    <!--//tab_one-->


                                </div>
                            </div>
                        </div>
                        <!--//tabs-->
                    </div>
            </div><?php } ?>
        </div>
    </section>
    <?php include "footer.php" ?>
    <script>
        // Select the purchase button
        const purchaseBtn = document.getElementById('purchaseBtn');

        // Add click event listener
        purchaseBtn.addEventListener('click', function() {
            // Display SweetAlert
            Swal.fire({
                title: "Sorry! The product has already been purchased",
                icon: "error",
            });
        });
    </script>
</body>


</html>