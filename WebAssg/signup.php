<!DOCTYPE html>
<?php 

  require_once 'SQL_login.php';

if(isset($_POST['username']) && isset($_POST['pwd'])){

      try
      {
        $pdo = new PDO($attr, $user, $pass, $opts);
      }
      catch (\PDOException $e)
      {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
      }
	
	// username and password sent from form and sanitise
	$myusername= sanitise($pdo,$_POST['username']);
	$mypassword=  sanitise($pdo,$_POST['pwd']);
        $mypassword     = password_hash($mypassword, PASSWORD_DEFAULT);
		$address=  sanitise($pdo,$_POST['address']);
        $email=  sanitise($pdo,$_POST['email']);
        $fullName=  sanitise($pdo,$_POST['full_name']);
		
		$validation = data_validation($_POST['username'], "/^[a-z\d_]{5,20}$/" , "username");
        $validation .= data_validation($_POST['email'],  "/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/" , "email");
        $validation .= data_validation($_POST['full_name'], "/.+/", "full Name");
        $validation .= data_validation($_POST['pwd'], '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/', "password- at least one letter, at least one number, and there have to be 6-12 characters");
 
if($validation==""){ 
	$query = "INSERT INTO $tbl_name(userid, name,address, email, login, pass) 
        VALUES(NULL,$fullName, $address, $email, $myusername, '$mypassword')"; //insert values into userdb database

        $result = $pdo->query($query);
        
	if (! $result){
		 die('Error: ' . mysqli_error());
	}
	header("location:login.php"); //after submit bring to this page
}
else{
	echo $validation;
}
}

   function sanitise($pdo, $str)
  {
    $str = htmlentities($str);
    return $pdo->quote($str);
  }	
  
function data_validation($data, $data_pattern, $data_type )
  {
    if (preg_match($data_pattern, $data)) {
    return "";
    } else {
    return " Invalid data for " .  $data_type . ";";
    }  
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

<div class="container col-sm-10 d-flex justify-content-center">

  <form method="post" class="form-horizontal"  style="padding-top:30px">
  <h2 class="header">Sign up</h2>
  
    <div class="form-group" style="padding-top:20px">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" placeholder="Enter email" name="email">
      </div>
    </div>
	
	 <div class="form-group" style="padding-top:20px">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control"  placeholder="Enter username" name="username">
      </div>
    </div>
	
    <div class="form-group" style="padding-top:20px">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control"  placeholder="Enter password" name="pwd">
      </div>
    </div>
	
	    <div class="form-group" style="padding-top:20px">
      <label class="control-label col-sm-12" for="pwd">Re-enter Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control"  placeholder="Re-enter password">
      </div>
    </div>
	
			    <div class="form-group" style="padding-top:20px">
      <label class="control-label col-sm-5" for="full_name">Full Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control"  placeholder="Enter your name" name="full_name">
      </div>
    </div>

	
	    <div class="form-group" style="padding-top:20px">
      <label class="control-label col-sm-5" for="address">Address:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control"  placeholder="Enter your address" name="address">
      </div>
    </div>
	


     <div class="form-group">
      <label class="control-label col-sm-12">Already have an account? <a href="login.php">Login here<a/></label>
    </div>
	
    <div class="form-group" style="padding-top:20px;">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
      </div>
	  </div>
	  </form>
  
</body>

<footer>

</footer>
</html>