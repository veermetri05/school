<?php
include '../dbh.php';
 if (isset($_POST['submit'])) {
   $usr = $_POST['usr'];
   $pwd = $_POST['pwd'];

   $sql = "SELECT * FROM head WHERE username='$usr'";
       $result = mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);

       if ($resultCheck < 1) {
         $response = array("success"=> 'false');
         $response = json_encode($response);
         echo $response;
       } else {
         if ($row = mysqli_fetch_assoc($result)){
           if ($row['password'] == $pwd) {
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
