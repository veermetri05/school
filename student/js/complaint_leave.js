$(document).ready(function(){
$("#btn").click(function(){
  var data = $("#data").val();
  var subject = $("#subject").val();
  $.post("leave_teacher_student.php", {complaint: data, tsub: subject, submit: 'submit'}, function(result){
    console.log(result);
    var obj = JSON.parse(result);
    if (obj.success == 'true') {
      $("#info").addClass("alert alert-success");
      $("#info").html("<strong>Success!</strong> Leave Request was sent to your class teacher.");
    }
  });
});
});
