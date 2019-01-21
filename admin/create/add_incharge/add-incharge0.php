<?php
  if (isset($_POST['submit'])) {
    include_once '../../../dbh.php';
    $cls = $_POST['cls'];
    $inc = $_POST['inc'];
    $lng_cls = count($cls);
    $lng_inc = count($inc);
    for ($i=0; $i < $lng_cls ; $i++) {
      $sql = "UPDATE class SET incharge='$inc[$i]' WHERE class='$cls[$i]' ";
      mysqli_query($conn, $sql);
    }
    $response = array("success" => 'true');
    $response = json_encode($response);
    echo $response;
  }
 ?>
