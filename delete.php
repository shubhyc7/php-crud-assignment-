<?php
  require("config.php");
  
  if(!empty($_GET['id'])){
    $id = $_GET['id'];
    
    $sql ="DELETE FROM STUDENT WHERE STUDENT_NO =$id";
    if (mysqli_query($con, $sql)) {
      header("Location:index.php?action=delete");
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($con);
    }
  }
?>

