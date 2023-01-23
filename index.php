<?php
session_start();
include './util/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AquaExpress</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Abel", sans-serif;
      font-size: 10px;
      scroll-behavior: smooth;
    }

    .wrapper {
      width: auto;
      height: 100vh;

      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("./images/boat.png");
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      backdrop-filter: opacity(80%);
    }

    .Container {
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .nav {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 94px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.521);
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 50px;
    }

    .logo {
      font-family: "Abel", sans-serif;
      font-size: 2.5rem;
      font-weight: 600;
      letter-spacing: 0.7rem;
      color: white;
      margin: 4%;
    }

    .menu {
      display: inline-block;
      line-height: 80px;
    }

    .menu ul {
      list-style: none;
      /* display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center; */
    }

    .menu ul li {
      display: inline-block;
    }

    .menu ul li a {
      text-decoration: none;
      font-family: "Raleway", sans-serif;
      font-size: 1.2rem;
      font-weight: 600;
      letter-spacing: 0.1rem;
      color: white;
      border: 1px solid transparent;
      border-radius: 4px;
      padding: 10px 15px;
      margin: 0 5px;
      transition: 0.5s ease;
    }

    .menu ul li a:hover {
      border-color: white;
    }

    .menu ul li:nth-child(5) a {
      color: #fff200;
      border: 1px solid #fff200;
    }

    .menu ul li:nth-child(5) a:hover {
      color: black;
      background-color: #fff200;
    }

    .header {
      text-align: center;
    }

    .header h1 {
      font-family: "Raleway", sans-serif;
      font-size: 4rem;
      font-weight: 600;
      letter-spacing: 0.2rem;
      color: white;
      padding: 45% 20px 8px;
    }

    .header p {
      font-family: "Raleway", sans-serif;
      font-size: 1.5rem;
      font-weight: 600;
      letter-spacing: 0.2rem;
      color: white;
      padding: 10px 15px;
    }

    button {
      font-size: 1.5rem;
      font-weight: 600;
      letter-spacing: 0.15rem;
      color: black;
      background-color: #fff200;
      padding: 20px 30px;
      margin: 50px 5px 0;
      border: none;
      cursor: pointer;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

  <div class="wrapper">
    <div class="Container">
      <div class="nav">
        <div class="logo">
          AQUAEXPRESS
        </div>
        <div class="menu">
          <ul class="navMenu">
            <li><a href="#">Home</a></li>
            <li><a href="user-bookings.php">your tickets</a></li>
            <li><a href="#">Locations</a></li>
          <?php 
          if($_SESSION['user_id']){
            echo'<li><a href="logout.php">Logout</a></li>';
          }else{
            echo'<li><a href="userLogin.php">Login</a></li>';
          }
          ?>
            <?php 
            if($_SESSION['user_id']){
            $id=$_SESSION['user_id'];  
            $query = "SELECT * FROM users where user_id=$id";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            $user_name=$row['name'];
            
         
              
            echo '<li><a href="signup.php">'; echo $user_name; echo '</a></li>';
      
            
          }else{
            echo '<li><a href="signup.php">Register</a></li>';

          }
            ?>
          </ul>
        </div>
      </div>
      <div class="header">
        <h1>BOOK YOUR BOAT TICKETS</h1>
        <!-- <p>New area / Future City</p> -->
        <?php
        if(isset($_SESSION['user_id'])){
       echo'<a type="button" href="select-date.php"><button>BOOK NOW</button></a>';
        }else{
          echo'<a type="button" href="userlogin.php"><button>BOOK NOW</button></a>';
        }
        ?>
       
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>

</html>