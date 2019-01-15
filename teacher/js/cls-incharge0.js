function execute(){
    var cls = $('select[name^=select]').map(function(idx, elem) {
        return $(elem).val();
      }).get();
      var inc = $('select[name^=1select]').map(function(idx, elem) {
        return $(elem).val();
      }).get();

      console.log(cls);
      console.log(inc);
      $.post("add-incharge0.php", {cls: cls, inc: inc, submit: 'submit'}, function(result){
        console.log(result);
      })
}
$(document).ready(function(){
  $("#input").load('cls-in-crt.php', function(){
    $("#submit").click(execute);
    });
});
