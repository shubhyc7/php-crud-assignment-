<?php
  require("config.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CRUD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    
    <div class=container>

      <h1>STUDENT RECORDS</h1>

      <?php 
      if(!empty($_GET['action'])) {
           
          $action = $_GET['action'];
        
           if($action == 'add'){
             echo "<div class='alert alert-success alert-dismissible'>New Student Added Successfully <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

          }
           
           if($action == 'edit'){
             echo "<div class='alert alert-success alert-dismissible'> Student Updated Successfully <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
           }

           if($action == 'delete'){
             echo "<div class='alert alert-danger alert-dismissible'>Student Deleted Successfully <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
           }
        }
      ?>
      
      
      <h1 class="text-right"> <a href="action.php" class="btn btn-success">Add New +</a></h1>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>STUDENT_NO </th>
            <th>STUDENT_NAME</th>
            <th>STUDENT_DOB</th>
            <th>STUDENT_DOJ</th>
            <th>EDIT</th>
            <th>DELETE</th>
          </tr>
        </thead>

        <tbody>

        <?php 
          $sql = 'SELECT * FROM STUDENT';
          $data = mysqli_query($con,$sql);
          $no =1;
          while($row = mysqli_fetch_assoc($data)){
        ?> 
          
          <tr>
            <td> <?php echo $no;?> </td>
            <td> <?php echo $row['STUDENT_NO'];?> </td>
            <td> <?php echo $row['STUDENT_NAME'];?> </td>
            <td> <?php echo date("d-m-Y", strtotime($row['STUDENT_DOB']));?> </td>
            <td> <?php echo date("d-m-Y", strtotime($row['STUDENT_DOJ']));?> </td>
            <td> <a href="action.php?id=<?php echo $row['STUDENT_NO'];?>" class="btn btn-info"> Edit </a> </td>
            <td> <a href="delete.php?id=<?php echo $row['STUDENT_NO'];?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"> Delete </a></td>
          </tr>

        <?php
          $no++; 
          }
        ?>
        </tbody>

      </table>
    </div>

  </body>
</html>
