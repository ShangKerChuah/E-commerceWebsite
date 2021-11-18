<!DOCTYPE html>

<?php
  require_once 'SQL_login.php';

  try
  {
    $pdo = new PDO($attr, $user, $pass, $opts);
  }
  catch (\PDOException $e)
  {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }

if(isset($_POST['username']) && isset($_POST['pwd'])){
	
    $un_temp = sanitise($pdo,$_POST['username']);
    $pw_temp = sanitise($pdo,$_POST['pwd']);
    $query   = "SELECT * FROM userdb WHERE login=$un_temp";
    $result  = $pdo->query($query);

    if (!$result->rowCount()) echo("User not found.");


    $row = $result->fetch();
    $fn  = $row['name'];
    $un  = $row['login'];
    $pw  = $row['pass'];
	$id =  $row['userid'];

    //if (password_verify(str_replace("'", "", $pw_temp), $pw))
    if (password_verify( $pw_temp, $pw))
    {
      session_start();

      $_SESSION['name'] = $fn;
	  $_SESSION['userid'] = $id;
     
header("Location: product.php");
    }
    else echo("Invalid username/password combination");
  }
  else
  {

    echo ("");
  }

  function sanitise($pdo, $str)
  {
    $str = htmlentities($str);
    return $pdo->quote($str);
  }
?>
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
	<?php include_once 'navbar.php'?>
</head>
<body>
<div class="container col-sm-10 d-flex justify-content-center" >



  <form class="form-horizontal" method="post" action="login.php" style="padding-top:30px">
  <h2 class="header">Login</h2>
    <div class="form-group" style="padding-top:20px">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter your username" name="username">
      </div>
    </div>
    <div class="form-group" style="padding-top:20px">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" placeholder="Enter password" name="pwd">
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-10">Don’t  have an account yet? <a href="signup.php">Sign up now!<a/></label>
    </div>
    <div class="form-group" style="padding-top:20px;">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Login</button>
		</div>
      </div>
	    </form>
    </div>

</body>

<footer>
<div class="footer">
		Copyright &copy; 190407578 Chuah Shang Ker |&nbsp;Sunway's University |&nbsp;Privacy Policy
</div>
</footer>
</html>