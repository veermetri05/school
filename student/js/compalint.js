$(document).ready(function(){
  $("#result").load( "show.php" );
  $("body").click(function(event) {
    //$("#log").html( "clicked: " + event.target.id );
    var data = event.target.id ;
    $.post("complaint_viewer.php", {clicked: data, submit: 'submit'}, function(result){
      console.log(result);
      if (data !== 'body' && data !== 'result' && data !== '') {
        $("#" + data).html(result);
      }
    });
  });
});
