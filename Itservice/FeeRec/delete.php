<?php

session_start();
require_once('connect.php');

$user = $_SESSION['user'];
$role =  mysqli_query($conn, "SELECT * from registration where usn = '$user' and role ='IT Services Staff'");
if ($role != "IT Services Staff") {
    header('location: http://localhost/IMS/login/');
} else {
    $stud =  mysqli_query($conn, "SELECT * from registration where usn = '$user' and role ='IT Services Staff'");
}
if(isset($_GET['rollno'])){
$rollno=$_GET['rollno'];
 $result=mysqli_query($conn,"DELETE FROM feerecord WHERE rollno='$rollno'");
 if($result){
  //redirect user to homepage after successfully Deleted
  header('location:index.php');
 }else{
  echo "No row Found To Delete";
 }
}else{
 echo 'You have not Select any Roll no';
}
 ?>