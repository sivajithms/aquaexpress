<?php
include './util/connection.php';

    
    $name= $_POST['name'];
    $phno=$_POST['phno'];
    $age=$_POST['age'];
    $address=$_POST['address'];
    $password = $_POST['psw'];
  

    $q="SELECT phno FROM  users where phno='$phno'";
    $res= mysqli_query($conn,$q);

    if(mysqli_num_rows($res) > 0){

        $error="user exist";
        echo "$error";
    }else{
  //insertion to college table
  $query = "INSERT INTO users(name, phno, age, address,password)  VALUES ('$name', '$phno', '$age' ,'$address', '$password')";
  $result1 = mysqli_query($conn,$query); 
  if($result1){
    $query = "select max(user_id) as id from users";
    $result1 = mysqli_query($conn,$query);
    if($row = mysqli_fetch_array($result1)){
       
       
       $id= $row['id'];
      
       $_SESSION['user_id'] =$row['id'];
               
       header('Location: index.php');
    }
        
           }
 

else{
  echo "Data not inserted";
}



    }
  


  


       
?>