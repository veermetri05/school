$(document).ready(function(){
$("#btn").click(function(){
  var option = $("#select").val();
  var option1 = $("#select1").val();
  $.post("crt-cls.php", { option: option, option1: option1}, function(result){
    console.log(result);
    var obj = JSON.parse(result);
    if (obj.success == 'true') {
      $("#info").addClass('alert alert-success');
      $("#info").html('Success! Classes have been added success fully.');
    }
  });
});
});
