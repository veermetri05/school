<?php
session_start();
include '../dbh.php';
 if (isset($_POST['submit'])) {
   $usr = $_POST['usr'];
   $pwd = $_POST['pwd'];
   $class = 'tables_'.$_POST['class'];
   $_SESSION['class_student'] = $_POST['class'] ;
   $sql = "SELECT * FROM $class WHERE usr='$usr'";
       $result = mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);

       if ($resultCheck < 1) {
         $response = array("success"=> 'false');
         $response = json_encode($response);
         echo $response;
       } else {
         if ($row = mysqli_fetch_assoc($result)){
           if ($row['pwd'] == $pwd) {
             $_SESSION['student_name'] = $row['usr'] ;
             $class = $_POST['class'];
             $sql = "SELECT * FROM class WHERE class='$class'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                      if ($row = mysqli_fetch_assoc($result)){
                        $_SESSION['student_incharge'] = $row['incharge'] ;
                      }
               $response = array("success"=> 'true');
               $response = json_encode($response);
               echo $response;
           }

           else {
             $response = array("success"=> 'false');
             $response = json_encode($response);
             echo $response;
           }
         }
       }
  } else {
echo "Invalid Call";
  }

 ?>
