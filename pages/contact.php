

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--// Meta tag Keywords -->
        <!-- css files -->
        <link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
        <link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
        <link rel="stylesheet" href="css/swipebox.css">
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <!-- //css files -->
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="icon" type="image/png" sizes="64x64" href="Images/logo.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

    <nav id="navigation" class="navbar navbar-expand-lg navbar-dark" style="background-color: #5239aa; ">
        <div class="container-fluid">
            <img src="Images/logo.png" alt="" id="logo">
            <a class="navbar-brand" href="#" id="brand">IMS CS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost/IMS/" id>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/IMS/pages/contact.php" id="contact">Contact Us</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="http://localhost/IMS/pages/about.html" id="about">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" href="http://localhost/IMS/login/" id="signin">
                            Sign In
                        </a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" id="search-btn">Search</button>
                </form>
            </div>
        </div>
    </nav>





<div class="container" style="padding-top: 150px;">


<?php
require_once('../Itservice/connect.php');
session_start();
extract($_POST);
if (isset($submit)) {
    //check user alereay exists or not


        $query = "insert into contactus values('$name','$email','$message'";
        $data = mysqli_query($conn, $query);



        if ($data) {
            $msg = "<font color='green' size='20'>Sent successfully...!!</font>";
       echo $msg;
        }
    }

?>
    <h2>Contact us </h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Message:</label>
            <textarea class="form-control" name="message" required></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit" name="submit">Send</button>
        </div>
    </form>
</div>



<br><br>
<hr>
<br><br>

<h1 style="text-align: center;">VISIT AUST</h1>
<br>
<!--Google Maps-->
<div class="mapouter">
    <div class="gmap_canvas"><iframe width="100%" height="395" frameborder="0" scrolling="no" marginheight="0"
            marginwidth="0"
            src="https://maps.google.com/maps?width=1100&amp;height=395&amp;hl=en&amp;q=Abbottabad University of Science and Technology&amp;t=p&amp;z=10&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
            href="https://embedgooglemap.xyz/">embed google map</a></div>
    <style>
        .mapouter {
            position: relative;
            text-align: right;
            width: 100%;
            height: 395px;
        }

        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            width: 100%;
            height: 400px;
        }
    </style>
</div>




<!-- The content of your page would go here. -->





<footer class="footer-distributed">

    <div class="footer-left">

        <h3><img src="Images/logo.png" alt="" style="width: 50px; height: 50px;"></h3>

        <p class="footer-links">
            <a href="http://localhost/IMS/">Home</a>
            ??
            <a href="http://localhost/IMS/">Blog</a>
            ??
            <a href="http://localhost/IMS/pages/about.html">About</a>
            ??
            <a href="http://localhost/IMS/pages/contact.php">Contact</a>
        </p>
        <p class="footer-company-name">Copyright &copy; 2020</p>
    </div>

    <div class="footer-center">

        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>Capt Akash Rabani Shaheed Road </span> Havelian, KPK</p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>+92 555 123456</p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p>imscs@aust.edu.pk</p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>About AUST</span>
            Abbottabad (abt-ah-baad) is the headquarters and biggest town of Hazara division in the
            province of Khyber
            Pakhtunkhwa.
        </p>

        <div class="footer-icons">

            <a href="https://web.facebook.com/aust.edu.pk/?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a>
            <a href="https://web.facebook.com/aust.edu.pk/?_rdc=1&_rdr"><i class="fa fa-twitter"></i></a>
            <a href="https://web.facebook.com/aust.edu.pk/?_rdc=1&_rdr"><i class="fa fa-linkedin"></i></a>
            <a href="https://web.facebook.com/aust.edu.pk/?_rdc=1&_rdr"><i class="fa fa-instagram"></i></a>

        </div>

    </div>

</footer>

<!-- gallery popup -->
<script src="js/jquery.swipebox.min.js"></script> 

</script>
<!-- //gallery popup -->

<!-- js-scripts -->			
<!-- js-files -->
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<!-- //js-files -->
<!-- Baneer-js -->
</body>
</html>