<?php
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['send'])) {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $mobilenumber = $_POST['mobnum'];
  $message = $_POST['message'];
  $enquirynumber = mt_rand(100000000, 999999999);
  $eid = $_GET['eid'];
  $query1 = mysqli_query($con, "insert into  tblenquiry(Artpdid,FullName,Email,MobileNumber,Message,EnquiryNumber) value('$eid','$fullname','$email','$mobilenumber','$message','$enquirynumber')");
  if ($query1) {
    echo '<script>alert("Your enquiry successfully send. Your Enquiry number is "+"' . $enquirynumber . '")</script>';
    echo "<script>window.location.href='index.php'</script>";
  } else {
    echo "<script>alert('Something went wrong.');</script>";
  }
}

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
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <style>
    textarea {
      resize: none;
    }

    .mutton {
      background-color: #3556b1;
    }

    /* .mutton:hover {
      background-color: #3556b8;
    } */
  </style>
</head>

<body>
  <!-- navbar starts -->
  <div class="about_container">
    <?php include_once "abheader.php" ?>
    <div id="heading">
      Enquiry
    </div>
  </div>
  <div style="background-color: #eee;">
    <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
      <!-- <div class="container py-lg-5 py-md-4 py-sm-4 py-3"> -->
      <div style="padding: 50px;">
        <div class="contact-list-grid">
          <form action="#" method="post">
            <div class=" agile-wls-contact-mid">
              <div class="form-group contact-forms">
                <input class="form-control" type="text" name="fullname" required="true" placeholder="Name" />
              </div>
              <div class="form-group contact-forms">
                <input class="form-control" type="email" name="email" required="true" placeholder="Email" />
              </div>
              <div class="form-group contact-forms">
                <input class="form-control" type="text" name="mobnum" maxlength="10" pattern="[0-9]+" placeholder="Mobile Number" required="true" />
              </div>
              <div class="form-group contact-forms">
                <textarea class="form-control" name="message" placeholder="Message" required="true" rows="4"></textarea>
              </div>
              <button type="submit" class="btn btn-block sent-butnn mutton" name="send">Send</button>
            </div>
          </form>
        </div>
      </div>
      <!--//contact-map -->
    </section>
  </div>
  <?php include "footer.php" ?>
</body>

</html>