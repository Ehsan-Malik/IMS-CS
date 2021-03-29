<?php
    session_start();
    if(isset($_GET['logout']))
    {
        session_destroy();
        header("location:http://localhost/IMS/login/");
    }
?>