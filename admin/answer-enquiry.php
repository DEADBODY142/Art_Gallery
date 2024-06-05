<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['agmsaid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = mysqli_query($con, "delete from tblenquiry where ID='$rid'");
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'answer-enquiry.php'</script>";
  }


?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Answer Enquiry | ArtWorks</title>

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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/fullcalendar.css">
    <link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/xcharts.min.css" rel=" stylesheet">
    <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
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
              <h3 class="page-header"><i class="fa fa-table"></i> Answer Enquiry</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-table"></i>Enquiry</li>
                <li><i class="fa fa-th-list"></i>Answer Enquiry</li>
              </ol>
            </div>
          </div>
          <!-- page start-->
          <div class="row">
            <div class="col-sm-12">
              <section class="panel">
                <header class="panel-heading">
                  Answer Enquiry
                </header>
                <table class="table">
                  <thead>
                    <tr>
                    <tr>
                      <th>S.NO</th>


                      <th>Enquiry Number</th>
                      <th>Full Name</th>
                      <th>Mobile Number</th>
                      <th>Enquiry Date</th>

                      <th>Action</th>
                    </tr>
                    </tr>
                  </thead>
                  <?php
                  $ret = mysqli_query($con, "select *from  tblenquiry where Status='Answer'");
                  $cnt = 1;
                  while ($row = mysqli_fetch_array($ret)) {

                  ?>

                    <tr>
                      <td><?php echo $cnt; ?></td>


                      <td><?php echo $row['EnquiryNumber']; ?></td>
                      <td><?php echo $row['FullName']; ?></td>
                      <td><?php echo $row['MobileNumber']; ?></td>
                      <td><?php echo $row['EnquiryDate']; ?></td>

                      <td><a href="view-enquiry-detail.php?viewid=<?php echo $row['ID']; ?>" class="btn btn-success">View Details</a>|| <a href="answer-enquiry.php?delid=<?php echo $row['ID']; ?>" class="btn btn-danger">Delete</a></td>
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