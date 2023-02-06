<?php 
$profpic = "images/bg.jpg";
 ?>

<!DOCTYPE html>
 <html>
 <head>
     <title>Create Customer</title>
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

   $fname = $lname = $street = $city = $phone = "";
  $fname_err = $lname_err = $street_err = $city_err = $phone_err = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
      $input_fname = trim($_POST["fname"]);
      if(empty($input_fname)){
        $fname_err = "Please enter first name.";  
          echo "<script>alert('Please enter first name');</script>";
      } elseif(!filter_var($input_fname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        echo "<script>alert('Please enter valid name');</script>";
      } else{
          $fname = $input_fname;
      }
      
      $input_lname = trim($_POST["lname"]);
      if(empty($input_lname)){
          $lname_err = "Please enter lastname.";  
          echo "<script>alert('Please enter last name');</script>";   
      } else{
          $lname = $input_lname;
      }
      
      
      $input_city= trim($_POST["city"]);
       if(empty($input_city)){
          $city_err = "Please enter city.";  
          echo "<script>alert('Please enter city');</script>";   
      } else{
          $city = $input_city;
      }
      
      $input_street = trim($_POST["street"]);
       if(empty($input_street)){
          $street_err = "Please enter street."; 
          echo "<script>alert('Please enter street');</script>";    
      } else{
          $street = $input_street;
      }
      
      
      $input_phone = trim($_POST["phone"]);
       if(empty($input_phone)){
          $phone_err = "Please enter phone.";     
          echo "<script>alert('Please enter phone');</script>";
      } else{
          $phone = $input_phone;
      }
        
      if(empty($fname_err) && empty($lname_err) && empty($street_err) && empty($city_err) && empty($phone_err)){

        $sql = "INSERT INTO customers (fname, lname, street, city, phone) VALUES (?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
          mysqli_stmt_bind_param($stmt, "sssss", $param_fname, $param_lname, $param_street, $param_city, $param_phone);
          
          $param_fname = $fname;
          $param_lname = $lname;
          $param_street = $street;
          $param_city = $city;
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
  ?>


 <div class="register-page">
  <div class="form">
    <form method="post" class="customer-form">
     <input type="text" name="fname" placeholder="First Name"/><br/>
     <input type="text" name="lname" placeholder="Last Name"/><br/>
     <input type="text" name="street" placeholder="Street"/><br/>
     <input type="text" name="city" placeholder="City"/><br/>
     <input type="number" name="phone" placeholder="Phone"/><br/>
     <button>create</button>
    </form>
  </div>
</div>


 </body>
 </html>