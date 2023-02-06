<?php 
include "authenticate.php";
$profpic = "images/bg.jpg";
 ?>

<!DOCTYPE html>
 <html>
 <head>
     <title>Coffee Shop | Order</title>
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
 
      $username = $_SESSION['username'];
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $customer_id = $_POST['customer_id'];
        if(empty($customer_id)){
          echo "<script>alert('Please enter customer ID');</script>";
          echo "<script>window.location.href = 'order.php'</script>"; 
        } 
        $drink = $_POST['drink'];
        if($drink == ""){
          echo "<script>alert('Please select a drink');</script>";
          echo "<script>window.location.href = 'order.php'</script>"; 
        } 
        $size = $_POST['size'];
        if($size == ""){
          echo "<script>alert('Please select drink size');</script>";
          echo "<script>window.location.href = 'order.php'</script>"; 
        } 
        $order_type = $_POST['claim'];
        if($size == ""){
          echo "<script>alert('Please select claim type');</script>";
          echo "<script>window.location.href = 'order.php'</script>"; 
        } 
        $quantity = $_POST['quantity'];
        

        $sql_query = "SELECT DRINK_PRICE, DRINK_ID from DRINKS where DRINK_NAME like '$drink' and DRINK_SIZE like '$size';";
        $result = mysqli_query($link, $sql_query);

        if(mysqli_num_rows($result) > 0 ){

        $row = mysqli_fetch_assoc($result);
        $price = $row["DRINK_PRICE"];
        $drink_id = $row["DRINK_ID"];
      }

      

        $total_price = $price * $quantity;
      
        $query = "INSERT INTO orders(customer_id, order_date, order_type) VALUES ('$customer_id', CURDATE(), '$order_type')";
        $result = mysqli_query($link,$query);

        
        $query = "INSERT INTO order_line( drink_id, order_quantity, total_price) VALUES ('$drink_id', '$quantity', '$total_price')";
        $result = mysqli_query($link,$query);

        if ($result) {
            echo "<script>alert('You have successfully ordered');</script>"; 
            echo "<script>window.location.href = 'orders.php'</script>"; 
        }
    }
    else{
  ?>


<div class="register-page">

      <h1 class="legend">Make an Order</h1>
      <div class="form">
        <form method="post" class="register-form">
        <div class="form-group">
        <div class="form-group">
          <label for="exampleSelect1" class="form-label mt-4">CUST ID</label>
          <input type="number" min="1"  name="customer_id"></input>
        </div>
          <label for="exampleSelect1" class="form-label mt-4">Coffee</label>
          <select class="form-select" id="exampleSelect1" name="drink">
            <option value="">--Select Coffee--</option>
            <option value="Cappuccino">Cappuccino</option>
            <option value="Americano">Americano</option>
            <option value="Espresso">Espresso</option>
            <option value="Macchiato">Macchiato</option>
            <option value="Mocha">Mocha</option>
            <option value="Coffee Latte">Coffee Latte</option>
            <option value="Piccolo Latte">Piccolo Latte</option>
            <option value="Ristretto">Ristretto</option>
            <option value="Affogato">Affogato</option>
          </select>
        </div>
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
          <label for="exampleSelect1" class="form-label mt-4">Order Type</label>
          <select class="form-select" id="exampleSelect1" name="claim">
          <option value="">--Select Claim--</option>
            <option value="Pick-Up">Pick-Up</option>
            <option value="Delivery">Delivery</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleSelect1" class="form-label mt-4">Quantity</label>
          <input type="number" min="1" value="1" name="quantity"></input>
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