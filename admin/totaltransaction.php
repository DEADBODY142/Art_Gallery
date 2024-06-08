<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['agmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_GET['delid'])) {
        $rid = intval($_GET['delid']);
        $sql = mysqli_query($con, "delete from orders where ID='$rid'");
        echo "<script>alert('Data deleted');</script>";
        echo "<script>window.location.href = 'totaltransaction.php'</script>";
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Transaction | ArtWorks</title>

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
                            <h3 class="page-header"><i class="fa fa-table"></i> Total Transaction</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                                <li><i class="fa fa-table"></i>Total Transaction</li>
                            </ol>
                        </div>
                    </div>
                    <!-- page start-->
                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Transaction
                                </header>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th>Id</th>
                                            <th>Purchase Id</th>
                                            <th>Product Id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Artist</th>
                                            <th>Price(in Rs.)</th>
                                            <th>Action</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <?php
                                    $ret = mysqli_query($con, "select orders.invoice_no as invoice_no,orders.product_id as pid,orders.total as total,orders.status as status,tblartproduct.Title as Title,tblartproduct.Image as Image,tblartist.Name as Name from tblartproduct join orders on tblartproduct.ID=orders.product_id join tblartist on tblartproduct.Artist=tblartist.ID where status=1 ");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {

                                    ?>

                                        <tr>
                                            <td><?php echo $cnt; ?></td>


                                            <td><?php echo $row['invoice_no']; ?></td>
                                            <td><?php echo $row['pid']; ?></td>
                                            <td><img src="images/<?php echo $row['Image']; ?>" width='100' height="100"></td>
                                            <td><?php echo $row['Title']; ?></td>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><?php echo $row['total']; ?></td>

                                            <td><a href="totaltransaction.php?delid=<?php echo $row['id']; ?>" class="btn btn-danger"><? echo $row['id']; ?>Delete</a>

                                            </td>
                                        </tr>
                                    <?php
                                        $cnt = $cnt + 1;
                                    } ?>
                                </table>
                                <!-- <button value="" id="myBtn">Redirect</button> -->

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