<?php
session_start();

if($_SESSION['admin_id']){

    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    header("Location: ./adminLogin.php");

}else{

    echo"<script>
    alert('hiiii');
    </script>";
}


?>