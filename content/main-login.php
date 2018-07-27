<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="include/bootstrap.min.css">

  <!-- jQuery library -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <script src="include/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="include/bootstrap.min.js"></script>

  <script>


$(document).ready(function(){
    $('#inputPassword4').keypress(function(e){
      if(e.keyCode==13)
      {
    
      testPass($('#inputPassword4').val());
        return false;
      }
    });
});




    function testPass(pass) {
      $.ajax({

        url: "content/login.php",
        type: 'POST',
        data: {
          'password': pass
        },
        success: function(data) {
          console.log('Data: ' + data);
          
            $('#inputPassword4').css('background-size','100px');
          setTimeout(function(){
            location.reload() }, 2000);
        },
        error: function(request, error) {
          console.log("Request: " + JSON.stringify(request));
        }
      });

    }


    
    
  </script>
  <title>Document</title>
<style>
form#main-form
{
    width:255px;
}

#main-div
{
width:300px;
margin: 0 auto;
padding-top: 100px;

}
#main-div button
{
    float:right;
    margin: 0 auto;
    padding-top: 100px;
    margin-top:4px;
    padding-top: 0px;
}
#inputPassword4
{

     background-image: url(images/loader.gif);
    background-size: 0px;
    background-repeat: no-repeat;
    background-position-x: 133px;
    background-position-y: -21px;
 
}
</style>
</head>

<body>
  <div class="container">
    <div class="row">
    <div id="main-div">
      <form class="form-inline col-xs-4" id="main-form">
        <div class="form-group">
          <input type="password" id="inputPassword4"  placeholder="Enter password" class="form-control" aria-describedby="passwordHelpInline">
          <small id="passwordHelpInline" class="text-muted">
        </small>
        </div>
      </form>
        <button type="button" id="main_button" class="btn-primary"  onclick="testPass($('#inputPassword4').val())">אשר</button>
    </div>
  </div>
  </div>
</body>

</html>