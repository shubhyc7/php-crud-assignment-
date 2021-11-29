<?php
// localhost database

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'crud';

// remotemysql.com server

// $host = 'remotemysql.com';
// $user = 'wx2j0z2kNU';
// $pass = 'tZrl2EMoOV';
// $db = 'wx2j0z2kNU';

$con = mysqli_connect($host,$user,$pass,$db);

if(!$con){
  die('Database Not Connected : ' .mysqli_error());
}
// else{
//   echo "Database connected";
// }
?>