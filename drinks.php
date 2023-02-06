<?php 
include 'authenticate.php';
$profpic = "images/bg.jpg";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drinks Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/navbar.css">
    <style>
        .wrapper{
            width: 940px;
            margin: 0 auto;
            background-color: none;
            padding-top: 150px;
        }
        table{
            background-color: white;
        }
        h2{
            color: white;
        }
        table tr td:last-child{
            width: 120px;
        }
        body {
        background-image: url('<?php echo $profpic;?>');
        background-repeat: no-repeat;
        background-size: 100%;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <header class="amen">
<div class="logo"><h1 class="title">Drinks</h1></div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php">Sign Out</a></li>
            </ul>
    </header>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Drinks</h2>
                        <a href="drinks-create.php" class="btn btn-success pull-right">Add New Drink</a>
                    </div>
                    <?php
                    require_once "config.php";
                    
                    $sql = "SELECT * FROM DRINKS";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Size</th>";
                                        echo "<th>Price</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['DRINK_ID'] . "</td>";
                                        echo "<td>" . $row['DRINK_NAME'] . "</td>";
                                        echo "<td>" . $row['DRINK_SIZE'] . "</td>";
                                        echo "<td>" . $row['DRINK_PRICE'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="drinks-read.php?id='. $row['DRINK_ID'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="drinks-update.php?id='. $row['DRINK_ID'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="drinks-delete.php?id='. $row['DRINK_ID'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    mysqli_close($link);
                    ?>
                    <a href="index.php" class="btn btn-success pull-right">Go Back </a>
                </br></br>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>