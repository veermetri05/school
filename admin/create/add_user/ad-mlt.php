<?php

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <script src="../../js/ad-mlt.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="col-sm-12">
        <div class="col-sm-4">
          &nbsp;
        </div>
        <div class="col-sm-4">
          <div class="" id="info">

          </div>
        <button type="button" name="button" id="add">Add</button><br>
        <input type="number" name="number" value="" id="number">
        <input type="button" name="button" value="Add in amount" id="but"><br>
        <input type="checkbox" name="checkbox" id="auto" >Auto Generate password.<a href="#" data-toggle="tooltip" data-placement="bottom" title="The username wil be password."><i class="material-icons">error</i></a>
        <div class="" id="input">

        </div>
        <div class="col-sm-12">
          <input type="submit" name="submit" value="submit" class="form-control" id="submit">
        </div>
        </div>
        <div class="col-sm-4">
          &nbsp;
        </div>
      </div>
    </div>
    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
  </body>
</html>
