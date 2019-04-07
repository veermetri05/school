$(document).ready(function(){
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

  function getValueUsingClass(){
	var chkArray = [];

	$(".present:checked").each(function() {
		chkArray.push($(this).val());
	});

	var selected;
	selected = chkArray.join(',') ;
  //console.log(chkArray);
  $.post("attendance_teacher.php", {present: chkArray, submit: 'submit'}, function(result){
    console.log(result);
    var obj = JSON.parse(result);
    if (obj.success == 'true') {
      //console.log("true");
      $("#info").addClass("alert alert-success");
      $("#info").html("<strong>Success!</strong> Attendance was submitted");
    } else {
      //console.log("false");
      $("#info").addClass("alert alert-warning");
      $("#info").html("<strong>Alert!</strong> Attendance was not submitted. Attendance has already submitted early. You can resubmit it.");
      var button = document.createElement("button");
      button.innerHTML= 'Re-Submit';
      $(button).click(function(){
        $.post("attendance_teacher.php", {present: chkArray, submit: 'resubmit'}, function(result){
          console.log(result);
        })
      });
      var div1 = document.getElementById("div1");
      div1.appendChild(button);
      $("#")
    }
  });
}
$("#submit").click(function() {
      getValueUsingClass();
  });
});
