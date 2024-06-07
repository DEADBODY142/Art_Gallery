<?php
include('includes/dbconnection.php');
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $sql = "select * from tblartproduct where id='$product_id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $product = mysqli_fetch_assoc($result);
            $invoice_no = $product['ID'] . time();
            $total = $product['SellingPricing'];
            $query = "insert into orders(product_id,invoice_no,total,status) values('$product_id','$invoice_no','$total',0)";
            if (!mysqli_query($con, $query)) {
                die("ERROR");
            }
        }
    }
}
?>