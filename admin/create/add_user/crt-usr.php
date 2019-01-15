<?php
include_once '../../../dbh.php';
if (isset($_POST['submit'])) {
$usr = $_POST['usr'];
$pwd = $_POST['pwd'];

if (!empty($usr) || !empty($pwd)) {
  $sql = "SELECT * FROM teacher WHERE usr='$usr'" ;
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck > 0) {
        $response = array("success"=> 'false', "error"=> 'User Already Exits');
        $response = json_encode($response);
        echo $response;
} else {
  $sql = "INSERT INTO teacher (usr, pwd) VALUES ('$usr', '$pwd');";
  mysqli_query($conn, $sql);
  $response = array("success"=> 'true');
  $response = json_encode($response);
  echo $response;
 }
}
}

 ?>
