<?php 
include 'authenticate.php';
$profpic =  "images/bg.jpg";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop | Menu</title>
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


    <section class="menu-area section-gap" id="coffee">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">What kind of Coffee we serve for you</h1>
								<p class="mb-10">Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-menu" id="index.php">
								<div class="title-div justify-content-between d-flex">
									<h4>Cappuccino</h4>
								</div>
								<p>
								A sumptuous velvety texture and nuanced aroma are provided by a freshly extracted shot of espresso mixed with steamed whole milk and thick creamy froth. </br></br></br></br></br>
								</p>		
                <p class="order"><a href="order.php">Order</a></p>						
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Americano</h4>
								</div>
								<p>
								It's a shot of espresso topped with hot water.
								</br></br></br></br></br></br></br></br>
								</p>	
                <p class="order"><a href="order.php">Order</a></p>							
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Espresso</h4>
								</div>
								<p>
								A concentrated kind of coffee given in tiny, strong shots that serves as the foundation for a variety of coffee beverages. It’s created from the same beans as coffee, but it's thicker, stronger, and contains more caffeine. Espresso, on the other hand, has less caffeine per serving than coffee because it is often served in smaller portions.
								</p>
                <p class="order"><a href="order.php">Order</a></p>								
							</div>
						</div>	
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Macchiato</h4>
								</div>
								<p>
								"Macchiato" means "marked" or "stained" in Italian, and refers to a stained or marked coffee. The macchiato is an espresso coffee drink with a small amount of foamed or steamed milk on top to bring out the flavor of the espresso.
								</p>
                <p class="order"><a href="order.php">Order</a></p>								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Mocha</h4>
								</div>
								<p>
								Mocha is any coffee with chocolate flavoring, even if it's just some hot chocolate with a few shots of espresso blended in. </br></br></br></br>
								</p>
                <p class="order"><a href="order.php">Order</a></p>								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Coffee Latte</h4>
								</div>
								<p>
								Simply a shot or two of strong, flavorful espresso with steamed milk on top. Some people like to make the recipe with more syrup or espresso. Some argue that it is perfect in its current state.
								</br></br></br></p>
                <p class="order"><a href="order.php">Order</a></p>								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Piccolo Latte</h4>
								</div>
								<p>
								Lattes made with less milk are known as piccolos. They're either in their own cup, slightly larger than an espresso cup but smaller than a latte glass, or in a short macc topped up.
								</br></br></br></p>
                <p class="order"><a href="order.php">Order</a></p>								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Ristretto</h4>
								</div>
								<p>
								A short (limited) espresso shot is one in which the barista pulls only the first half of a full-length espresso shot. The same Starbucks® Espresso Roast used in full espresso shots is used in ristretto, but less hot water is passed through the grounds.
								</p>		
                <p class="order"><a href="order.php">Order</a></p>						
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Affogato</h4>
								</div>
								<p>
								A scoop of vanilla ice cream is topped with a warm shot of espresso in this classic Italian delicacy. Because "affogato" means "drown" in Italian, it is the poured espresso that gives this delicacy its name.
								</br></br></p>	
                <p class="order"><a href="order.php">Order</a></p>							
							</div>
						</div>															
					</div>
				</div>	
			</section>
			
 </body>
 </html>
