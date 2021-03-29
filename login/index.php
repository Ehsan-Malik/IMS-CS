<?php
require_once('../connection.php');
session_start();
extract($_POST);

if (isset($_POST['Login'])) {
        $name=$_POST['usn'];
        $pass = md5($_POST['Password']);
        $std = "Student";
        $tec = "Teacher";
        $hod = "HOD";
        $it = "IT Services Staff";

        $query="select * from registration where usn='$name' And password='$pass' And role='$std'";
        $run_std=mysqli_query($con, $query);

        $query="select * from registration where usn='$name' And password='$pass' And role='$tec'";
        $run_tec=mysqli_query($con, $query);

        $query="select * from registration where usn='$name' And password='$pass' And role='$hod'";
        $run_hod=mysqli_query($con, $query);

        $query="select * from registration where usn='$name' And password='$pass' And role='$it'";
        $run_it=mysqli_query($con, $query);

        if(mysqli_num_rows($run_std)==1)
        {
            $_SESSION['user'] = $usn;
            echo '<script type="text/javascript">
            window.location = "http://localhost/IMS/Student"
       </script>';
        }

        else if(mysqli_num_rows($run_tec)==1)
        {
            $_SESSION['user'] = $usn;
            echo '<script type="text/javascript">
            window.location = "http://localhost/IMS/Teacher"
       </script>';
        }
        else if(mysqli_num_rows($run_hod)==1)
        {
            $_SESSION['user'] = $usn;
            echo '<script type="text/javascript">
            window.location = "http://localhost/IMS/Hod/"
       </script>';
        }

        else if(mysqli_num_rows($run_it)==1)
        {
            $_SESSION['user'] = $usn;
            echo '<script type="text/javascript">
            window.location = "http://localhost/IMS/Itservice/"
       </script>';
        }
        else
        {
            $err = "<font color='red' align='center'>Enter a Valid Username & Password</font>";
        }
}

?>

<!-- index.php-->
<!-- HOME | LOGIIN PAGE -->
<!DOCTYPE html>
<html>

<head>
<script>

function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="login.css">

    <!--Scroll Up js File-->
    <script src="js/scroll.js"></script>

    <!-- Disables The Mouse Right Click, Cut, Copy & Paste Options in The Web Page 
        <script src = "js/disable.js"></script>
        -->
    <script type="text/javascript" src="js/progress.js"></script>
    <!--Custom Favicon.-->
    <link rel="icon" type="image/png" sizes="64x64" href="css/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type=text/css> @import url('https://fonts.googleapis.com/css?family=Acme|Bree+Serif|Patrick+Hand|Volkhov|Handlee|PT+Serif|Numans|Bitter|Odibee+Sans|Simonetta|Trade+Winds&display=swap'); .back-to-top { position: fixed; bottom: 25px; right: 25px; display: none; } .container { top:0; margin-top:0; padding-top:0; } input{ caret-color:red; } 

.container{
            display: flex;
            align-items: center;
            align-self: center;
            text-align: center;
        background-color: #b07fff78
            margin-top: 170px;
    position: absolute;
}


        }
       

        #navigation{
  position: fixed;
  width: 100%;
  z-index: 1;
}

#card{
    position: absolute;
    margin: 198px 0px;
    margin-left: 225px;
}
#logo{
    width: 100px;
    height: 100px;
}

#search-btn{
    color: aliceblue;
    border-color: aliceblue;

}
#contact{
    color: aliceblue;
}
#about{
    color: aliceblue;
}
#signin{
    color: aliceblue;
}

.d-flex{
    margin-left: 530px;
}
   

</style> </head> <body>
        <div id = "progress"></div>
   
    <!-- Navigation -->
    <nav id="navigation" class="navbar navbar-expand-lg navbar-dark" style="background-color: #5239aa; ">
        <div class="container-fluid">
            <img src="../Images/logo.png" alt="" id="logo">
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
    <!-- Navigation -->
                
        <div class="container">
	        <div class="d-flex justify-content-center h-100">
		        <div class="card mcon" id = "card">
			        <div class="card-header" id = "card-header">
				        <h3 align="center" style = "color:#000">Sign - In</h3>
			        </div>
			        <div class="card-body">
				        <form action="index.php" method="post">
                            <p align='center'><b><?php echo @$err; ?></b></p> 
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" autocapitalize="characters" autocomplete="off" class="form-control a" name="usn" placeholder="Username">
                            </div> 
                        
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" name="Password" placeholder="Password" id="myInput">
                                <input type="checkbox" onclick="myFunction()" style="    position: absolute; margin: 13px 0px 0px 331px;">
                            </div>
                            <div class="row justify-content-center">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="submit" value="Login" style = "color:white" name="Login" class="login_btn">
                                    </div>
                                </div>
                            </div>
        				</form>
			        </div>
		            <div class="card-footer" id = "card-footer">
				        <div class="d-flex justify-content-center">
					        <a href="../radio.html" style="text-decoration:none; color:black; margin-right: 700px;">New User.? Register Here</a>
				        </div>
			        </div>
		        </div>
            </div>
            

        



         
        </div>
    



        
        <a id="back-to-top" data-toggle="tooltip" data-placement="auto" title="Back-to-Top" style = "color:#000;background-color:#fff;border:2px solid black;" href="#" class="btn-light btn-lg back-to-top hidden-mobile" role="button"><i class="fas fa-arrow-up"></i></a>
     
    </body>
</html>