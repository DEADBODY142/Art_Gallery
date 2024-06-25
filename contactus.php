<?php
session_start();
error_reporting(0);

include('admin/includes/dbconnection.php');
if (isset($_GET['submit'])) {
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];
    $message = $_GET['message'];
    $sql = "insert into tblcontact(name,phone,email,message) values ('$name','$phone','$email','$message')";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Successfully added')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            /* background-color: aqua; */
            background-image: linear-gradient(rgba(9, 0, 77, 0.65), maroon),
                url(images/mandala.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            /* background-position: center; */
            /* font-size: 14px; */
            font-family: 'Poppins', sans-serif;
        }


        /* .containers {
            /* background-image: linear-gradient(rgba(9, 0, 77, 0.65), maroon),
                url(../images/mandala.jpg); */
        /* width: 100vh; */
        /* background-repeat: no-repeat;
            background-size: cover; */
        /* margin: 50px auto; */


        .contact-box {
            background-color: #fff;
            display: flex;
            width: 80%;
            margin: auto;

        }

        .contact-left {
            flex-basis: 60%;
            padding: 40px 60px;
        }

        .contact-right {
            flex-basis: 40%;
            padding: 40px 60px;
            background-color: blue;
            color: white;
        }

        h1 {
            /* color: #ad5454; */
            color: #fff;
            margin-bottom: 10px;
        }

        .containers p {
            margin-bottom: 40px;
        }

        .input-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .input-row .input-group {
            flex-basis: 45%;
        }

        input {
            width: 100%;
            border: none;
            border-bottom: 1px solid #ccc;
            outline: none;
            padding-bottom: 5px;
        }

        textarea {
            width: 100%;
            border: 1px solid #ccc;
            outline: none;
            padding: 10px;
            box-sizing: border-box;
        }

        label {
            margin-bottom: 6px;
            display: block;
            color: #1c00b5;
        }

        button {
            background: #1c00b5;
            width: 100px;
            border: none;
            outline: none;
            color: #fff;
            cursor: pointer;
            height: 35px;
            border-radius: 30px;
            margin-top: 20px;
        }

        .contact-left h2 {
            color: #1c00b5;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .contact-right h2 {
            font-weight: 600;
            margin-bottom: 30px;
        }

        tr td:first-child {
            padding-right: 20px;
        }

        tr td {
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <?php include_once "header.php" ?>

    <div class="containers">
        <h1 style="text-align: center;color:white;">Contact Us</h1>
        <br>
        <div class="contact-box">
            <div class="contact-left">
                <h2>Send Your Message</h2>
                <form action="" method="get">
                    <div class="input-row">
                        <div class="input-group"><label for="">Name</label><input type="text" value="<?php echo $_SESSION['login_name'] ?>" name=" name" required>
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group"><label for="">Phone</label><input type="number" inputmode="numeric" placeholder="Your phone" name="phone" required>
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group"><label for="">Email</label><input type="email" value="<?php echo $_SESSION['mail'] ?>" placeholder=" Your email" name="email" required>
                        </div>
                    </div>
                    <label for="">Message</label>
                    <textarea name="message" rows="5" placeholder="Your message" style="resize: none;" required></textarea>
                    <button type="submit" name="submit">Send</button>
                </form>
            </div>
            <div class="contact-right">
                <h2>Reach Us</h2>
                <table>
                    <tr>
                        <td>Email</td>
                        <td>artworks@gmail.com</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>9845612782</td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>9:00 am to 6:00 pm</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>Lazimpat Sadak, Kathmandu 45600</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
<?php include_once "footer.php" ?>


</html>