<?php
session_start();
$class = $_SESSION['class'];
include_once '../../dbh.php';
$query = "SELECT * FROM leave_request_$class ORDER BY year DESC, month DESC, date DESC, id DESC; "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo   '<div id="'.$row['id'].'" class="alert alert-info"><strong>New</strong> <br><br>From:<strong>'.$row['form'].'</strong></div>' ;  //$row['index'] the index here is a field name
echo "<br>";
}



 ?>
