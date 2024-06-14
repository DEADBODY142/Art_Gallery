<?php
include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/abstyle.css">
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.min.css " rel="stylesheet">

    <style>
        * {
            font-family: "Poppins", sans-serif;
            box-sizing: border-box;
        }

        .column {
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            margin-bottom: 20px;
        }

        img {
            max-width: 400px;
            max-height: 500px;
        }

        .list-group input {
            max-width: 100px;
            max-height: 100px;
        }

        .checkout_container {
            padding: 40px;
            padding-left: 100px;
            /* height: 200vh; */
            /* color: white; */
            font-size: 30px;
            text-align: center;
            justify-content: center;
            /* background-image: url(../images/hakku.jpg); */

            /* background-position: center;
            background-repeat: no-repeat;
            background-size: cover; */
            /* background-attachment: fixed; */
            display: flex;
            flex-direction: row;
        }

        .checkout_container h2 {
            display: flex;
            flex-direction: row;
        }

        .leftcheckcontainer {
            /* background-color: rgba(0, 0, 0, 0.4); */
            float: left;
            padding: 10px;
            border: 1px solid;
            /* width: 50%; */
            padding-left: 20px;
            margin-right: 20px;
            text-align: left;
            /* align-items: center; */
            border-color: rgba(0, 0, 0, 0.2);
        }

        .rightcheckcontainer {
            /* background-color: rgba(0, 0, 0, 0.5); */
            /* background: transparent; */
            float: left;
            text-align: left;
            /* padding: 10px; */
            /* border: 1px solid rgba(0, 0, 0, 0.5); */
            width: 50%;
            margin-right: 20px;
            padding-left: 50px;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_id = $_POST['product_id'];
        $sql = "select tblartproduct.id as ID, tblartproduct.title as Title,tblartproduct.SellingPricing as price,tblartproduct.Description as description,tblartproduct.Image as Image,tblartproduct.refnum,tblartist.name as artist,tblarttype.arttype as arttype from tblartproduct join tblarttype on tblarttype.ID=tblartproduct.ArtType  join tblartist on tblartist.ID=tblartproduct.Artist where tblartproduct.id='$product_id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $product = mysqli_fetch_assoc($result);
                $invoice_no = $product['ID'] . time();
                $total = $product['price'];
                $sql1 = "select status,product_id from orders join tblartproduct on orders.product_id=tblartproduct.id where status = '1' AND product_id=$product_id";
                $result1 = mysqli_query($con, $sql1);
                $row = mysqli_num_rows($result1);
                if (mysqli_num_rows($result1) != 0) {
                    echo '<script src="script.js"></script>';
                } else {
                    $query = "insert into orders(product_id,invoice_no,total,status) values('$product_id','$invoice_no','$total',0)";

                    if (!mysqli_query($con, $query)) {
                        die("ERROR");
                    }
                }
            }
        }
    }
    ?>
    <div class="about_container">
        <?php include_once "abheader.php" ?>
        <div id="heading">
            Checkout
        </div>
    </div>
    <div>
        <div class="checkout_container">
            <div>
                <span style="margin-bottom: 100px;">Product Details</span>
                <div class="card" style="width: 18rem;">
                    <img src="admin/images/<?php echo $product['Image']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="line-height: 1.6;"><span style="font-weight:bold">Title: </span><span style="color: rosybrown;"><?php echo $product['Title']; ?></span><br>
                            <span style="font-weight:bold">Artist: </span><span style="color: rosybrown;"><?php echo $product['artist']; ?></span><br>
                            <span style="font-weight:bold">Art Type: </span><span style="color: rosybrown;"><?php echo $product['arttype']; ?></span><br>
                            <span style="font-weight:bold">Price: Rs. </span><span style="color: rosybrown;"><?php echo $product['price']; ?></span><br>
                            <span style="font-weight:bold">Description: </span><span style="color: rosybrown;"><?php echo $product['description']; ?></span><br>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="rightcheckcontainer">
                Pay With:
                <div class="list-group list-group-flush">
                    <form action="https://uat.esewa.com.np/epay/main" method="GET">
                        <input value=<?php echo $product['price'] ?> name="tAmt" type="hidden">
                        <input value=<?php echo $product['price'] ?> name="amt" type="hidden">
                        <input value=<?php echo $product['ID'] ?> name="product_id" type="hidden">
                        <input value="0" name="txAmt" type="hidden">
                        <input value="0" name="psc" type="hidden">
                        <input value="0" name="pdc" type="hidden">
                        <input value="epay_payment" name="scd" type="hidden">
                        <input value="<?php echo $invoice_no ?>" name="pid" type="hidden">
                        <input value="https://localhost/artgallery/success.php" type="hidden" name="su">
                        <input value="https://google.com" type="hidden" name="fu">
                        <a class="list-group-item list-group-item-action"><input type="image" src="images/esewaa.png" alt="esewa"></a>
                    </form>

                    <a href="" class="list-group-item list-group-item-action"><input type="image" src="images/khalti.png" alt="Khalti"></a>
                    <a href="#" class="list-group-item list-group-item-action"><input type="image" src="images/fonepay.png" alt="Fonepay"></a>
                    <a href="#" class="list-group-item list-group-item-action"><input type="image" src="images/connectips.png" alt="Connectips"></a>
                </div>
            </div>
        </div>
        <?php include_once "footer.php" ?>

</body>

</html>