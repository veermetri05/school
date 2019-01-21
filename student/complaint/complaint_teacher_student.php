<?php
session_start();
include_once '../../dbh.php';
$class = $_SESSION['class_student'];
function errorback() {
    header("Location: ../");
}
if (isset($_POST['submit'])) {
  $complaint = mysqli_real_escape_string($conn, $_POST['complaint']);
  $subject = mysqli_real_escape_string($conn, $_POST['tsub']);
  $student = $_SESSION['student_name'];
  $incharge = $_SESSION['student_incharge'];
  $year = date("Y");
  $date = date("d");
  $month = date("m");
  if (!empty($complaint)) {
    $sql = "INSERT INTO complaint_$class (`from`, `to`, subject, complaint, date, month, year) VALUES ('$student', '$incharge', '$subject', '$complaint', '$date', '$month', '$year');";
    mysqli_query($conn, $sql);
    $response = array("success"=>"true");
    $response = json_encode($response);
    echo $response;
  } else {
    errorback();
  }
} else {
errorback();
}
 ?>
