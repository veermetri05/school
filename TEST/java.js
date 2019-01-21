$(document).ready(function(){
$( "body" ).click(function( event ) {
  $("#log").html( "clicked: " + event.target.id );
});
});
