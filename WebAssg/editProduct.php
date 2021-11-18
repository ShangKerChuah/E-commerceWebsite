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

<div class="container-fluid d-flex justify-content-center align-items-center">


<div class="row">
<h1>Product Details</h1>
<table border="2">
  <tr>
    <td><h4>ProductID.</h4></td>
    <td><h4>Name</h4></td>
    <td><h4>Price</h4></td>
    <td><h4>Edit</h4></td>
    <td><h4>Delete</h4></td>
  </tr>

<?php
require_once("admindb.php");
// Using database connection file here

$records = mysqli_query($db,"select * from tblproduct"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>

  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['price']; ?></td>    
    <td><a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></td>
    <td><a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
  </tr>	
<?php
}
?>
</div>
</div>
</table>
</body>


</html>