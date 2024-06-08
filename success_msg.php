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