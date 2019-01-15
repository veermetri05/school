$(document).keypress(function(e) {
    if(e.which == 13) {
      var usr = $("#usr").val();
      var pwd = $("#pwd").val();
      $.post("crt-usr.php", {usr: usr, pwd: pwd, submit: 'submit'}, function(result){
        var json = result ;
        console.log(json);
        var obj = JSON.parse(json);
        console.log(obj.success);
        if (obj.success == 'true') {
          setTimeout(function(){
             window.location.href = "../dashboard/dashboard.html";
           },
            1500);
        }
        $("#info").addClass("alert alert-success");
        $("#info").html("<strong>Success!</strong> Added user successfully");

        if (obj.success == 'false') {
          $("#info").addClass("alert alert-warning");
          $("#info").html("<strong>Warning!</strong> User name already exits");
        }
      });
} else {
  $("#submit").click(function(){
  var usr = $("#usr").val();
  var pwd = $("#pwd").val();
  $.post("crt-usr.php", {usr: usr, pwd: pwd, submit: 'submit'}, function(result){
    var json = result ;
    console.log(json);
    var obj = JSON.parse(json);
    console.log(obj.success);
    if (obj.success == 'true') {
      setTimeout(function(){
         window.location.href = "../dashboard/dashboard.html";
       },
        1500);
    }
    $("#info").addClass("alert alert-success");
    $("#info").html("<strong>Success!</strong> Added user successfully");

    if (obj.success == 'false') {
      $("#info").addClass("alert alert-warning");
      $("#info").html("<strong>Warning!</strong> User name already exits");
    }
  });
});
}
});
$(document).ready(function(){
$("#submit").click(function(){
var usr = $("#usr").val();
var pwd = $("#pwd").val();
$.post("crt-usr.php", {usr: usr, pwd: pwd, submit: 'submit'}, function(result){
  var json = result ;
  console.log(json);
  var obj = JSON.parse(json);
  console.log(obj.success);
  if (obj.success == 'true') {
    setTimeout(function(){
       window.location.href = "../dashboard/dashboard.html";
     },
      1500);
  }
    $("#info").addClass("");
  $("#info").addClass("alert alert-success");
  $("#info").html("<strong>Success!</strong> Added user successfully");

  if (obj.success == 'false') {
    $("#info").addClass("");
    $("#info").addClass("alert alert-warning");
    $("#info").html("<strong>Warning!</strong> User name already exits");
  }
});
});
});
