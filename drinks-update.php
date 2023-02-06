<?php 
$profpic = "images/bg.jpg";
 ?>

<!DOCTYPE html>
 <html>
 <head>
     <title>Update Drink</title>
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
                
                $sql = "SELECT * FROM drinks WHERE drink_id = ?";
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "s", $param_id);
                    
                    $param_id = $id;
                    
                    if(mysqli_stmt_execute($stmt)){
                        $result = mysqli_stmt_get_result($stmt);
            
                        if(mysqli_num_rows($result) == 1){
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            
                            $drink = $row["DRINK_NAME"];
                            $size = $row["DRINK_SIZE"];
                            $id = $row["DRINK_ID"];
                            $price = $row["DRINK_PRICE"];
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
    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" class="drinks-form">
     <input type="text" name="drink" value="<?php echo $drink; ?> " placeholder="Drink Name"/><br/>
     <input type="text" name="size" value="<?php echo $size; ?>"><br/>
     <input type="text" name="id" value="<?php echo $id; ?>"><br/>
     <input type="text" name="price" value="<?php echo $price; ?>" ><br/>
     <button>update</button>
    </form>
  </div>
</div>
<?php
    $drink = $size = $price = $id ="";
    $drink_err = $size_err = $price_err = $id_err ="";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(isset($_POST["id"]) && !empty($_POST["id"])){
            $id = $_POST["id"];
            
            
            $input_drink = trim($_POST["drink"]);
            if(empty($input_drink)){
                $drink_err = "Please enter drink name.";     
            } else{
                $drink = $input_drink;
            }
            
            $input_id = trim($_POST["id"]);
             if(empty($input_id)){
                $id_err = "Please enter ID number.";     
            } else{
                $id = $input_id;
            }
        
            $input_size = trim($_POST["size"]);
             if($input_size == ""){
                $size_err = "Please enter size.";     
            } else{
                $size = $input_size;
            }
            $input_price = trim($_POST["price"]);
             if(empty($input_price)){
                $price_err = "Please enter price.";     
            } else{
                $price = $input_price;
            }
            
            
           
        
            if(empty($drink_err) && empty($size_err) && empty($id_err) && empty($price_err)){
                $sql = "UPDATE DRINKS SET DRINK_NAME=?, DRINK_SIZE=?, DRINK_ID=?, DRINK_PRICE=? WHERE DRINK_ID=$id";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "ssss", $param_drink, $param_size, $param_id_num, $param_price);
                     $param_drink = $drink;
                     $param_size = $size;
                     $param_id_num = $id;
                     $param_price = $price;
        
                    if(mysqli_stmt_execute($stmt)){
                        header("location: drinks.php");
                        exit();
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                 
                mysqli_stmt_close($stmt);
            }
            
            mysqli_close($link);
        } 
    }
        ?>

 </body>
 </html>