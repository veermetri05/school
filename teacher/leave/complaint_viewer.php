<?php
session_start();
include_once '../../dbh.php';
$class = $_SESSION['class'];
if (isset($_POST['submit'])) {
  $complaint_id = $_POST['clicked'];
  $query = "SELECT * FROM leave_request_$class WHERE id='$complaint_id';"; //You don't need a ; like you do in SQL
  $result = mysqli_query($conn, $query);

  if($row = mysqli_fetch_array($result)){
    echo ' <div class="alert alert-info">
            <strong>From:</strong> '.$row['form'].' <br>
          </div>
          <div class="alert alert-warning">
            <strong>Leave:</strong> <p>'.$row['leave_text'].'</p>
          </div>';
  }
}
 ?>
