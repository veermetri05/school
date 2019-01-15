<?php
  if ($_POST['name'] == 'veer') {
    $response = array("success"=> 'true');
    $response = json_encode($response);
    echo $response;
  }
 ?>
