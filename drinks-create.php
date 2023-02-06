<?php 
include "authenticate.php";
$profpic = "images/bg.jpg";
 ?>

<!DOCTYPE html>
 <html>
 <head>
     <title>Create Drink</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/order-form.css">
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
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        

        $drink = $_POST['drink'];
        if(empty($drink)){
          echo "<script>alert('Please enter a drink name');</script>";
          echo "<script>window.location.href = 'drinks-create.php'</script>"; 
        } 
        $size = $_POST['size'];
        if($size == ""){
          echo "<script>alert('Please select drink size');</script>";
          echo "<script>window.location.href = 'drinks-create.php'</script>"; 
        } 
        $price = $_POST['price'];
        if(empty($drink)){
          echo "<script>alert('Please enter a drink price');</script>";
          echo "<script>window.location.href = 'drinks-create.php'</script>"; 
        } 
        $query = "INSERT INTO drinks(drink_name, drink_size, drink_price) VALUES('$drink', '$size', '$price')";
        $result = mysqli_query($link,$query);

        if ($result) {
            echo "<script>alert('You have added a new drink');</script>"; 
            echo "<script>window.location.href = 'drinks.php'</script>"; 
        }
    }
    else{
  ?>


<div class="register-page">

      <div class="form">
        <form method="post" class="register-form">
        <div class="form-group">
        <div class="form-group">
          <label for="exampleSelect1" class="form-label mt-4">Drink Name</label>
          <input type="text" name="drink"></input>
        <div class="form-group">
          <label for="exampleSelect1" class="form-label mt-4">Size</label>
          <select class="form-select" id="exampleSelect1" name="size">
          <option value="">--Select Size--</option>
            <option value="Small">Small</option>
            <option value="Regular">Regular</option>
            <option value="Large">Large</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleSelect1" class="form-label mt-4">Price</label>
          <input type="float" min="1" placeholder="0.00" name="price"></input>
        </div>
        
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="Reset" class="btn btn-primary">Clear</button>
      </form>
  </div>
</div>


 <?php 
}
  ?>

 </body>
 </html>