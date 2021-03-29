<?php
require_once('../connection.php');
session_start();
extract($_POST);

if (isset($Register)) {
    //check user alereay exists or not
    $sql = mysqli_query($con, "select * from registration where usn = '$USN'");
    $r = mysqli_num_rows($sql);
    if ($r == true) {
        $err = "<font color='red'>USN Already Exists..!</font>";
    } else {
        //image
        $image1 = $_FILES['img']['name'];
        //encrypt your password
        $pass = md5($psswd);
        $query = "insert into registration values('','$fname','$lname','$dob','$USN','$mail','','$cnic','$cardno','$gen','$phone','$image1','$pass','$cat', '','', '$ques', '$ans', 'Teacher')";
        $data = mysqli_query($con, $query);

        $query = "insert into teacher values('$cardno','$fname','$lname','$USN','$mail','$cnic','$pass','$phone','$cat')";
        $result=mysqli_query($con,$query);
        //upload image

        mkdir("../dbimages/$USN");
        move_uploaded_file($_FILES['img']['tmp_name'], "../dbimages/$USN/" . $_FILES['img']['name']);

        if ($data) {
            $err = "<font color='green'>Registered successfully...!!</font>";
        }
    }
}
?>
<!-- register.php -->
<!-- REGISTRATION FORM -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

   <!--Custom styles-->
   <link rel="stylesheet" type="text/css" href="../../css/reg_styles.css">
    <!--Custom Favicon.-->
    <link rel="icon" type="image/png" sizes="64x64" href="../../Images/logo.png">
    <style type="text/css">
        .back-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            display: none;
            outline: none;
        }

        .mh3:hover {
            border: 2px solid black;
            padding: 5px;
            border-radius: 5px;
            color: white;
            background-color: black;
        }

        .mnav ul li a:hover {
            color: whitesmoke;
            padding: 2px;
            border: 5px solid black;
            border-radius: 5px;
            background-color: black;
        }


        
        
      /* Footer*/

  .footer-distributed{
    background-color: #5239aa;;
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
    box-sizing: border-box;
    width: 100%;
    text-align: left;
    font: bold 16px sans-serif;
  
    padding: 55px 50px;
   
  }
  
  .footer-distributed .footer-left,
  .footer-distributed .footer-center,
  .footer-distributed .footer-right{
    display: inline-block;
    vertical-align: top;
  }
  
  /* Footer left */
  
  .footer-distributed .footer-left{
    width: 40%;
  }
  
  /* The company logo */
  
  .footer-distributed h3{
    color:  #ffffff;
    font: normal 36px 'Cookie', cursive;
    margin: 0;
  }
  
  .footer-distributed h3 span{
    color:  #5383d3;
  }
  
  /* Footer links */
  
  .footer-distributed .footer-links{
    color:  #ffffff;
    margin: 20px 0 12px;
    padding: 0;
  }
  
  .footer-distributed .footer-links a{
    display:inline-block;
    line-height: 1.8;
    text-decoration: none;
    color:  inherit;
  }
  
  .footer-distributed .footer-company-name{
    color:  #8f9296;
    font-size: 14px;
    font-weight: normal;
    margin: 0;
  }
  
  /* Footer Center */
  
  .footer-distributed .footer-center{
    width: 35%;
  }
  
  .footer-distributed .footer-center i{
    background-color:  #33383b;
    color: #ffffff;
    font-size: 25px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    text-align: center;
    line-height: 42px;
    margin: 10px 15px;
    vertical-align: middle;
  }
  
  .footer-distributed .footer-center i.fa-envelope{
    font-size: 17px;
    line-height: 38px;
  }
  
  .footer-distributed .footer-center p{
    display: inline-block;
    color: #ffffff;
    vertical-align: middle;
    margin:0;
  }
  
  .footer-distributed .footer-center p span{
    display:block;
    font-weight: normal;
    font-size:14px;
    line-height:2;
  }
  
  .footer-distributed .footer-center p a{
    color:  #5383d3;
    text-decoration: none;;
  }
  
  
  /* Footer Right */
  
  .footer-distributed .footer-right{
    width: 20%;
  }
  
  .footer-distributed .footer-company-about{
    line-height: 20px;
    color:  #92999f;
    font-size: 13px;
    font-weight: normal;
    margin: 0;
  }
  
  .footer-distributed .footer-company-about span{
    display: block;
    color:  #ffffff;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 20px;
  }
  
  .footer-distributed .footer-icons{
    margin-top: 25px;
  }
  
  .footer-distributed .footer-icons a{
    display: inline-block;
    width: 35px;
    height: 35px;
    cursor: pointer;
    background-color:  #33383b;
    border-radius: 2px;
  
    font-size: 20px;
    color: #ffffff;
    text-align: center;
    line-height: 35px;
  
    margin-right: 3px;
    margin-bottom: 5px;
  }
  
  /* If you don't want the footer to be responsive, remove these media queries */
  
  @media (max-width: 880px) {
  
    .footer-distributed{
      font: bold 14px sans-serif;
    }
  
    .footer-distributed .footer-left,
    .footer-distributed .footer-center,
    .footer-distributed .footer-right{
      display: block;
      width: 100%;
      margin-bottom: 40px;
      text-align: center;
    }
  
    .footer-distributed .footer-center i{
      margin-left: 0;
    }
  
  }

*td{
float:left;
}

  /*End of  footer*/
    </style>

    <script type="text/javascript">
        window.onload = function() {
            document.getElementById("phone").onchange = passwdlen;
            document.getElementById("pass1").onchange = passwdlen2;
        }

        function passwdlen() {
            var num = document.getElementById("phone").value;
            if (num.length < 10)
                document.getElementById("phone").setCustomValidity("phone length shuld be = 10");
            else
                document.getElementById("phone").setCustomValidity('');
            //empty string means no validation error
        }

        function passwdlen2() {
            var pass = document.getElementById("pass1").value;
            if (pass.length < 8)
                document.getElementById("pass1").setCustomValidity("passwd length shuld be > 8");
            else
                document.getElementById("pass1").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <title>Teacher Registration</title>
</head>

<body>
  
    <!-- Navigation -->

    <nav id="navigation" class="navbar navbar-expand-lg navbar-dark" style="background-color: #5239aa; ">
        <div class="container-fluid">
            <img src="../../Images/logo.png" alt="" id="logo">
            <a class="navbar-brand" href="http://localhost/IMS/">IMS CS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost/IMS/">Home</a>
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

    <!--Form-->
    <div class=" mcontainer">
        <form name="register" method="post" class="myform" action="" enctype="multipart/form-data">
            <h1 class="tit">Teacher Registration</h1>
            <?php echo @$err; ?>
           
            <table width="100%">
                <tr>
                    <td>
                        <label class="label required">First Name</label>
                    </td>

                    <td>

                    </td>

                    <td class="td1">
                        <input type="text" autocomplete="off" name="fname" placeholder="First Name" class="required" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Last Name</label>
                    </td>

                    <td>

                    </td>

                    <td class="td1">
                        <input type="text" name="lname" autocomplete="off" placeholder="Last Name" required />
                    </td>
                </tr>


                <tr>
                    <td>
                        <label>Birth Date</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="date" name="dob" autocomplete="off" placeholder="YYYY/MM/DD" />
                    </td>
                </tr>

               

                <tr>
                    <td>
                        <label class="label required">Username</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="text" name="USN" autocomplete="off" placeholder="Enter username" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Email</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="email" name="mail" autocomplete="off" placeholder="student@aust.edu.pk" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">CNIC NO</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                    <input type="number" name="cnic" autocomplete="off" placeholder="13131-4584858-5" required />
                     
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Service Card No</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                    <input type="number" name="cardno" autocomplete="off" placeholder="3565" required />
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Gender</label>
                    </td>

                    <td>

                    </td>

                    <td class="td1">
                        <input type="radio" name="gen" value="M" />&nbsp;&nbsp;&nbsp;&nbsp;Male
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gen" value="F" />&nbsp;&nbsp;&nbsp;&nbsp;Female
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="phone" autocomplete="off" name="phone" id="phone" placeholder="+9231154658585" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Upload Your Image</label>

                    </td>
                    <td> </td>
                    <td><input class="form-control" type="file" name="img" id="img" /></td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Password</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1" class="label required">
                        <input type="password" name="psswd" id="pass1" placeholder="Password" required />
                    </td>
                </tr>


                    <td>
                        <label class="label required">Security Question</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="text" name="ques" autocomplete="off" placeholder="Enter Security Question" required />
                    </td>
                </tr>
                <td>

                <tr>
                    <td>
                        <label class="label required">Answer</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="text" name="ans" autocomplete="off" placeholder="Enter Security Answer" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label">Category</label>
                    </td>

                    <td>

                    </td>

                    <td class="td1">
                    <br>
                        <input type="radio" name="cat" value="Lecturer" />&nbsp;&nbsp;&nbsp;&nbsp;Lecturer
                    <br>
                    <br>
                        <input type="radio" name="cat" value="On Contract" />&nbsp;&nbsp;&nbsp;&nbsp;On Contract<br>
                        <br> <input type="radio" name="cat" value="Assistant" />&nbsp;&nbsp;&nbsp;&nbsp;Assistant<br>
                    </td>
                </tr>
          
                    <tr>
                    <td>
                        <input type="submit" name="Register" class="login_btn" value="Submit" />
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="reset" onClick="window.location.href=window.location.href" class="reset_btn" value="Reset" />
                    </td>
                </tr>
                
            </table>
        </form>
    </div>
 
      <!--Footer -->

<!-- The content of your page would go here. -->

<footer class="footer-distributed">

<div class="footer-left">

    <h3><img src="../../Images/logo.png" alt="" style="width: 50px; height: 50px;"></h3>

    <p class="footer-links">
        <a href="http://localhost/IMS/">Home</a>
        ·
        <a href="http://localhost/IMS/">Blog</a>
        ·
        <a href="http://localhost/IMS/pages/about.html">About</a>
        ·
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

 <!-- js-files -->
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<!-- //js-files -->
</body>

</html>