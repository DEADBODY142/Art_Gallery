<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['user_login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "select * from users where email='$email' && password='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['login_name'] = $ret['name'];
        // echo (" document.getElementById('profile').innerText=" . $_SESSION['login_name']);
        // echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}

if (isset($_POST['register_user'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "select * from users where email='$email' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        echo "<script>alert('Account Exist!!');</script>";
    } else {
        $query = mysqli_query($con, "insert into users(name,email,password) value('$name','$email','$password')");
        if ($query) {
            echo "<script>alert('Account created Sucessfully, Please proceed to Login');</script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        }
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="containers">
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <!-- <li><a href="product.php">Art Type</a></li> -->
            <li>
                <?php
                $ret = mysqli_query($con, "select * from tblarttype");
                $row = mysqli_fetch_array($ret);
                ?>
                <!-- <a href="product.php?cid=1" <?php echo $row['ArtType']; ?>>Art Type</a> -->
                <a href="product.php?cid=<?php echo $row['ID']; ?>&&artname=<?php echo $row['ArtType']; ?>">Art Type</a>
            </li>
            <li><a href="contactus.php">Contact Us</a></li>
            <!-- Button trigger modal -->
            <li id='profile'>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span><i class="fa-solid fa-user"></i></span>
                </button>
            </li>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modalBody">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary" name="user_login">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">

                            <button id="changeContentButton" type="button" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </div>
        </ul>
    </nav>
    <script>
        document.getElementById('changeContentButton').addEventListener('click', function() {
            const changeContentButton = document.getElementById('changeContentButton').innerText;
            console.log(changeContentButton);
            if (changeContentButton == 'Register') {
                document.getElementById('modalBody').innerHTML = `
          <form method="post">
          <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="exampleInputName" name='username'>
                                </div>
           
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary" name="register_user">Submit</button>
                            </form>
    `;

                document.getElementById('changeContentButton').innerHTML = 'Login';
            } else {

                document.getElementById('modalBody').innerHTML = `
          <form method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary" name="user_login">Submit</button>
                            </form>
    `;

                document.getElementById('changeContentButton').innerHTML = 'Register';
            }

        });
        <?php if (isset($_SESSION['login_name'])) { ?>
            document.getElementById('profile').innerHTML = `<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <?php echo ($_SESSION['login_name']); ?>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" id='logout' href='logout.php'>Logout</a></li>
    
  </ul>
</div>`;
        <?php
        } ?>
        document.getElementById('logout').addEventListener('click', function() {
            document.getElementById('profile').innerHTML = `<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span><i class="fa-solid fa-user"></i></span>
                </button>`
        });
    </script>