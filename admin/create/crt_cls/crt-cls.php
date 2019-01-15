<?php
  include_once '../../../dbh.php';
  session_start();
  if (isset($_POST['option'])) {
    $option = $_POST['option'];
    $option1 = $_POST['option1'];
    $cls_num = array("nursery"=>"1", "LKG"=>"2", "UKG"=>"3", "1st"=>"4", "2nd"=>"5", "3rd"=>"6", "4th"=>"7", "5th"=>"8", "6th"=>"9", "7th"=>"10", "8th"=>"11", "9th"=>"12", "10th"=>"13", "11th"=>"14", "12th"=>"15");
    $num_cls = array_flip($cls_num);
    $from = $cls_num[$option];
    $to = $cls_num[$option1];
    $tables = ($to - $from) + 1;
    $total_tables = $tables * 9;
    $workdn = 0 ;
    $extension = array("tables_","complaint_","homework_","periods_","leave_request_","notice_","attendance_","exam_","marks_");
    $data = array("(id int AUTO_INCREMENT NOT NULL PRIMARY KEY, usr varchar(255), pwd varchar(255))","(id int AUTO_INCREMENT NOT NULL PRIMARY KEY, from varchar(255), to varchar(255), complaint text, date varchar(255), month varchar(255), year varchar(255))","(id int AUTO_INCREMENT NOT NULL PRIMARY KEY, homework text, date varchar(255), month varchar(255), year varchar(255))","(id int AUTO_INCREMENT NOT NULL PRIMARY KEY,   monday varchar(255), tuesday varchar(255), wednesday varchar(255), thursday varchar(255), friday varchar(255), saturday varchar(255))","(id int AUTO_INCREMENT NOT NULL PRIMARY KEY, from varchar(255), to varchar(255), leave text, date varchar(255), month varchar(255), year varchar(255))","(id int AUTO_INCREMENT NOT NULL PRIMARY KEY, notice text, date varchar(255), month varchar(255), year varchar(255))","(id int AUTO_INCREMENT NOT NULL PRIMARY KEY, usr varchar(255), absent varchar(255), date varchar(255), month varchar(255), year varchar(255))","(id int
    AUTO_INCREMENT NOT NULL PRIMARY KEY, date varchar(255), month varchar(255), year varchar(255), subject varchar(255), syllabus varchar(255), term varchar(255))","(id int AUTO_INCREMENT NOT NULL PRIMARY KEY, usr varchar(255), subject varchar(255), marks varchar(255), term varchar(255))");
    for ($i=0; $i < 9 ; $i++) {
      $prefix = $extension[$i];
      $columns = $data[$i];
      for ($x=0; $x < $tables ; $x++) {
        $val1 = $from + $x;
        $val = $num_cls[$val1];
        $sql = "CREATE TABLE ".$prefix.$val.$columns;
        $percentage = $workdn++ ;
        mysqli_query($conn, $sql);
        $sql = "SELECT * FROM class WHERE class='$val'" ;
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if ($resultCheck > 0) {

          } else {
            $sql = "INSERT INTO class (class) VALUES ('$val')";
            mysqli_query($conn, $sql);
          }
          $send_per = ($workdn / $total_tables) * 100 ;
          $_SESSION['percentage'] = $send_per;
        }
    }
            $response = array("success"=>"true");
            $response = json_encode($response);
            echo $response;
  }
 ?>
