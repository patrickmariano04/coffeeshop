<?php
$profpic = "images/bg.jpg";
include 'authenticate.php';
 
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "config.php";
	
    $sql = "SELECT * FROM customers WHERE customer_id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_id);
		
        
        $param_id = trim($_GET["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $fname = $row["FNAME"];
                $lname = $row["LNAME"];
                $id = $row["CUSTOMER_ID"];
                $street = $row["STREET"];
                $city = $row["CITY"];
                $phone = $row["PHONE"];
            } else{
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    mysqli_stmt_close($stmt);
    
    mysqli_close($link);
} else{
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
        background-image: url('<?php echo $profpic;?>');
        background-repeat: no-repeat;
        background-size: 100%;
        }
        .wrapper{
            width: 500px;
            margin: 50px auto;
            background-color: #ffffffa4;
            padding-top: 0px;
            border-radius: 15%;
        }
        .wrapper .col-md-12{
            margin-left: 50px;
        }
        table{
            background-color: white;
        }
        h1, label{
            color: black;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>First Name</label>
                        <p><b><?php echo $row["FNAME"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <p><b><?php echo $row["LNAME"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>ID</label>
                        <p><b><?php echo $row["CUSTOMER_ID"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Street</label>
                        <p><b><?php echo $row["STREET"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <p><b><?php echo $row["CITY"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <p><b><?php echo $row["PHONE"]; ?></b></p>
                    </div>
                    <p><a href="customers.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>