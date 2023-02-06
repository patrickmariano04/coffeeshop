<?php 
$profpic = "images/bg.jpg";
 ?>

<!DOCTYPE html>
 <html>
 <head>
     <title>Update Customer</title>
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
                
                $sql = "SELECT * FROM customers WHERE customer_id = ?";
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "s", $param_id);
                    
                    $param_id = $id;
                    
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
                
            }  else{
                header("location: error.php");
                exit();
            }



?>


 <div class="register-page">
  <div class="form">
    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" class="customer2-form">
     <input type="text" name="fname" value="<?php echo $fname; ?> "><br/>
     <input type="text" name="lname" value="<?php echo $lname; ?>"><br/>
     <input type="text" name="id" value="<?php echo $id; ?>"><br/>
     <input type="text" name="street" value="<?php echo $street; ?>" ><br/>
     <input type="text" name="city" value="<?php echo $city; ?>" ><br/>
     <input type="number" name="phone" value="<?php echo $phone; ?>" ><br/>
     <button>update</button>
    </form>
  </div>
</div>


 </body>
 </html>

 <?php


 $fname = $lname = $street = $city = $phone = $id ="";
 $fname_err = $lname_err = $street_err = $city_err = $phone_err = $id_err="";
 if($_SERVER["REQUEST_METHOD"] == "POST"){
     
     if(isset($_POST["id"]) && !empty($_POST["id"])){
         $id = $_POST["id"];
         
         $input_fname = trim($_POST["fname"]);
         if(empty($input_fname)){
             $fname_err = "Please enter first name.";
         } elseif(!filter_var($input_fname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
             $fname_err = "Please enter a valid name.";
         } else{
             $fname = $input_fname;
         }
         
         $input_lname = trim($_POST["lname"]);
         if(empty($input_lname)){
             $lname_err = "Please enter lastname.";     
         } else{
             $lname = $input_lname;
         }
         
         $input_id = trim($_POST["id"]);
          if(empty($input_id)){
             $id_err = "Please enter ID number.";     
         } else{
             $id = $input_id;
         }
     
         $input_street = trim($_POST["street"]);
          if(empty($input_street)){
             $street_err = "Please enter street.";     
         } else{
             $street = $input_street;
         }
         $input_city = trim($_POST["city"]);
          if(empty($input_city)){
             $city_err = "Please enter city.";     
         } else{
             $city = $input_city;
         }
         
         $input_phone = trim($_POST["phone"]);
          if(empty($input_phone)){
             $phone_err = "Please enter phone.";     
         } else{
             $phone = $input_phone;
         }
         
        
     
         if(empty($fname_err) && empty($lname_err) && empty($id_err) && empty($street_err) && empty($city_err) && empty($phone_err)){
             $sql = "UPDATE CUSTOMERS SET FNAME=?, LNAME=?, CUSTOMER_ID=?, STREET=?, CITY=?, PHONE=? WHERE CUSTOMER_ID=$id";
             
             if($stmt = mysqli_prepare($link, $sql)){
                 mysqli_stmt_bind_param($stmt, "ssssss", $param_fname, $param_lname, $param_id_num, $param_street, $param_city, $param_phone);
                  $param_fname = $fname;
                  $param_lname = $lname;
                  $param_id_num = $id;
                  $param_street = $street;
                  $param_city= $city;
                  $param_phone = $phone;
     
                 if(mysqli_stmt_execute($stmt)){
                     header("location: customers.php");
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