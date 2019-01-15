<?php
  if (isset($_POST['submit'])) {
    include_once '../../../dbh.php';
    print_r ( $_POST['cls']);
    $cls = $_POST['cls'];
    print_r ( $_POST['inc']);
    $inc = $_POST['inc'];
    $lng_cls = count($cls);
    $lng_inc = count($inc);
    for ($i=0; $i < $lng_cls ; $i++) {
      $sql = "UPDATE class SET incharge='$inc[$i]' WHERE class='$cls[$i]' ";
      mysqli_query($conn, $sql);
      echo $i ;
    }
  }
 ?>
