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
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/abstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .imgmil {
            max-width: 360px;
            min-width: 350px;
            max-height: 400px;
            min-height: 350px;
            margin: 30px;
            margin-left: 12px;
        }
    </style>
</head>

<body>
    <!-- navbar starts -->
    <div class="about_container">
        <?php include_once "abheader.php" ?>
        <div id="heading">
            Our Gallery
        </div>
    </div>
    <div class="contentaboutus" style="padding:100px">
        <div style="margin-left: 40px;margin-right: 20px;">
            <?php
            $ret = mysqli_query($con, "select * from tblartproduct");
            //  $cnt=1;
            $count = mysqli_num_rows($ret);
            if ($count > 0) {
                while ($row = mysqli_fetch_array($ret)) {
            ?>
                    <span><a href="single-product.php?pid=<?php echo $row['ID']; ?>" style="color:#000"><img src="admin/images/<?php echo $row['Image']; ?>" class="imgmil" alt=""></a></span>
                <?php }
            } else { ?>
                <h3 align="center" style="color:red;">No Record Found</h3>
            <?php } ?>

        </div>
    </div>
    <?php include_once "footer.php" ?>

</body>

</html>