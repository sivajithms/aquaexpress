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
        body {
            display: grid;
            place-items: center;
            padding-top: 40px;
        }

        .form {
            width: 200%;
        }

        .main {
            display: grid;
            place-items: center;
            margin-top: 40px;
            margin-right: 10%;


        }
        .mt-4{
            margin-left: 70%;
        }
        .back{
            margin-right: 75%;
        }
    </style>
</head>
<body>
<a href="./index.php" class="btn back btn-primary ">Back</a>

    <div class="main">
        
        <form action="php/add-route.php" class="form-group" method="post">
        <legend>Enter the name of the place </legend>
        <input type="text" id="" class="form-control form" placeholder="enter name" name="place" required>
        <button type="submit"  class="btn btn-primary mt-4">Submit</button>


        </form>


    </div>
</body>

</html>