$(document).ready(function(){
  var number = 1;
  $("#but").click(function(){
    var number = $("#number").val() ;
    $.post( "add.php", {number: number}, function(result) {
      var input = result ;
      $("#input").html(input);
      console.log(result);
    });
    $("#add").click(function(){
      var number1 = number++ ;
      $.post( "add.php", {number: number1}, function(result) {
        var input = result ;
        $("#input").html(input);
        console.log(result);
      });
    });
  });
  $("#add").click(function(){
    var number1 = number++ ;
    $.post( "add.php", {number: number1}, function(result) {
      var input = result ;
      $("#input").html(input);
      console.log(result);
    });
  });
  });
  function onClick(event) {
    $("#info").empty();
    var usr = $('input[name^=usr]').map(function(idx, elem) {
      return $(elem).val();
    }).get();
    if ($('#auto').is(":checked"))
    {
      var pwd = usr ;
      console.log('checked');
    } else {
      var pwd = $('input[name^=pwd]').map(function(idx, elem) {
        return $(elem).val();
      }).get();
      console.log('not checked');
    }

    console.log(usr);
    console.log(pwd);
    event.preventDefault();

      $.post( "add-usr.php", {usr: usr, pwd: pwd, submit: 'submit'}, function(result) {
        var input = result ;
        console.log(result);
        var obj = JSON.parse(result);
        if (obj.success === 'true') {
          console.log(obj.success);
          $("#info").html('<div class="alert alert-success">All user are added.</div>');
        } else {
          var length =  obj[0].length;
          for (i = 0; i < length ; i++) {
            $("#info").append('<div class="alert alert-warning">The username&nbsp;'+obj[0][i]+'&nbsp;is taken.</div>');
          }
            var length1 =  obj[1].length;
            console.log(obj[1]);
            if (length != length1) {
              $("#info").append('<div class="alert alert-success">The user are added expect the empty or taken .</div>');
            }
          for (i = 0; i < length1 ; i++) {
            $("#info").append('<div class="alert alert-warning">The entry number&nbsp;'+obj[1][i]+'&nbsp;is empty.</div>');
            }
        }
      });
  }

  // attach button click listener on dom ready
  $(function() {
    $('#submit').click(onClick);
  });
