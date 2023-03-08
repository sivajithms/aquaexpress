<?php
session_start();
include './util/connection.php';
unset($_SESSION['register_err']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aqua express</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <style>
        .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #23c2ef, #1d75e1, #363cdd, #310891);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #23c2ef, #1d75e1, #363cdd, #310891);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}

    </style>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="https://i.pinimg.com/280x280_RS/51/f5/ec/51f5ec7ee8345f8b67537a183b30eece.jpg"
                          style="width: 185px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1">AQUA EXPRESS</h4>
                      </div>
      
                      <form method="post" action="login.php" >
                        <p>Please login to your account</p>
      
                        <div class="form-outline mb-4">
                          <input type="text" id="form2Example11" class="form-control"
                            placeholder="Phone number" name="phno"/>
                          <label class="form-label" for="form2Example11">phone number</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="password" id="form2Example22" class="form-control" name="password"/>
                          <label class="form-label" for="form2Example22">Password</label>
                        </div>

                        <?php
        if(isset($_SESSION['login_err'])){
         echo " <p class='text-danger'>".$_SESSION['login_err']."</p>";
        }
        ?>
                      
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log
                            in</button>
                          <a class="text-muted" href="#!">Forgot password?</a>
                        </div>
      
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">Don't have an account?</p>
                          <a href="signup.php"><button type="button" class="btn btn-outline-danger">Create new</button></a>
                        </div>
      
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">We are more than just a company</h4>
                      <p class="small mb-0">Hi there!
                        Welcome to the aqua express Family!
                        We're here to help you with your boat ticket bookings. As a thank you for joining our family, we'd like to give you a special gift.
                        .</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>   














<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>