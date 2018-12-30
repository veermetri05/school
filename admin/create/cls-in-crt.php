<?php
include_once '../../dbh.php';
$query = $conn->query("SELECT `class` FROM `class`;");
$class = Array();
while($result = $query->fetch_assoc()){
    $class[] = $result['class'];
}
$length = count($class);
for ($y=0; $y < $length; $y++) {
  $query = $conn->query("SELECT `class` FROM `class`;");
  $class = Array();
  while($result = $query->fetch_assoc()){
      $class[] = $result['class'];
  }
  $length1 = count($class);
  echo '<select class="form-control" id="select" name="select">';
  for ($x=0; $x <= $length1; $x++) {
    echo '<option value="'.$class[$x].'" name="'.$class[$x].'">'.$class[$x].'</option>';
  }
  echo "</select>";
  $query = $conn->query("SELECT `usr` FROM `teacher`;");
  $teacher = Array();
  while($result = $query->fetch_assoc()){
      $teacher[] = $result['usr'];
  }
  $length2 = count($teacher);
  echo '<select class="form-control" id="select1" name="1select">';
  for ($z=0; $z <= $length2; $z++) {
    echo '<option value="'.$teacher[$z].'" name="'.$teacher[$z].'">'.$teacher[$z].'</option>';
  }
  echo "</select>";
  echo "<br>";
}
echo '<input type="submit" name="submit" value="Submit" id="submit" class="form-control">';
echo "<br>";
 ?>
