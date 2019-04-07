<?php
session_start();
include_once '../../dbh.php';
$class = $_SESSION['class_student'];
function errorback() {
    header("Location: ../");
}
if (isset($_POST['submit'])) {
  $complaint = mysqli_real_escape_string($conn, $_POST['complaint']);
  $student = $_SESSION['student_name'];
  $incharge = $_SESSION['student_incharge'];
  $year = date("Y");
  $date = date("d");
  $month = date("m");
  if (!empty($complaint)) {
    $sql = "INSERT INTO leave_request_$class (`form`, `to`, leave_text, `date`, month, year) VALUES ('$student', '$incharge', '$complaint', '$date', '$month', '$year');";
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
