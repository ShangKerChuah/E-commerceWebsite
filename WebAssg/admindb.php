<?php

$db = mysqli_connect("localhost","admin2","mypasswd","foodzilla");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>