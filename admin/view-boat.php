<?php
include '../util/connection.php';
$query = "SELECT * FROM boat";
$result = mysqli_query($conn, $query);  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<style>
    .main {
        margin: 5%;
    }
</style>

<body>
   
    
    <div class="main">
        <a href="./index.php" class="btn btn-primary">Back</a>
        <table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>

                    <th>
                        <center>
                            boat name
                        </center>
                    </th>
                    <th>
                        <center>
                            origin
                        </center>
                    </th>
                    <th>
                        <center>
                            destination
                        </center>
                    </th>
                    <th>
                        <center>
                            capacity
                        </center>
                    </th>
                    
                    
                </tr>
            </thead>
            <tbody>
            <?php
            if(mysqli_num_rows($result) < 1){
                echo "no boats";
            }
     while($row = mysqli_fetch_array($result)){
        $bid=$row['boat_id'];
        $name=$row['name'];
        $org=$row['origin'];
        $dest=$row['destination'];
        $capacity=$row['capacity'];
        ?>
                <tr>
                    <td align="center">
                    <?php echo $name ?>
                    </td>
                    <td align="center">
                    <?php echo $org ?>
                    </td>
                    
                    
                    <td>
                        <center>
                    <?php echo $dest ?>
                    </center>
                    </td>
                    <td align="center">
                    <?php echo $capacity ?>

                    </td>
                    
                    
                </tr>

            </tbody>

            <?php
            }
            ?>
        </table>
    </div>
</body>
<script>
function confirmation() {
    let text = "do you want to delete !\nEither OK or Cancel.";
  if (confirm(text) == true) {
    return true;
    // document.getElementById('deletejs').submit();
  } else{
    return false;
  }
  
}

</script>
</html>