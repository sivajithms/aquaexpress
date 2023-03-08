<?php
  session_start();
  unset($_SESSION['login_err']);
 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aqua express</title>
</head>
<body>
  <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Quicksand, sans-serif;
}

body {
  font-size: 62.5%;
}

.container {
  width: 100%;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.form-wrapper {
  width: 50rem;
  height: 40rem;
  background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
  border-radius: 3rem;
  box-shadow: 0 2rem 3rem rgba(0, 0, 0, 0.2);
  position: relative;
  overflow: hidden;
}

.green-bg {
  width: 100%;
  height: 100%;
  background-image: linear-gradient(to right,  #23c2ef , #1d75e1,#363cdd,#310891);
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 0 3rem 3rem 0;
  transition: width 1s cubic-bezier(0.075, 0.82, 0.165, 1);
  z-index: 100;
}

.container.change .green-bg {
  width: 40%;
  z-index: 0;
}

.green-bg button {
  position: absolute;
  top: 60%;
  left: 50%;
  transform: translateX(-50%);
  width: 5rem;
  height: 2rem;
  background-color: transparent;
  color: #ebedee;
  font-size: 0.8rem;
  text-transform: uppercase;
  font-weight: 2rem;
  letter-spacing: 0.1rem;
  border-radius: 1rem;
  border: 0.1rem solid #eee;
  cursor: pointer;
}

.banner {
  position: absolute;
  top: 30%;
  left: -30rem;
  text-align: center;
  width: 20rem;
  transition: left 1.5s cubic-bezier(0.23, 1, 0.32, 1);
  z-index: 50;
}

.container.change .banner {
  left: 0rem;
}

.banner h1 {
  margin-bottom: 1rem;
  font-weight: 2rem;
  letter-spacing: 0.1rem;
  font-size: 1.3rem;
  color: #eee;
}

.banner p {
  font-weight: 2rem;
  font-size: 1rem;
  color: aliceblue;
}

 .sing-up-form {
  position: absolute;
  height: 100%;
  width: 30rem;
  top: -50rem;
  left: 20rem;
  z-index: 50;
  display: flex;
  justify-content: space-around;
  align-items: center;
  flex-direction: column;
  padding: 10rem 0;
  transition: top 3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.container.change .sing-up-form {
  top: 0rem;
} 

 .sing-up-form h1 {
  text-transform: uppercase;
  font-size: 2rem;
  color: rgba(0, 0, 0, 0.6);
  margin-top: -2rem;
  margin-bottom: 1rem;
}

.social-media {
  display: flex;
  margin-bottom: 1rem;
}

.social-media i {
  height: 2rem;
  width: 2rem;
  border: 0.1rem solid #aaa;
  font-size: 1rem;
  color: rgba(0, 0, 0, 0.8);
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-right: 1rem;
  cursor: pointer;
} 

 .social-media a {
  text-decoration: none;
} 

.sing-up-form p {
  font-size: 0.9rem;
  color: rgba(0, 0, 0, 0.5);
  margin-bottom: 0.8rem;
}

.input-group {
  position: relative;
}

.input-group input {
  width: 20rem;
  height: 2rem;
  border: 0.1rem solid rgba(0, 0, 0, 0.2);
  border-radius: 1rem;
  padding: 1rem 1rem 1rem 3rem;
}

.input-group i {
  position: absolute;
  font-size: 1rem;
  top: 30%;
  left: 0.7rem;
}

.sing-up-form button {
  width: 5rem;
  height: 2rem;
  background-color: transparent;
  font-size: 0.8rem;
  text-transform: uppercase;
  font-weight: 2rem;
  letter-spacing: 0.1rem;
  border-radius: 1rem;
  border: 0.1rem solid #aaa;
  cursor: pointer;
  margin-top: 2rem;
}

  </style>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>sing up form</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  </head>
   
  <body>
    <div class="container">
      <div class="form-wrapper">
        <div class="banner">
          <h1>Hello, Friends!</h1>
          <p>Enter your personal details and start journey with us</p>
        </div>
        <div class="green-bg">
          <a href="userlogin.php"><button type="button" class="green-button">sign in</button></a>
        </div>
        <form action="register.php" method="post" class="sing-up-form">
          <h1>create account</h1>
           
          <p> use your email for registration</p>
          <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" class="user" name="name" placeholder="user" required pattern="[A-Za-z]+"/>
          </div>
          <div class="input-group">
          <i class="fa-regular fa-calendar-alt"></i>
            <input type="number" placeholder="age" name="age" class="age" required min="12"/>
          </div>
          <div class="input-group">
            <i class="fa-regular fa-envelope"></i>
            <input type="text" placeholder="address" name="address" class="email" required/>
          </div>
          <div class="input-group">
            <i class="fa fa-phone" aria-hidden="true"></i>
<input type="number" placeholder="+91 xxxxxxxxxx" name="phno" class="phone number" required pattern="\d{9,}" onKeyPress="if(this.value.length==10) return false;">          </div>
          <div class="input-group">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="psw" placeholder="password" required/>
          </div>
          <?php
          
          
          if(isset($_SESSION['register_err'])){
         echo " <p class='text-danger'>".$_SESSION['register_err']."</p>";
        }
        ?>
          <button type="submit" value="submit">sign up</button>
        </form>
      </div>
    </div>
  
     <script type=""> 
      const container = document.querySelector(".container");
const greenButton = document.querySelector(".green-bg button");

function btclick() {
  container.classList.toggle("change");
}
btclick();


    </script>
  </body>
</body>
</html>