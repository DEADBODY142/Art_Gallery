<?php
include('includes/dbconnection.php');
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $sql = "select tblartproduct.id as ID, tblartproduct.title as Title,tblartproduct.SellingPricing as price,tblartproduct.Description,tblartproduct.Image as Image,tblartproduct.refnum,tblartist.name as artist,tblarttype.arttype as arttype from tblartproduct join tblarttype on tblarttype.ID=tblartproduct.ArtType  join tblartist on tblartist.ID=tblartproduct.Artist where tblartproduct.id='$product_id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $product = mysqli_fetch_assoc($result);
            $invoice_no = $product['ID'] . time();
            $total = $product['price'];
            $query = "insert into orders(product_id,invoice_no,total,status) values('$product_id','$invoice_no','$total',0)";
            if (!mysqli_query($con, $query)) {
                die("ERROR");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row" style="padding-left: 300px;">
            <div class="col-md-5 column">
                <h2>Product Details</h2><br>
                <img src="admin/images/<?php echo $product['Image']; ?>">
                <br><br>
                <div>
                    <h5 style="line-height: 1.6;">Title: <?php echo $product['Title']; ?><br>
                        Artist: <?php echo $product['artist']; ?><br>
                        Art Type: <?php echo $product['arttype']; ?><br>
                        Price: <?php echo $product['price']; ?><br></h5>
                </div>
            </div>
            <div class="col-md-5 column">
                <h2>Pay With:</h2>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <input type="image" src="images/esewa.png" alt="esewa">
                    </a>
                    <a href="" class="list-group-item list-group-item-action"><input type="image" src="images/khalti.png" alt="Khalti"></a>
                    <a href="#" class="list-group-item list-group-item-action"><input type="image" src="images/fonepay.png" alt="Fonepay"></a>
                    <a href="#" class="list-group-item list-group-item-action"><input type="image" src="images/connectips.png" alt="Connectips"></a>

                </div>
            </div>
        </div>
    </div>
</body>

</html>