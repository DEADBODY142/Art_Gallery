<?php
session_start();
include 'includes/dbconnection.php';

if (isset($_GET['data'])) {
    // Decode the URL-encoded data parameter
    $url_encoded_data = $_GET['data'];
    $decoded_data = urldecode($url_encoded_data);
    $order_id = $_SESSION['order_id'];

    // Decode the base64-encoded JSON
    $base64_encoded_json = base64_decode($decoded_data);
    $response_data = json_decode($base64_encoded_json, true);

    // Check if the response indicates successful payment
    if (isset($response_data['status']) && $response_data['status'] === 'COMPLETE') {
        $sql = "UPDATE orders SET status=1 WHERE invoice_no = $order_id";
        $res = mysqli_query($con, $sql);
        if ($res) {
            unset($_SESSION['order_id']);
            // echo 'Thank you for purchasing with us. Your payment has been successfully.';

        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Sucess</title>
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.min.css " rel="stylesheet">
    <style>
        .popup {
            display: none;
        }
    </style>
</head>

<body>

    <div class="popup">

        <script>
            Swal.fire({
                title: "Payment Successful!",
                icon: "success",
            }).then(function() {
                window.location = "index.php";
            });
        </script>
    </div>
</body>

</html>