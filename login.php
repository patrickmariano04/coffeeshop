<?php 
$profpic = "images/bg.jpg";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log-in Page</title>
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
                <li><a href="registration.php">Sign Up</a></li>
            </ul>
    </header>
    <?php
        include 'config.php';
        session_start(); 

        if (isset($_POST['username'])) 
        {
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($link,$username);
            if(empty($username)){
                echo "<script>alert('Please enter Username');</script>";
                echo "<script>window.location.href = 'login.php'</script>"; 
              } 
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($link,$password);
            if(empty($password)){
                echo "<script>alert('Please enter Password');</script>";
                echo "<script>window.location.href = 'login.php'</script>"; 
              } 
            
            $query = "SELECT * FROM users WHERE username='$username' and password='".md5($password)."'";
            $result = mysqli_query($link,$query) or die(mysql_error());

            $rows = mysqli_num_rows($result);

            if ($rows==1) {
                $_SESSION['username'] = $username;
                header("Location: index.php");
            }
            else
            {
                echo "<script>alert('Username/password is incorrect');</script>"; 
                echo "<script>window.location.href = 'login.php'</script>"; 
            }

        }
        else
        {
     ?>

<div class="login-page">
  <div class="form">
    <form method="post" action="" class="login-form">
      <input type="text" name="username" placeholder="Username"/>
      <input type="password" name="password" placeholder="Password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="registration.php">Create an account</a></p>
    </form>
  </div>
</div>

    <?php 
    }
     ?>
</body>
</html>