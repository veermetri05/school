<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>-->

<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/index.js"></script>
    <meta charset="utf-8">
    <title>Attendace School</title>
  </head>
  <body>
    <div class="container">
      <div class="col-sm-12">
        <div class="col-sm-4">
          &nbsp;
        </div>
        <div class="col-sm-4" id="div1">
          <div id="info"></div>
          <input type="checkbox" name="" value="selectall" id="checkAll">
          <span >Select All<span><br>
          <?php
          include_once '../../dbh.php';
          session_start();
          $class = $_SESSION['class'];
          $sql = "SELECT id, usr FROM tables_$class";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo '<input type="checkbox" class="present" name="'.$row["usr"].'" value="'.$row["usr"].'">'.$row["usr"] ;
                echo '<br>';
              }
          } else {
              echo "0 results";
          }
         ?>
         <br>
         <p id="log"></p>
         <input type="submit" value="Submit" id="submit"></input>

        </div>
        <div class="col-sm-4" id="text">
          &nbsp;
        </div>
      </div>
    </div>
  </body>
  <script>

  </script>
</html>
