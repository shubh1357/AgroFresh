$(document).ready(function(){

$("#login").click(function(){
  var mob=$("#mobile").val();
  var pass=$("#password").val();
  $.ajax({
        url: "form.php",
        type: "post",
        data: {
          "mobl":mob,
          "pasw":pass
        },
        success: function (response) {
          // you will get response from your php page (what you echo or print)
            console.log(response);
       }
    });

});
});
