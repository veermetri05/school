<?php
  include_once '../../../dbh.php';
  if (isset($_POST['option'])) {
    $option = $_POST['option'];
    $option1 = $_POST['option1'];
    $cls_num = array("nursery"=>"1", "LKG"=>"2", "UKG"=>"3", "1st"=>"4", "2nd"=>"5", "3rd"=>"6", "4th"=>"7", "5th"=>"8", "6th"=>"9", "7th"=>"10", "8th"=>"11", "9th"=>"12", "10th"=>"13", "11th"=>"14", "12th"=>"15");
    $num_cls = array_flip($cls_num);
    $from = $cls_num[$option];
    $to = $cls_num[$option1];
    $tables = ($to - $from) + 1;
    $extension = array("tables_","complaint_","homework_","periods_","leave_request_","notice_","attendance_","exam_","marks_");
    for ($i=0; $i < 9 ; $i++) {
      $prefix = $extension[$i];
      if ($prefix == 'tables') {
        $prefix = '';
      }
      for ($x=0; $x < $tables ; $x++) {
        $val1 = $from + $x;
        $val = $num_cls[$val1];
        $sql = "CREATE TABLE ".$prefix.$val." (usr varchar(255),pwd varchar(255))";
        mysqli_query($conn, $sql);
        $sql = "SELECT * FROM class WHERE class='$val'" ;
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if ($resultCheck > 0) {
            
          } else {
            $sql = "INSERT INTO class (class) VALUES ('$val')";
            mysqli_query($conn, $sql);
          }
        }
    }
    $response = array("success"=>"true");
    $response = json_encode($response);
    echo $response;
  }
 ?>
