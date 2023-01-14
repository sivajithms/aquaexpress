<?php
include './util/connection.php';
session_start();

if(isset($_POST)){
    
    $phno = $_POST['phno'];
    $pswd = $_POST['password'];
}
else 
echo "not connected";

$password="select * from users where phno='$phno'";

$query1=mysqli_query($conn,$password);

if(mysqli_num_rows($query1) > 0){

while($row=mysqli_fetch_array($query1)) {
    $user_pass = $row['password'];
    if($user_pass==$pswd){
       
        //unset($_SESSION['user_id']);
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: ./index.php");
    }
    else{
        unset($_SESSION['user_id']);
        $_SESSION['login_err']="Wrong password";
        header("Location: ./userlogin.php");
    }
} 
}

else{
    unset($_SESSION['user_id']);
    $_SESSION['login_err']="user not exist";
    header("Location: ./userlogin.php");
}
?>