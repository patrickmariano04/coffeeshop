<?php 
$profpic = "images/bg.jpg";
 ?>

<!DOCTYPE html>
 <html>
 <head>
     <title>Update Orders</title>
    <link rel="stylesheet" href="css/login-register.css">
    <link rel="stylesheet" href="css/navbar.css">
    <style type="text/css">

        body {
        background-image: url('<?php echo $profpic;?>');
        background-repeat: no-repeat;
        background-size: 100%;
        }
        </style>
 </head>
 <body>
 <header>
        <div class="logo"><h1>Coffee Shop</h1></div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php">Sign Out</a></li>
            </ul>
    </header>

 <?php 
    include 'config.php';
    
            if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
                $id =  trim($_GET["id"]);
                
                $sql = "SELECT * FROM order_line WHERE order_id = ?";
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "s", $param_id);
                    
                    $param_id = $id;
                    
                    if(mysqli_stmt_execute($stmt)){
                        $result = mysqli_stmt_get_result($stmt);
            
                        if(mysqli_num_rows($result) == 1){
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            
                            $drink_id = $row["DRINK_ID"];
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
            }  else{
                header("location: error.php");
                exit();
            }
        
    


?>


 <div class="register-page">
  <div class="form">
    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" class="order-form">
    <input type="text" name="drink_id" value="<?php echo $drink_id; ?>"><br/>
     <input type="number" name="quantity" value="<?php echo $quantity; ?>"><br/>
     <input type="text" name="totalprice" value="<?php echo $totalprice; ?>" ><br/>

     <button>update</button>
    </form>
  </div>
</div>


 </body>
 </html>

 <?php
    $quantity = $drink_id= $totalprice="";
    $quantity_err = $drink_id_err= $totalprice_err="";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(isset($_POST["id"]) && !empty($_POST["id"])){
            $id = $_POST["id"];
            
            
            $input_drink_id = trim($_POST["drink_id"]);
             if(empty($input_drink_id)){
                $drink_id_err = "Please enter ID number.";     
            } else{
                $drink_id = $input_drink_id;
            }
        
            $input_quantity = trim($_POST["quantity"]);
             if(empty($input_quantity)){
                $quantity_err = "Please enter quantity.";     
            } else{
                $quantity = $input_quantity;
            }
            $input_totalprice = trim($_POST["totalprice"]);
             if(empty($input_totalprice)){
                $totalprice_err = "Please enter total price.";     
            } else{
                $totalprice = $input_totalprice;
            }

        
           
        
            if(empty($quantity_err) && empty($drink_id_err) && empty($totalprice_err)){
                $sql = "UPDATE ORDER_LINE SET DRINK_ID=?, ORDER_QUANTITY=?, TOTAL_PRICE=? WHERE ORDER_ID=$id";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "sss", $param_drink_id, $param_quantity, $param_totalprice);
                    $param_drink_id = $drink_id;
                    $param_quantity= $quantity;
                    $param_totalprice = $totalprice;
    
        
                    if(mysqli_stmt_execute($stmt)){
                        header("location: orders.php");
                        exit();
                    } else{
                        echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
                    }
                }
                 
                mysqli_stmt_close($stmt);
            }
            
            mysqli_close($link);
        } 
    }
?>