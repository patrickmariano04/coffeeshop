<?php 
$profpic =  "images/bg.jpg";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop | Contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/bootstrap.css">
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

	.container{
		padding: 10%;
		color: white;
		font-size: 1.5em;
	}

	#phone{
		color: white;
		margin: -13% 0% 0% 40% ;
	}

	#email{
		color: white;
		margin: -13% 0% 0% 70% ;
	}
    </style>

</head>
<body>
    <header>
        <div class="logo"><h1>Coffee Shop</h1></div>
            <ul>
                <li><a href="index-guest.php">Home</a></li>
                <li><a href="menu-guest.php">Menu</a></li>
                <li><a href="about-guest.php">About</a></li>
                <li><a href="contact-guest.php">Contact</a></li>
                <li><a href="login.php">Sign In</a></li>
            </ul>

    </header>
	<div class="container">
    <div class="content">
      
      <div class="left-side">
        <div class="address details">
		
          <div class="topic">Address</div>
          <div class="text-one">Holy Angel University</div>
          <div class="text-two">Angeles City, Pampanga</div>
        </div>

        <div id="phone">
			<div class="topic">Phone</div>
			<div class="text-one">(045) 9004421</div>
			<div class="text-two">(045) 9000693</div>
        </div>

        	<div id="email">
                  <div class="topic">Email</div>
          <div class="text-one">Hau@gmail.com</div>
          <div class="text-two">cictdean@hau.edu.ph</div>
        </div>
      </div>

			
 </body>
 </html>
