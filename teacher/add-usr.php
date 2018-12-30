<?php
  if (isset($_POST['submit'])) {
    session_start();
    include_once '../dbh.php';
    $class = $_SESSION['class'];
    $usr = $_POST['usr'] ;
    $pwd = $_POST['pwd'] ;
    //count user
    $count = count($usr);
    $number = range(1,$count);
    //combine array
    $user=array_combine($number,$usr);
    $pass=array_combine($number,$pwd);
    /*the password and the user name are received in same amount
    some are empty but not null count is required on time only*/
    $ar_em = array();
    $ar_tk = array();
    for ($x = 1; $x <= $count; $x++) {
      if (empty($user[$x]) || empty($pass[$x])) {
        array_push($ar_em, $x);
        //echo $user[$x];
      } else {
        $c_usr = $user[$x];
        $c_pwd = $pass[$x];
        $sql = "SELECT * FROM ".$class." WHERE usr='$c_usr'" ;
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if ($resultCheck > 0) {
            array_push($ar_tk, $x);
					} else {
            $sql = "INSERT INTO ".$class." (usr, pwd) VALUES ('$c_usr', '$c_pwd');";
            mysqli_query($conn, $sql);
          }
      }
    }
    $json=array();
    $counter=array();
    $array_length1= count($ar_em);
    $array_length1= $array_length1 - 1 ;
    $array_length2= count($ar_tk);
    $array_length2=$array_length2 - 1 ;
    for ($y=0; $y <= $array_length2 ; $y++) {
        //echo $user[$ar_tk[$y]];
        array_push($json, $user[$ar_tk[$y]]);
    }
    array_push($counter, $json);
    $json=array();
    /*for ($y=0; $y <= $array_length1 ; $y++) {
        array_push($json, $user[$ar_em[$y]]);

    }*/
    array_push($counter, $ar_em);
    if (count($counter[0]) == 0 && count($counter[1]) == 0) {
      $response = array("success" => 'true');
    } else {
      $response = $counter ;
    }
    $response = json_encode($response);
    echo $response;
  }
?>
