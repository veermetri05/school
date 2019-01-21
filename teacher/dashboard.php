<?php

 ?><!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <!-- Latest compiled JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </head>
   <body>
     <div class="cointainer">
       <div class="col-sm-4">
         &nbsp;
       </div>
       <div class="col-sm-4">
         <?php
         session_start();
         if (isset($_SESSION['class'])) {
           echo '<a href="crt-stud.html"><button type="button" name="button">Add students</button></a>';
           echo '<a href="complaint"><button type="button" name="button">Complaints</button></a>';
         }
          ?>

       </div>
       <div class="col-sm-4">
         &nbsp;
       </div>
     </div>
   </body>
 </html>
