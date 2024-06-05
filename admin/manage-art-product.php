<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['agmsaid'] == 0)) {
  header('location:logout.php');
} else {

  if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = mysqli_query($con, "delete from tblartproduct where tblartproduct.ID='$rid'");
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'manage-art-product.php'</script>";
  }

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title>Manage Art Product| ArtWorks</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


  </head>

  <body>
    <!-- container section start -->
    <section id="container" class="">
      <!--header start-->
      <?php include_once('includes/header.php'); ?>
      <!--header end-->

      <!--sidebar start-->
      <?php include_once('includes/sidebar.php'); ?>

      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-table"></i> Manage Art Product</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-table"></i>Manage Art Product</li>
                <li><i class="fa fa-th-list"></i>Manage Art Product</li>
              </ol>
            </div>
          </div>
          <!-- page start-->
          <div class="row">
            <div class="col-sm-12">
              <section class="panel">
                <header class="panel-heading">
                  Manage Art Product
                </header>
                <table class="table">
                  <thead>

                    <tr>
                      <th>S.NO</th>

                      <th>Reference Number</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Artist</th>
                      <th>Artist Image</th>
                      <th>Selling Price(in Rs.)</th>

                      <th>Creation Date</th>
                      <th>Action</th>
                    </tr>
                    </tr>
                  </thead>
                  <?php
                  $ret = mysqli_query($con, "select tblartist.Name,tblartist.Profilepic,tblartproduct.RefNum,tblartproduct.Title,tblartproduct.Artist,tblartproduct.Image,tblartproduct.SellingPricing,tblartproduct.CreationDate,tblartist.ID as artid,tblartproduct.ID as ID from tblartproduct join tblartist on tblartist.ID=tblartproduct.Artist");
                  $cnt = 1;
                  while ($row = mysqli_fetch_array($ret)) {

                  ?>

                    <tr>
                      <td><?php echo $cnt; ?></td>
                      <td><?php echo $row['RefNum']; ?></td>
                      <td><?php echo $row['Title']; ?></td>
                      <td><img src="images/<?php echo $row['Image']; ?>" width='100' height="100"></td>
                      <td><?php echo $row['Name']; ?></td>
                      <td><img src="images/<?php echo $row['Profilepic']; ?>" width='100' height="100"></td>
                      <td><?php echo $row['SellingPricing']; ?></td>
                      <td><?php echo $row['CreationDate']; ?></td>
                      <td><a href="edit-art-product-detail.php?editid=<?php echo $row['ID']; ?>" class="btn btn-success">Edit</a> || <a href="manage-art-product.php?delid=<?php echo $row['ID']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                  <?php
                    $cnt = $cnt + 1;
                  } ?>
                </table>
              </section>
            </div>

          </div>

          <!-- page end-->
        </section>
      </section>
      <!--main content end-->
      <?php include_once('includes/footer.php'); ?>
    </section>
    <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>


  </body>

  </html>
<?php }  ?>