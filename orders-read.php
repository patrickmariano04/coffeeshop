<?php
$profpic = "images/bg.jpg";
include 'authenticate.php';
 
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "config.php";
	
    $sql = "SELECT ORDERS.ORDER_ID, ORDERS.CUSTOMER_ID, ORDERS.ORDER_DATE, ORDERS.ORDER_TYPE, ORDER_LINE.DRINK_ID, ORDER_LINE.ORDER_QUANTITY, ORDER_LINE.TOTAL_PRICE FROM orders,order_line WHERE orders.order_id = order_line.order_id AND orders.order_id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_id);
		
        
        $param_id = trim($_GET["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $order_id = $row["ORDER_ID"];
                $user_id = $row["CUSTOMER_ID"];
                $drink_id = $row["DRINK_ID"];
                $date = $row["ORDER_DATE"];
                $type = $row["ORDER_TYPE"];
                $quantity = $row["ORDER_QUANTITY"];
                $totalprice = $row["TOTAL_PRICE"];
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
    <title>View Order</title>
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
            padding-top: 2px;
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
                        <label>ORDER ID</label>
                        <p><b><?php echo $row["ORDER_ID"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>CUSTOMER ID</label>
                        <p><b><?php echo $row["CUSTOMER_ID"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>DRINK ID</label>
                        <p><b><?php echo $row["DRINK_ID"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>ORDER DATE</label>
                        <p><b><?php echo $row["ORDER_DATE"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>ORDER TYPE</label>
                        <p><b><?php echo $row["ORDER_TYPE"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>QUANTITY</label>
                        <p><b><?php echo $row["ORDER_QUANTITY"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>TOTAL PRICE</label>
                        <p><b><?php echo $row["TOTAL_PRICE"]; ?></b></p>
                    </div>
                    <p><a href="orders.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>