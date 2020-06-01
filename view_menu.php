<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: customer_login.php");
    }
  include 'classes/database.php';
  include 'classes/UserFactory.php';

  $instance = Database::getInstance();
  $conn = $instance->getConnection();
  $user = new UserFactory($conn);
  $customer = $user->setUser('Customer'); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Menu</title>
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" type="text/css" href="css/view_menu.css">
</head>
<body>
  <div class="navbar">
  <a href="home.php">Home</a>
  <a href="view_menu.php">Menu</a>
  <?php

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
<?php
if($_SESSION['username'])
{
  $stmt = $customer->view_menu();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
      ?>
      
      <div class="item">
        <img src="<?php echo $row['img_path'];?>" width="100%" height="100px">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="content">
        <p class="name"><?php echo $row['food_name'] . ' ';?></p>
        <p class="price"><?php echo $row['price'] . ' EGP';?></p>
        <p><?php echo $row['description'];?></p>
        <label>Quantity: </label>
        <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> <br><br>
        <input type="hidden" name="food_name" value="<?php echo $row['food_name'];?>">
        <input type="hidden" name="price" value="<?php echo $row['price'];?>">
        <button class="add" type="submit" name="add">Add to cart</button>

      </div>

</form>
    
      </div>
      
<?php      
    
  }
}

?>

<footer class="footer">
  <br>
  <p> Food Delivery | &copy All Rights Reserved </p>
  <br>
  </footer>

</body>
</html>