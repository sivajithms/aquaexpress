<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    .container-fluid{
        margin-top:10%;
       
    }
    .form-group{
        margin-top: 5%;
        width: 80%;
        margin-left: 10%;
    }
    .btn{
        width: 30%;
        margin-top: 5%;
        margin-left: 33%;
    }
    .table{
        width: 80%;
        margin-left: 10%;
    }
    
</style>
<body>
    <div class="container-fluid co">
        <form class="form-horizontal" role="form" id="form-acc">
            <table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th> <span class="glyphicon glyphicon-record" aria-hidden="true"></span>
                            Slots
                        </th>
                        <th>
                            <center>
                                fare
                            </center>
                        </th>
                        <th>
                            <center>
                                Total
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            30
                        </td>
                        <td align="center">
                            10rs
                        </td>
                        
                        <td align="center">100rs</td>
                    </tr>
                    
                </tbody>
            </table>
            <div class="form-group">
                <label for="">Total # of Passenger:</label>
                <input type="number" min="1" class="form-control" name="totalPass" plactreholder="Total # of Passenger" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-success">NEXT
                <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
            </button>
        </form>
    </div>

</body>

</html>