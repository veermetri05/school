<?php
session_start();
if (isset($_POST['submit'])) {
  include_once '../../dbh.php';
  $submit = $_POST['submit'];
  if (isset($_POST['present'])) {
    if (is_array($_POST['present'])) {
      $present = $_POST['present'] ;
    } else {
      $present = array();
    }
  } else {
    $present = array();
  }
  $real = array();
  $class = $_SESSION['class'];
  $sql="SELECT usr FROM tables_$class";
  $result=$conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      array_push($real, $row["usr"]);
    }
  }
  //$present, $real
  $absent = array_diff($real, $present);
  $cntabsent = count($absent);
  $tempray = array();
  for ($i=1; $i <= $cntabsent ; $i++) {
    array_push($tempray, $i);
  }
  $result = array_combine($tempray, $absent);
  $date = date('d');
  $month = date('m');
  $year = date('y');
  $resut = implode(", ", $result);
  //echo $resut;
  $sql="SELECT * FROM attendance_$class WHERE date=$date AND month=$month AND year=$year";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck < 1) {
    $output = array("success"=>"true", "uploded"=>"true");
    $myJSON = json_encode($output);
    echo $myJSON;
  } else {
    if ($submit == 'resubmit') {
      $sql="UPDATE attendance_$class SET ";
      mysqli_query($conn, $sql);
    } else {
      $output = array("success"=>"false", "uploded"=>"false");
      $myJSON = json_encode($output);
      echo $myJSON;
    }
  }
} else {
  header("Location: index.php");
}
 ?>
