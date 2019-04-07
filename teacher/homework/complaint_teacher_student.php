<?php
session_start();
include_once '../../dbh.php';
$class = $_SESSION['class'];
function errorback() {
    header("Location: ../");
}
if (isset($_POST['submit'])) {
  $homework = mysqli_real_escape_string($conn, $_POST['complaint']);
  $incharge = $_SESSION['incharge_class'];
  $year = date("Y");
  $date = date("d");
  $month = date("m");
  if (!empty($homework)) {
    $sql = "INSERT INTO homework_$class (homework, `date`, month, year) VALUES ('$homework', '$date', '$month', '$year');";
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
