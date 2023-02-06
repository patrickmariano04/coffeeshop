<?php 
include 'authenticate.php';
$profpic = "images/bg.jpg";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
 </head>

 <body>
 <!DOCTYPE html>
<html lang="en">
    <head>
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


	<div class="row">
        <div class="col">
			<p>Now you can feel the Energy</h6>
			<h1>
			Start your day with <br>
			a black Coffee, <?php echo $_SESSION['username']; ?> 				
			</h1>
			<a href="drinks.php" class="button">View Drinks</a>
            <a href="customers.php" class="button">View Customers</a>
            <a href="orders.php" class="button">View Orders</a>
        </div>
	</div>
			
 </body>
 </html>