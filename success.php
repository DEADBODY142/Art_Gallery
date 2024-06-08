<?php
include 'includes/dbconnection.php';

if (isset($_GET['oid']) && isset($_GET['amt']) && $_GET['refId']) {
    $sql = "SELECT * FROM orders WHERE invoice_no = '" . $_REQUEST['oid'] . "'";
    echo $sql;
    $result = mysqli_query($con, $sql);
    if ($result) {
        if (mysqli_num_rows($result)) {
            $order = mysqli_fetch_assoc($result);
            $url = "https://uat.esewa.com.np/epay/transrec";

            $data = [
                'amt' => $order['total'],
                'rid' =>  $_GET['refId'],
                'pid' =>  $order['invoice_no'],
                'scd' => 'epay_payment'
            ];

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            if (strpos($response, "Success") !== false) {
                $sql = "UPDATE orders SET status=1 WHERE id='" . $order['id'] . "'";
                mysqli_query($con, $sql);
                // echo 'Thank you for purchasing with us. Your payment has been successfully.';
                header('Location: success_msg.php');
            }
        }
    }
}
