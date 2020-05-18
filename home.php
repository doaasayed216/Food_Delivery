<?php
  if(isset($_POST['menu']))
  {
     header("Location: view_menu.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
</head>
<body>
    <div class="navbar">
    <a href="user-dashboard.php">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact us</a>
    <a href="view_menu.php">Menu</a> 
    <?php
    session_start();
    if(isset($_SESSION['username']))
    {
      ?>
      <div class="dropdown">
      <a href="my_cart.php">Cart</a>
      <a href="customer_signout.php">Sign out</a>
       </div>
      <?php
      }
      else{
        ?>
        <div class="dropdown">
          <a href="customer_signout.php">Login</a>
       </div>
       <?php
      }
      ?>
</div>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method='POST'>
<div class="sub1">
  <h1>Food Delivery</h1>
  <button type="submit" name="menu">Order now</button>
</div>
</form>
<div class="sub2" id="about">
      <h1>About us</h1>
      <div class="about">
      <h4>Who we are</h4>
      <p>Food Delivery is Egyptian foodies favorite food ordering website. We put thousands of top international and local foods into your hands. Find, sort, filter, rate, and order all with a couple easy taps. Food Delivery will take care of the rest.</p>
      <h4>What we do</h4>
      <p>Food Delivery is Egypt's biggest food ordering services and operates in more than 25 cities. Customers can order from more than 2,000 items with a couple taps, and Food Delivery will manage the rest. </p>
      <h4>Start your experience</h4>
      <p>Use our GPS technology to locate yourself, choose your favorite meal, and checkout. Food Delivery allows you to pay however you prefer and save your delivery details for easy reordering.</p>
    </div>
      <img src="images/img2.jpg" width="40%" height="100%">
</div>
<div class="sub3" id="contact">
  <h1>Contact us</h1>
  <form class="register-form" role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method ='POST'>
          <input type="text" name="username" placeholder="username" autocomplete="off" required><br>
          <input type="email" name="email" placeholder="email" autocomplete="off" required><br>
          <input type="text" name="contact" placeholder="phone number" autocomplete="off" required><br>    
          <textarea name="comment" placeholder="Type your comment here"></textarea><br>
          <button type="submit">Submit</button>    
    </form>  
</div>
<footer class="footer">
  <br>
  <p> Food Delivery | &copy All Rights Reserved </p>
  <br>
</footer>
</body>
</html>