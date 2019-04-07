<?php
session_start();
if (isset($_SESSION)) {
  session_destroy();
}
session_start();
include '../dbh.php';
 if (isset($_POST['submit'])) {
   $usr = $_POST['usr'];
   $pwd = $_POST['pwd'];

   $sql = "SELECT * FROM teacher WHERE usr='$usr'";
       $result = mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);

       if ($resultCheck < 1) {
         $response = array("success"=> 'false');
         $response = json_encode($response);
         echo $response;
       } else {
          if ($row = mysqli_fetch_assoc($result)){
           if ($row['pwd'] == $pwd) {

                      $sql = "SELECT * FROM class WHERE incharge='$usr'";
                      				$result = mysqli_query($conn, $sql);
                      				$resultCheck = mysqli_num_rows($result);

                      					if ($row = mysqli_fetch_assoc($result)){
                                 $_SESSION['class'] = $row['class'] ;
                                 $_SESSION['incharge_class'] = $row['incharge'] ;
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
