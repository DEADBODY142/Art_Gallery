   <?php
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    ?>
   <header class="header dark-bg">
     <div class="toggle-nav">
       <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom">
         <!-- <i class="icon_menu"></i> -->
       </div>
     </div>
     <?php
      $adid = $_SESSION['agmsaid'];
      $ret = mysqli_query($con, "select AdminName from tbladmin where ID='$adid'");
      $row = mysqli_fetch_array($ret);
      $name = $row['AdminName'];

      ?>
     <!--logo start-->
     <a href="dashboard.php" class="logo"><span style="color: royalblue;"><strong> Art<span style="color:dodgerblue">Works</span></strong></span></a>
     <!--logo end-->



     <div class="top-nav notification-row">
       <!-- notificatoin dropdown start-->
       <ul class="nav pull-right top-menu">



         <!-- alert notification start-->
         <!-- alert notification end-->
         <!-- user login dropdown start-->
         <li class="dropdown">
           <a data-toggle="dropdown" class="dropdown-toggle" href="#">
             <span class="profile-ava">
               <!-- <img alt="" src="images/av1.jpg" width="40" height="40"> -->
               <!-- <i class="fa-solid fa-user"></i> -->
               <i class="fa-solid fa-user" style="color: #74C0FC;"></i>
             </span>

             <span class="username"><?php echo $name; ?></span>
             <b class="caret"></b>
           </a>
           <ul class="dropdown-menu extended logout">
             <div class="log-arrow-up"></div>
             <!-- <li class="eborder-top">
               <a href="admin-profile.php"><i class="icon_profile"></i> My Profile</a>
             </li> -->
             <li>
               <a href="change-password.php"><i class="fa-solid fa-key"></i> Change Password</a>
             </li>

             <li>
               <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Log Out</a>
             </li>

           </ul>
         </li>
         <!-- user login dropdown end -->
       </ul>
       <!-- notificatoin dropdown end-->
     </div>
   </header>