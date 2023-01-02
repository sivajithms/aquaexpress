<?php
include '../util/connection.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aquaexpress</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            display: grid;
            place-items: center;
            padding-top: 40px;
        }
        .form{
            width: 200%;
        }  
        .main{
            display: grid;
            place-items: center;
            margin-top: 40px;
            margin-right: 10%;


        }      
    </style>
</head>
  <body>
    <div class="main">
        <form method="post" action="php/add-boat.php" >
          <legend>Enter boat details </legend>
          <div class="mb-3">
            <label for="" class="form-label">Name </label>
            <input type="text" id="" class="form-control form" placeholder="enter name" name="name">
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">origin </label>
            <select " class="form-select form" name="origin">
            <?php
            $query = "SELECT * FROM routes;";
                $result = mysqli_query($conn,$query) ; 
                    
                while ($dl = mysqli_fetch_array($result)){ 	
                    
                    echo'<option value=' . $dl["place"] .  ' placeholder="enter name">' . $dl["place"] . '</option> ';


                }
                
            ?>
            </select>
            <label for="disabledSelect" class="form-label">destination </label>
            <select id="disabledSelect" class="form-select form" name="destination">
            <?php
            $query = "SELECT * FROM routes;";
                $result = mysqli_query($conn,$query) ; 
                    
                while ($dl = mysqli_fetch_array($result)){ 	
                    
                    echo'<option value=' . $dl["place"] .  ' placeholder="enter name">' . $dl["place"] . '</option> ';


                }
                
            ?>
            </select>
            <label for="disabledTextInput" class="form-label">capacity </label>
            <input type="number" id="disabledTextInput" class="form-control form" placeholder=" xx " name="capacity">
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
              <label class="form-check-label" for="disabledFieldsetCheck">
                Can't check this
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>