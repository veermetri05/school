<?php
if (isset($_POST['number'])) {
  for ($x = 1; $x <= $_POST['number']; $x++) {
    echo '<br>'.$x .'<br>';
    echo 'User Name:<input name="usr[]" type="text" class="form-control">';
    echo 'Password: <input name="pwd[]" type="password" class="form-control">';
}
}
 ?>
