<!DOCTYPE html>
<html lang="en" >
<?php
session_start();

?>
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

<?php

include "admindb.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($db,"select * from tblproduct where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $price = htmlspecialchars($_POST['price']);
	
    $edit = mysqli_query($db,"update tblproduct set price='$price' where id='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:editProduct.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>
<div class="container">
<div class="d-flex justify-content-center align-items-center">
<h3>Update New Price:</h3>
<div class="row">
<form class="form-horizontal" method="POST">
  <input type="text" step="0.01" name="price" value="<?php echo $data['price'] ?>" placeholder="Enter New Price" Required>
  <input type="submit" name="update" value="Update">
</form>
</div>
</div>
</div>
</body>
</html>
