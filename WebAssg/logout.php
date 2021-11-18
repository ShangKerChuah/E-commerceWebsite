<!DOCTYPE html>
<html lang="en" >
<head>
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Foodzilla | Home</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/style.css">
	<?php include_once 'navbar.php'?>

</head>
<body>
<div class="container">
<?php 
  session_start();

  if (isset($_SESSION['name']))
  {
    $name = htmlspecialchars($_SESSION['name']);

  
    destroy_session_and_data();
    
    echo "Thank you $name.";
    echo "You have logged out successfully. <br>";
    echo "Please <a href='login.php'>Click Here</a> to log in again.";
  }
  else echo "Please <a href='login.php'>Click Here</a> to log in.";
  
  function destroy_session_and_data()
{
   session_start();
   $_SESSION = array();
   setcookie(session_name(), '', time() - 2592000, '/');
   session_destroy();
}

?>
</div>
</body>
  

</html>