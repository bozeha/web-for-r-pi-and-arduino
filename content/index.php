<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- <script type="text/javascript" src="/scripts/loop2.js"></script> -->
  <script type="text/javascript" src="./scripts/main.js"></script>
  <script type="text/javascript" src="./scripts/popup.js"></script>

  <meta charset="UTF-8">
  <title>Document</title>
</head>

<body>
 <!-- <?php include 'content/login.php';?> --> 
 
  <div id="loader">
    <img src="images/nemo.gif" />
  </div>
  <div class="header">
    <div class="container">
      <div class="row">
        <div id="logo" class="pull-left">
        </div>

        <div class="pull-right btn btn-lg" onclick="popUpNow(x={'comm':'reboot','title':'הודעה','mess':'האם ברצונך להפעיל מחדש את המערכת','b1':'כן','b2':'לא'})" id="top-buttons">
        </div>
        <div class="pull-right btn btn-lg" onclick="openOptions()" id="top-buttons-options">
        </div>
        <div class="pull-right btn btn-lg" onclick="openOptionsFeed()" id="top-buttons-options-feed">
        </div>
      </div>
    </div>
  </div>


  <!-- Modal popup options include -->

  <?php include "popup-options.php"; ?>
  <!-- Modal popup options include -->
  
  
  <!-- Modal popup options include -->

  <?php include "popup-options-feed.php"; ?>
  <!-- Modal popup options include -->
  
  
  <!-- Modal popup -->
  <div class="container" id="popup_box">
    <div class="row">

      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">הודעה</h4>
            </div>
            <div class="modal-body">
              <p>האם ברצונך להפעיל מחדש את המערכת</p>
            </div>
            <div class="modal-footer">
              <div>
                <button type="button" onclick="runCommand('reboot')" class="btn btn-default" data-dismiss="modal">כן</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">לא</button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div id="main-con">
    <div class="container big-buttons">
      <div class="row">
        <div id="all-buttons">
          <div class="buttons-big">
            <a href="javascript:void(0)" onclick="popUpNow(x={'comm':'light','title':'הודעה','mess':'אתה בטוח','b1':'כן','b2':'לא'})" class="post"><img src='images/light.jpg' /></a>
            <!-- <a href="javascript:void(0)" onclick="runCommand('light')" class="post"><img src='images/light.jpg' /></a> -->
          </div>
          <div class="buttons-big">
          <a href="javascript:void(0)" onclick="popUpNow(x={'comm':'empty','title':'הודעה','mess':'אתה בטוח','b1':'כן','b2':'לא'})" class="post"><img src='images/q.png' /></a>
            <!-- <a href="javascript:void(0)" onclick="runCommand('fan')" class="post"><img src='images/fan.jpg' /></a> -->
          </div>
          <div class="buttons-big">
          <a href="javascript:void(0)" onclick="popUpNow(x={'comm':'skimmer','title':'הודעה','mess':'אתה בטוח','b1':'כן','b2':'לא'})" class="post"><img src='images/skimmer.jpg' /></a>
          <!--   <a href="javascript:void(0)" onclick="runCommand('skimmer')" class="post"><img src='images/skimmer.jpg' /></a> -->
          </div>
          <div class="buttons-big">
          <a href="javascript:void(0)" onclick="popUpNow(x={'comm':'wave','title':'הודעה','mess':'אתה בטוח','b1':'כן','b2':'לא'})" class="post"><img src='images/wave.jpg' /></a>
<!--             <a href="javascript:void(0)" onclick="runCommand('wave')" class="post"><img src='images/wave.jpg' /></a> -->
          </div>
          <div class="buttons-big">
          <a href="javascript:void(0)" onclick="popUpNow(x={'comm':'upload','title':'הודעה','mess':'אתה בטוח','b1':'כן','b2':'לא'})" class="post"><img src='images/upload.jpg' /></a>
          <!--   <a href="javascript:void(0)" onclick="runCommand('upload')" class="post"><img src='images/upload.jpg' /></a> -->
          </div>
          <div class="buttons-big">
          <a href="javascript:void(0)" onclick="popUpNow(x={'comm':'fan','title':'הודעה','mess':'אתה בטוח','b1':'כן','b2':'לא'})" class="post"><img src='images/fan.jpg' /></a>
            <!-- <a href="javascript:void(0)" onclick="runCommand('last')" class="post"><img src='images/q.png' /></a> -->
          </div>
          <div class="buttons-big">
          <a href="javascript:void(0)" onclick="popUpNow(x={'comm':'feed','title':'הודעה','mess':'אתה בטוח','b1':'כן','b2':'לא'})" class="post"><img src='images/feed.png' /></a>
            <!-- <a href="javascript:void(0)" onclick="runCommand('last')" class="post"><img src='images/q.png' /></a> -->
          </div>
          <div class="buttons-big">
             <a href="javascript:void(0)" id="display-video" onclick="iframeOn()" class="post"><img src='images/video.jpg' /></a> 
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-2" id="temp_info">
          <h1>information:</h1>
          <div>
            <p>טמפרטורת הבית</p>
            <span id="home_temp"></span>
            <p>לחות</p>
            <span id="home_humidity"></span>
            <p>טמפרטורת המים באקוריום</p>
            <span id="water_temp">
              </span>
              <span id='cooler_setting' onClick="openOptions2()">
                <h3>Max Temp</h3>
                <div id="image_max_temp"></div>
                <span id="activation">

                </span>
                <span id='max_temp'></span>

              </span>
            <div id="salinity_box"> 
              <p>רמת מליחות המים</p>
               <span id="salinity"></span>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <iframe src=""></iframe>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </div>
 <!-- xxxxxxx <?php include 'schedule/schedule-data.php' ?>yyyyyyyy -->
</body>

</html>