<?php
  require("config.php");
  
  if(!empty($_GET['id']))
  {
    $id = $_GET['id'];
    $sql ="SELECT * FROM STUDENT WHERE STUDENT_NO =$id";
    $result = mysqli_query($con, $sql);

    while($res = mysqli_fetch_array($result))
    {
      $STUDENT_NAME = $res['STUDENT_NAME'];
      $STUDENT_DOB = $res['STUDENT_DOB'];
      $STUDENT_DOJ = $res['STUDENT_DOJ'];
      $STUDENT_NO = $res['STUDENT_NO'];
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CRUD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>
  
  <body>

    <div class="container">
      
      <?php if(!empty($_GET['id'])){?>
      <h1>STUDENT EDIT</h1>
      <?php  } else {?>
      <h1>STUDENT ADD</h1>
      <?php } ?> 
      
      <h1 class="text-right"> <a href="index.php" class="btn btn-success">STUDENT RECORDS</a></h1>
      
      <form class="form-horizontal" action="" method="post">
        
        <input type="hidden"  name="STUDENT_NO" value='<?php echo (!empty($STUDENT_NO)) ? $STUDENT_NO : "";?>'>
        
        <div class="form-group">
          <label class="control-label col-sm-2">STUDENT NAME:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="STUDENT_NAME" placeholder="Enter Student Name" value='<?php echo (!empty($STUDENT_NAME)) ? $STUDENT_NAME : "";?>'>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">STUDENT DOB:</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" name="STUDENT_DOB" value='<?php echo (!empty($STUDENT_DOB)) ? $STUDENT_DOB : "";?>'>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">STUDENT DOJ:</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" name="STUDENT_DOJ" value='<?php echo (!empty($STUDENT_DOJ)) ? $STUDENT_DOJ : "";?>'>
          </div>
        </div> 
        
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
          </div>
        </div>
      </form>

    <?php 
        
        if(isset($_POST['submit']))
        {    
          $STUDENT_NAME = $_POST['STUDENT_NAME'];
          $STUDENT_DOB =  $_POST['STUDENT_DOB'];
          $STUDENT_DOJ =  $_POST['STUDENT_DOJ'];
          $STUDENT_NO =   $_POST['STUDENT_NO'];

          if(empty($STUDENT_NAME) || empty($STUDENT_DOB) || empty($STUDENT_DOJ)) 
          {
            if(empty($STUDENT_NAME)) {
              echo "<div class='alert alert-danger'>Please Enter Student Name</div>";
            }
            
            if(empty($STUDENT_DOB)) {
              echo "<div class='alert alert-danger'>Please Select Student DOB</div>";
            }
            
            if(empty($STUDENT_DOJ)) {
              echo "<div class='alert alert-danger'>Please Select Student DOJ</div>";
            }
          }
          
          else
          {
            if(!empty($STUDENT_NO)){
              $sql = "UPDATE STUDENT SET STUDENT_NAME='$STUDENT_NAME',STUDENT_DOB='$STUDENT_DOB',STUDENT_DOJ='$STUDENT_DOJ' WHERE STUDENT_NO=$STUDENT_NO";
              if (mysqli_query($con, $sql)) {
                  header("Location:index.php?action=edit");
              } else {
                  echo "Error: " . $sql . ":-" . mysqli_error($con);
              } 
            }
            else{
              $sql = "INSERT INTO STUDENT (STUDENT_NAME,STUDENT_DOB,STUDENT_DOJ) VALUES ('$STUDENT_NAME','$STUDENT_DOB','$STUDENT_DOJ')";
              if (mysqli_query($con, $sql)) {
                  header("Location:index.php?action=add");
              } else {
                  echo "Error: " . $sql . ":-" . mysqli_error($con);
              }
            }  
          }
        }
      
      ?>    

    </div>

  </body>
</html>
