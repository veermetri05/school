<?php
session_start();
include_once '../../dbh.php';
$class = $_SESSION['class_student'];
if (isset($_POST['submit'])) {
  $complaint_id = $_POST['clicked'];
  $query = "SELECT * FROM homework_$class WHERE id='$complaint_id';"; //You don't need a ; like you do in SQL
  $result = mysqli_query($conn, $query);

  if($row = mysqli_fetch_array($result)){
    echo ' <div class="alert alert-info">
            <strong>Date:</strong> '.$row['date'].'-'.$row['month'].'-'.$row['year'].' <br>
          </div>
          <div class="alert alert-warning">
            <strong>Homework:</strong> <p>'.$row['homework'].'</p>
          </div>';
  }
}
 ?>
