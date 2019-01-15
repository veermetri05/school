$(document).ready(function(){
$("#btn").click(function(){
  var option = $("#select").val();
  var option1 = $("#select1").val();
  function timeout() {
    setTimeout(function () {
        $("#percentage").load("show-per.php");
        timeout();
    }, 1000);
}
  $.post("crt-cls.php", { option: option, option1: option1}, function(result){
    console.log(result);
    var obj = JSON.parse(result);
    if (obj.success == 'true') {
      $("#info").addClass('alert alert-success');
      $("#info").html('Sucess all classes added');
    }

  });
});
});
