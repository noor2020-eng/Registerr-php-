<?php
//connect to // Db
$conn = mysqli_connect('localhost', 'root', '', 'users');

//check connections
if(!$conn){
  echo 'connections error' . mysqli_connect_error();
}
?>