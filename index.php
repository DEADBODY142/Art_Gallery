<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gal {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gal button {
            background-color: royalblue;
            border: 0;
            padding: 10px;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .gal button:hover {
            background-color: #265391;
        }

        .pad_left {
            padding-left: 150px;
        }


        .pad_left img {
            height: 360px;
            width: 360px;
            margin: 20px;
        }
    </style>
</head>

<body>
    <?php include_once "header.php"; ?>
    <div class="content">
        <h1>Elevate Your Senses
            <br>at Art<span style="color: blue;">Works</span><br>Where art speaks
        </h1>
        <p>Dive into a world where every stroke tells a story – Art<span style="color: blue;">Works</span>, where
            art speaks louder than words.</p>
    </div>
    </div>
    <div class="about-us">
        <h1>About Us</h1><br>
        Welcome to ArtWorks, where art comes to life and creativity knows no bounds. Our gallery is a celebration of
        artistic expression, showcasing a diverse collection of works that span various styles, mediums, and
        perspectives. Here, we invite you to embark on a visual journey that transcends boundaries and sparks the
        <span style="color:#867f7f">imagin<span style="color:#bcb4b4">ation</span></span><br>
        <span id="text-deco"><a href="aboutus.php">Continue Reading <i class="fa-solid fa-hand-point-right"></i></a></span>
    </div>
    <div class="gallery">
        <div class="gal_head">
            <h2>Our Gallery</h2>
        </div>
    </div>
    </div>
    <div class="items">
        <div class="pad_left">
            <img src="images/zeus.jpg" alt=""><img src="images/andy.jpeg" alt=""><img src="images/serigraphy.jpg" alt=""><img src="images/streetart.jpg" alt="" height="320px"><img src="images/maha.jpg" alt="" height="320px">
            <img src="images/village.jpg" alt="">
        </div>
        <div class="gal">
            <a href="gallery.php"><button>View more</button></a>
        </div>
    </div>
    <div style="height:15px;background-color:beige"></div>
    <div class="slogan">
        <div class=" left_slogan">
            "Artworks in Nepal is a hidden gem! The variety and quality of art pieces are exceptional. The staff is friendly
            and knowledgeable. Thank you for providing such a wonderful experience!"
            <br>-Samantha
        </div>
        <div class="middle_slogan">
            "Artworks Gallery provided a captivating and immersive experience, showcasing a diverse range of thought-provoking pieces that left me inspired and enriched, making it a must-visit for any art enthusiast."
            <br>-Bishnu
        </div>
        <div class="right_slogan">
            "Artworks Gallery is a captivating sanctuary of creativity, where every brushstroke and sculpture tells a unique story, weaving a mesmerizing tapestry of artistic expression that left me awe-inspired and deeply moved."
            <br>-Raizen
        </div>
    </div>
    <?php include_once "footer.php"; ?>
</body>

</html>