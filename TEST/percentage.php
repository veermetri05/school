<?php
session_start();
  if (isset($_POST['count'])) {
    $number = $_POST['count'];
    $abc = 81 ;
    for ($i=0; $i <= $abc ; $i++) {
      $percentage = ($i/$abc)*100;
      $_SESSION['percentage'] = $percentage ;
    }
  }
 ?>
