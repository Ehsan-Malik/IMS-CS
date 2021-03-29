<?php


session_start();
require_once('connect.php');

$user = $_SESSION['user'];
if ($user == "") {
    header('location: ../../login/login.php');
} else {
    $stud =  mysqli_query($conn, "SELECT * from registration where usn = '$user'");
}


if(isset($_GET['roll'])){
$roll=$_GET['roll'];
$result=mysqli_query($conn,"DELETE FROM studentattend WHERE roll='$roll'");
 
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