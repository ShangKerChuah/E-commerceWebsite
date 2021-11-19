<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
<div class="topnav">
 <img  style="padding-top:10px"src="image/FoodZilla.png"/>
  <div class="topnav-right">
  <a href="index.php">Home</a>
  <a href="aboutUs.php">About Us</a>
    <?php 
  session_start();
  if (isset($_SESSION['name']) && ($_SESSION['userid'] == '1'))
  {
    $name = htmlspecialchars($_SESSION['name']);
    $id = htmlspecialchars($_SESSION['userid']);
	 
    echo " <a href='editProduct.php'>EditProduct</a> ";

  }
  
  else echo "  <a href='product.php'>Products</a> ";
  ?>

  <a href="faq.php">FaQs</a>
  <?php 
  session_start();
  if (isset($_SESSION['name']))
  {
    $name = htmlspecialchars($_SESSION['name']);

    echo " <a href='logout.php'>Signout</a> ";
  }
  
  else echo "  <a href='login.php'>Login</a> ";
  ?>
  <a class="shoppingcart" href="cart.php">
  <img width="23px" height="20px "src="image/cart1.png" >
  </a>
  </div>
  </div>


</body>
</html>


