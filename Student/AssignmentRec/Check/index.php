



  













  <?php


session_start();
require_once('connect.php');

$user = $_SESSION['user'];
if ($user == "") {
    header('location: http://localhost/IMS/login/');
} else {
    $stud =  mysqli_query($conn, "SELECT * from registration where usn = '$user'");
}
$row = mysqli_fetch_array($stud);
$role = $row['role'];

if($role != 'Student')
{
    header('location: http://localhost/IMS/login/');
}
else{}

$q = mysqli_query($conn, "select * from registration where usn='" . $_SESSION['user'] . "'");
$rr = mysqli_num_rows($q);

?>

<!-- dashboard.php -->
<!-- Student DASHBOARD -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Check New Assignments.!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles.css" rel="stylesheet">
    <!--Custom Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="../../Images/logo.png">
    <style>
        .back-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            display: none;
        }

        .label1 {
            color: black;
            font-weight: bold;
            width: 100%;
            color: darkred;
            font-size: 35px;
            font-family: 'Della Respira';
        }

        .hov a:hover {
            color: red;
        }

        body {
            background-color: white;
        }

        .wrapper {
            display: flex;
            margin-top: 3%;
            position: relative;
        }



        .wrapper .sidebar {
            width: 200px;
            height: 100%;
            background: #5239aa;
            padding: 30px 0px;
            border: 2px solid black;
            position: fixed;
            overflow-x: scroll;
            font-family: 'Acme';
            font-size: 18px;
            margin-bottom: 5%;
            margin-top: 30px;
            z-index: 1;
        }

        .wrapper .sidebar h2 {
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 30px;
        }

        .wrapper .sidebar ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .wrapper .sidebar ul li {
            padding: 15px;
            border-bottom: 1px solid #bdb8d7;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .wrapper .sidebar img {
            border-radius: 50%;
            justify-content: center;
            margin-left: 15%;
            margin-top: auto;
            margin-bottom: 5%;
            ;
            border: 1px dashed #000000;
            background-color: white;
        }

        .wrapper .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }

        .wrapper .sidebar ul li a .fas {
            width: 25px;
        }

        .wrapper .sidebar ul li:hover {
            background-color: #ad1457;
            text-decoration: none;
        }

        .wrapper .sidebar ul li:hover a {
            color: #fff;
        }

        .wrapper .main_content {
            width: 100%;
            margin-left: 2%;
            margin-bottom: 3%;
        }

        .wrapper .main_content .header {
            padding: 20px;
            font-size: 25px;
            background: #5a0533;
            border-bottom: 1px solid #e0e4e8;
            color: #fff;
            border: 2px solid black;
        }

        .wrapper .main_content .info {
            margin: 20px;
            color: #717171;
            line-height: 25px;
        }

        .wrapper .main_content .info div {
            margin-bottom: 20px;
        }


        .wrapper .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
        }


        .dropdown-btn {
            padding-left: 0;
            text-decoration: none;
            color: #fff;
            display: block;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            outline: none;
        }

        /* On mouse-over */
        .dropdown-btn:hover {
            color: #f1f1f1;
        }

        /* Main content */
        .main {
            margin-left: 200px;
            /* Same as the width of the sidenav */
            font-size: 20px;
            /* Increased text to enable scrolling */
            padding: 0px 10px;
        }

        /* Add an active class to the active dropdown button */
        .active {
            background-color: #ad1457;
            color: white;
        }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
            display: none;
            background-color: #5a0533;
            padding-left: 8px;
        }


        /* Optional: Style the caret down icon */
        .fa-caret-down {
            float: right;
            padding-right: 8px;
            padding-top: auto;
        }

        /* Some media queries for responsiveness */
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .dropdown-btn .fas {
            width: 25px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="width: 100%;z-index:1;position:fixed;top:0;left:0;padding:8px;border:none;background-color:#5239aa;border-bottom:1px solid black;box-shadow: 3px 3px 5px black;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="navbar-brand text-white" style="font-family:'Acme';font-size:30px;color: white;padding-right: 750px;" href="#">Welcome, <?php echo '' . $row['fname'] . ' ' . $row['lname']; ?> </a>

            </div>
            <ul class="nav navbar-nav navbar-right collapsed text-white" id="navbar">
                <li>
                    <a class="mnav11" style="color:white;font-family:'Acme';font-size:25px;float: right;margin-right:50px;" href="../../../logout.php?logout"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> Logout</a>
                </li>
            </ul>
    </nav>

    <div class="wrapper">
        <div class="sidebar col -l2 -s4" style="left:0;">
            <ul>
                <div>
                    <img src="../../../dbimages/<?php echo $_SESSION['user']; ?>/<?php echo $row['image']; ?>" width="100" height="100" alt="not found" />
                </div>
                <li><a href="http://localhost/IMS/Student/"><i class="fas fa-clipboard"></i>Dashboard</a></li>
                <li><a href="http://localhost/IMS/Student/Updateprofile"><i class="fas fa-user-edit"></i> Update Profile</a></li>
                <li><a href="http://localhost/IMS/Student/Timetable"><i class="fas fa-pen"></i>Time Table</a></li>
                <li><a href="http://localhost/IMS/Student/Notification"><i class="far fa-file"></i> Notifications</a></li>
                <li><a href="http://localhost/IMS/Student/AttendenceRec"><i class="fas fa-user-edit"></i> Attendance</a></li>
                <li><a href="http://localhost/IMS/Student/MarksRec"><i class="fas fa-clipboard"></i>Marks Record</a></li>
                <li><a href="http://localhost/IMS/Student/FeeRec"><i class="far fa-file"></i> Fee Record</a></li>
                <li><a href="http://localhost/IMS/Student/TeacherRec"><i class="fas fa-user-edit"></i> Teachers</a></li>
                <li><a href="http://localhost/IMS/Student/StdRecord"><i class="fas fa-clipboard"></i>Students </a></li>
                <li><a href="http://localhost/IMS/Student/ExamRec"><i class="far fa-file"></i> Exam Record</a></li>
                <li><a href="http://localhost/IMS/Student/AssignmentRec"><i class="fas fa-user-edit"></i> Assignment Record</a></li>

              </ul>
        </div>
        <div class="col-sm-12 col-sm-offset-12 col-md-10 col-md-offset-2 main" style="padding-top: 70px;">
            <!-- container-->
      

<br>
<br>
<link rel="stylesheet" href="style.css" type="text/css"/>
<div id="userlist">
<table>
 <tr>
   <th>Assignment ID</th>
   <th>Subject</th>
   <th>Deadline</th>
   <th>Detail</th>
   <th>Class</th>


  </tr>
 <?php
 $result=mysqli_query($conn,"SELECT * FROM t_assignment ORDER BY deadline DESC");
 while($row=$result->fetch_array()){?>
  <tr>
  <td><?php echo $row['id'];?></td>
  <td><?php echo $row['subject'];?></td>
  <td><?php echo $row['deadline'];?></td>
  <td><?php echo $row['detail'];?></td>
  <td><?php echo $row['class'];?></td>
 
  
  </tr>
  <?php }?>
  </table>
  </div>

                <!-- container end-->



    </div>
            <a id="back-to-top" style="color:#fff;background-color:#5a0533;border:2px solid black;" href="#" class="btn-light btn-lg back-to-top" role="button"><i class="fas fa-arrow-up"></i></a>
            <script>
                /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
                var dropdown = document.getElementsByClassName("dropdown-btn");
                var i;

                for (i = 0; i < dropdown.length; i++) {
                    dropdown[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var dropdownContent = this.nextElementSibling;
                        if (dropdownContent.style.display === "block") {
                            dropdownContent.style.display = "none";
                        } else {
                            dropdownContent.style.display = "block";
                        }
                    });
                }
            </script>
</body>

</html>