<nav>
    <img src="" alt="" class="logo">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <!-- <li><a href="">Art Type</a></li> -->
        <li>
            <?php
            $ret = mysqli_query($con, "select * from tblarttype");
            $row = mysqli_fetch_array($ret);
            ?>
            <!-- <a href="product.php?cid=1" <?php echo $row['ArtType']; ?>>Art Type</a> -->
            <a href="product.php?cid=<?php echo $row['ID']; ?>&&artname=<?php echo $row['ArtType']; ?>">Art Type</a>
        </li>
        <li><a href="contactus.php">Contact Us</a></li>
    </ul>
    <!-- <button class="btn">Bookings</button> -->
</nav>