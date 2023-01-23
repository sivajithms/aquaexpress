<?php
session_start();

if($_SESSION['user_id']){

    unset($_SESSION['user_id']);
    header("Location: ./index.php");
    
}else{

    echo"<script>
    alert('hiiii');
    </script>";
}


?>