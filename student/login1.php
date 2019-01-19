<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap.css">
    <meta charset="utf-8">
    <script>
      $(document).keypress(function(e) {
          if(e.which == 13) {
            var usr = $("#usr").val();
            var pwd = $("#pwd").val();
            var cls = $("#class").val();
            $.post("login.php", {usr: usr, pwd: pwd, class: cls, submit: 'submit'}, function(result){
              var json = result ;
              console.log(json);
              var obj = JSON.parse(json);
              console.log(obj.success);
              if (obj.success == 'true') {
                setTimeout(function(){
                   window.location.href = "dashboard.php";
                 },
                  1500);
              }
              $( "#info" ).load("true.html");
              if (obj.success == 'false') {
                $( "#info" ).load("false.html");
              }
            });
      } else {
        $("#submit").click(function(){
        var usr = $("#usr").val();
        var pwd = $("#pwd").val();
        var cls = $("#class").val();
        $.post("login.php", {usr: usr, pwd: pwd, class: cls, submit: 'submit'}, function(result){
          var json = result ;
          console.log(json);
          var obj = JSON.parse(json);
          console.log(obj.success);
          if (obj.success == 'true') {
            setTimeout(function(){
               window.location.href = "dashboard.php";
             },
              1500);
          }
          $( "#info" ).load("true.html");
          if (obj.success == 'false') {
            $( "#info" ).load("false.html");
          }
        });
    });
      }
      });
      $(document).ready(function(){
      $("#submit").click(function(){
      var usr = $("#usr").val();
      var pwd = $("#pwd").val();
      var cls = $("#class").val();
      $.post("login.php", {usr: usr, pwd: pwd, class: cls, submit: 'submit'}, function(result){
        var json = result ;
        console.log(json);
        var obj = JSON.parse(json);
        console.log(obj.success);
        if (obj.success == 'true') {
          setTimeout(function(){
             window.location.href = "dashboard.php";
           },
            1500);
        }
        $( "#info" ).load("true.html");
        if (obj.success == 'false') {
          $( "#info" ).load("false.html");
        }
      });
  });
  });
    </script>
    <title></title>
  </head>
  <body>
    <div class="container">
      <div class="col-sm-12">
        <div class="col-sm-12" id="info">
          <br>
          &nbsp;
        </div>
        <div class="col-sm-4">
          &nbsp;
        </div>
        <div class="col-sm-4" style="background-color:#cbd1db;">
          <div class="align-middle">
            <?php
            include_once '../dbh.php';
            echo "Standard:";
            $query = $conn->query("SELECT `class` FROM `class`;");
            $class = Array();
            while($result = $query->fetch_assoc()){
                $class[] = $result['class'];
            }
            $length = count($class);
            for ($y=0; $y < 1; $y++) {
              $query = $conn->query("SELECT `class` FROM `class`;");
              $class = Array();
              while($result = $query->fetch_assoc()){
                  $class[] = $result['class'];
              }
              $length1 = count($class);
              echo '<select class="form-control" id="class" name="class">';
              for ($x=0; $x < $length1; $x++) {
                echo '<option value="'.$class[$x].'" name="'.$class[$x].'">'.$class[$x].'</option>';
              }
              echo "</select>";
            }
            echo "<br>";
             ?>

              <label for="usr">Name:</label>
              <input type="text" class="form-control" id="usr" name="usr">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" name="pwd">
              <input type="submit" name="submit" value="Submit" class="btn" id="submit">
          </div>
        </div>
        <div class="col-sm-4">
          &nbsp;
        </div>
      </div>
    </div>
  </body>
</html>
