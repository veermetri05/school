<?php
session_start();
include_once '../../dbh.php';
$class = $_SESSION['class'];
if (isset($_POST['submit'])) {
  $complaint_id = $_POST['clicked'];
  $query = "SELECT * FROM complaint_$class WHERE id='$complaint_id';"; //You don't need a ; like you do in SQL
  $result = mysqli_query($conn, $query);

  if($row = mysqli_fetch_array($result)){
    echo ' <div class="alert alert-info">
            <strong>From:</strong> '.$row['from'].' <br>
            <strong>Subject:</strong> '.$row['subject'].' <br>
          </div>
          <div class="alert alert-warning">
            <strong>Complaint:</strong> <p>'.$row['complaint'].'</p>
          </div>';
  }
}
 ?>
