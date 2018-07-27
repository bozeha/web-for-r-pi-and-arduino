<script>
  /* $('document').ready(function() {
      getOptionsFromDb();
    }) */
    // var to save all options
  options_feed_from_db = "";

  // get current options form db
  function getOptionsFeedFromDb() {
 
    $.post("content/schedule/schedule-data-feed.php", function(data, status) {
      
      
      options_feed_from_db = JSON.parse(data);


      updatePopupFeedOptions();
    });
 
  }


  /// update popup option window with the db data
  function updatePopupFeedOptions() {
    var loop2 = 0;
    var num_of_elements2 = options_feed_from_db['id'].length;
    for (; loop2 != num_of_elements2; loop2++) {
      $("#myModal3 .feed" +options_feed_from_db['id'][loop2] + " select.feed-time").val(options_feed_from_db['hour_feed'][loop2]);
      options_feed_from_db['active'][loop2] == 1 ? $("#myModal3 .feed" + options_feed_from_db['id'][loop2] + " .form-check-input").attr('checked', true) : $("#myModal3 .feed" + options_feed_from_db['id'][loop2] + " .form-check-input").attr('checked', false);
    }
  }


  // popup option window
  function openOptionsFeed() {
    $('#myModal3').modal();

  }


  /// get all hours for selection option
  function loopHour() {
    for (loop0 = 0; loop0 != 24; loop0++) {
      document.write("<option>");
      if (loop0 < 10) {
        document.write("0" + loop0);
      } else document.write(loop0);
      document.write("</option>");
    }
  }


  // send all new options to db
  function sendOptionsFeedToDb() {
    var loop4 = 0;
    var current_length = options_feed_from_db["id"].length;

    // get current selections
    for (; loop4 != current_length; loop4++) {
      {
        if ($("#myModal3 .feed" + options_feed_from_db['id'][loop4] + " .form-check-input").is(':checked')) {
          options_feed_from_db['active'][loop4] = 1;
        } else {
          options_feed_from_db['active'][loop4] = 0;
        }

        options_feed_from_db['hour_feed'][loop4] = $("#myModal3 .feed" + options_from_db['id'][loop4] + " select.feed-time").val()
      }
    }
    //console.log(options_from_db);


 

    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: 'content/schedule/schedule-data-send-feed.php',
      data: {
        "options_feed_from_db": options_feed_from_db
      },
      success: function(msg) {
        console.log('wow' + msg);
      },
       error: function(msg){
    console.log('err:'+msg);
        }
    }); 
  }
</script>
<div class="container" id="popup_box_feed_options">
  <div class="row">

    <div id="myModal3" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->


        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">הגדרות</h4>
          </div>


          <form>
            <div class="container">

              <div class="row feed1">
                <div class="image-settings col-md-2 col-xs-6">
                  <img src="images/feed.png" />
                </div>
                <div class="title-settings col-md-4 col-xs-6">
                  <h2>Feed 1</h2>
                </div>
                <div class="form-group col-xs-6 col-md-4">
                  <label for="sel1">feed time</label>
                  <select class="form-control feed-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="active-option col-md-2 col-xs-4">
                  <label class="form-check-label">הפעל</label>
                  <input type="checkbox" class="form-check-input active">
                </div>
              </div>

              <div class="row feed2">
                <div class="image-settings col-md-2 col-xs-6">
                  <img src="images/feed.png" />
                </div>
                <div class="title-settings col-md-4 col-xs-6">
                  <h2>Feed 2</h2>
                </div>
                <div class="form-group col-xs-6 col-md-4">
                  <label for="sel1">feed time</label>
                  <select class="form-control feed-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="active-option col-md-2 col-xs-4">
                  <label class="form-check-label">הפעל</label>
                  <input type="checkbox" class="form-check-input active">
                </div>
              </div>


              <div class="row feed3">
                <div class="image-settings col-md-2 col-xs-6">
                  <img src="images/feed.png" />
                </div>
                <div class="title-settings col-md-4 col-xs-6">
                  <h2>Feed 3</h2>
                </div>
                <div class="form-group col-xs-6 col-md-4">
                  <label for="sel1">feed time</label>
                  <select class="form-control feed-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="active-option col-md-2 col-xs-4">
                  <label class="form-check-label">הפעל</label>
                  <input type="checkbox" class="form-check-input active">
                </div>
              </div>


              <div class="row feed4">
                <div class="image-settings col-md-2 col-xs-6">
                  <img src="images/feed.png" />
                </div>
                <div class="title-settings col-md-4 col-xs-6">
                  <h2>Feed 4</h2>
                </div>
                <div class="form-group col-xs-6 col-md-4">
                  <label for="sel1">feed time</label>
                  <select class="form-control feed-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="active-option col-md-2 col-xs-4">
                  <label class="form-check-label">הפעל</label>
                  <input type="checkbox" class="form-check-input active">
                </div>
              </div>
        
        <span id="popup-button2" data-dismiss="modal" onclick="sendOptionsFeedToDb()">עדכן</span>
            </div>
        </div>
        </form>
      </div>
    </div>
    <div id="myModal4" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->


        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> ניהול טמפרטורה</h4>
          </div>


          <form>
            <div class="container">

              <div class="row feed1">
                <div class="image-settings col-md-2 col-xs-6">
                  <img src="images/fan.jpg" />
                </div>
                <div class="title-settings col-md-4 col-xs-6">
                  <h2>set:</h2>
                </div>
                <div class="form-group col-xs-6 col-md-4">
                  <label for="sel1">Max Temp</label>
                 <input type="number" id='max_temp_number'/>
                </div>
                <div class="active-option col-md-2 col-xs-4">
                  <label class="form-check-label">הפעל</label>
                  <input type="checkbox" id='active_max_temp_number' class="form-check-input active">
                </div>
              </div>
      
        <span id="popup-button2" data-dismiss="modal" onclick="updateMaxTemp()">עדכן</span>
            </div>
        </div>
        </form>
      </div>

    </div>
  </div>
</div>
</div>