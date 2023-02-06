<?php 
$profpic = "images/bg.jpg";
 ?>

<!DOCTYPE html>
 <html>
 <head>
     <title>Registration</title>
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
                <li><a href="index-guest.php">Home</a></li>
                <li><a href="menu-guest.php">Menu</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Sign In</a></li>
            </ul>
    </header>

 <?php 
    include 'config.php';


    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($link,$username);
        if(empty($username)){
          echo "<script>alert('Please enter Username');</script>";
          echo "<script>window.location.href = 'registration.php'</script>"; 
        } 
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($link,$password);
        $password = md5($password);
        if(empty($password)){
          echo "<script>alert('Please enter Password');</script>";
          echo "<script>window.location.href = 'registration.php'</script>"; 
        } 
        
      
        $query = "INSERT INTO users(username, password) VALUES('$username', '$password')";
        $result = mysqli_query($link,$query);

        if ($result) {
            echo "<script>alert('You have successfully registered');</script>"; 
            echo "<script>window.location.href = 'login.php'</script>"; 
        }
    }
    else{
  ?>


 <div class="register-page">
  <div class="form">
    <form method="post" class="register-form">
    <input type="text" name="username" placeholder="Username"/> <br/>
     <input type="password" name="password" placeholder="Password"/> <br/>
     <button>create</button>
      <p class="message">Already registered? <a href="login.php">Sign In</a></p>
    </form>
  </div>
</div>

 <?php 
}
  ?>

 </body>
 </html>