<script>
  /* $('document').ready(function() {
      getOptionsFromDb();
    }) */
    // var to save all options
  options_from_db = "";

  // get current options form db
  function getOptionsFromDb() {
 
    $.post("content/schedule/schedule-data.php", function(data, status) {
      
      
      options_from_db = JSON.parse(data);


      updatePopupOptions();
    });
 
  }


  /// update popup option window with the db data
  function updatePopupOptions() {
    var loop = 0;
    var num_of_elements = options_from_db['id'].length;
    for (; loop != num_of_elements; loop++) {
      $("#myModal2 ." + options_from_db['element'][loop] + " select.start-time").val(options_from_db['hour_start'][loop]);
      $("#myModal2 ." + options_from_db['element'][loop] + " select.end-time").val(options_from_db['hour_end'][loop]);
      options_from_db['active'][loop] == 1 ? $("#myModal2 ." + options_from_db['element'][loop] + " .form-check-input").attr('checked', true) : $("#myModal2 ." + options_from_db['element'][loop] + " .form-check-input").attr('checked', false);
    }
  }


  // popup option window
  function openOptions() {
    $('#myModal2').modal();

  }
  function openOptions2() {
    var current_max_temp_val = $("#cooler_setting #max_temp").text()!=""?$("#cooler_setting #max_temp").text():"";
    var currentActiveOrNot = $("#cooler_setting #activation").text()=="Active"?true:false;
    $('#myModal4').modal();
    $("#max_temp_number").val(current_max_temp_val);
    currentActiveOrNot?$('#myModal4 #active_max_temp_number').prop('checked', true):('#myModal4 #active_max_temp_number').prop('checked', false);
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
  function sendOptionsToDb() {
    var loop = 0;
    var current_length = options_from_db["id"].length;

    // get current selections
    for (; loop != current_length; loop++) {
      {
        if ($("#myModal2 ." + options_from_db['element'][loop] + " .form-check-input").is(':checked')) {
          options_from_db['active'][loop] = 1;
        } else {
          options_from_db['active'][loop] = 0;
        }

        options_from_db['hour_start'][loop] = $("#myModal2 ." + options_from_db['element'][loop] + " select.start-time").val()
        options_from_db['hour_end'][loop] = $("#myModal2 ." + options_from_db['element'][loop] + " select.end-time").val();
      }
    }
    //console.log(options_from_db);


 

    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: 'content/schedule/schedule-data-send.php',
      data: {
        "options_from_db": options_from_db
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
<div class="container" id="popup_box_options">
  <div class="row">

    <div id="myModal2" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->


        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">הגדרות</h4>
          </div>


          <form>
            <div class="container">

              <div class="row light">
                <div class="title-settings col-md-2 col-xs-6">
                  <h2>Light</h2>
                </div>
                <div class="image-settings col-md-2 col-xs-6">
                  <img src="images/light.jpg" />
                </div>
                <div class="form-group col-xs-6 col-md-3">
                  <label for="sel1">start time</label>
                  <select class="form-control start-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="form-group col-xs-6 col-md-3">
                  <label for="sel1">end time</label>
                  <select class="form-control end-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="active-option col-md-2 col-xs-12">
                  <label class="form-check-label">הפעל</label>
                  <input type="checkbox" class="form-check-input active">
                </div>
              </div>

              <div class="row empty">
                <div class="title-settings col-md-2 col-xs-6">
                  <h2>Empty</h2>
                </div>
                <div class="image-settings col-md-2 col-xs-6">
                  <img src="images/q.png" />
                </div>
                <div class="form-group col-xs-6 col-md-3">
                  <label for="sel1">start time</label>
                  <select class="form-control start-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="form-group col-xs-6 col-md-3">
                  <label for="sel1">end time</label>
                  <select class="form-control end-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="active-option col-md-2 col-xs-12">
                  <label class="form-check-label">הפעל</label>
                  <input type="checkbox" class="form-check-input active">
                </div>
              </div>


              <div class="row skimmer">
                <div class="title-settings col-md-2 col-xs-6">
                  <h2>Skimmer</h2>
                </div>
                <div class="image-settings col-md-2 col-xs-6">
                  <img src="images/skimmer.jpg" />
                </div>
                <div class="form-group col-xs-6 col-md-3">
                  <label for="sel1">start time</label>
                  <select class="form-control start-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="form-group col-xs-6 col-md-3">
                  <label for="sel1">end time</label>
                  <select class="form-control end-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="active-option col-md-2 col-xs-12">
                  <label class="form-check-label">הפעל</label>
                  <input type="checkbox" class="form-check-input active">
                </div>
              </div>


              <div class="row wave">
                <div class="title-settings col-md-2 col-xs-6">
                  <h2>Wave</h2>
                </div>
                <div class="image-settings col-md-2 col-xs-6">
                  <img src="images/wave.jpg" />
                </div>
                <div class="form-group col-xs-6 col-md-3">
                  <label for="sel1">start time</label>
                  <select class="form-control start-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="form-group col-xs-6 col-md-3">
                  <label for="sel1">end time</label>
                  <select class="form-control end-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="active-option col-md-2 col-xs-12">
                  <label class="form-check-label">הפעל</label>
                  <input type="checkbox" class="form-check-input active">
                </div>
              </div>


              <div class="row upload">
                <div class="title-settings col-md-2 col-xs-6">
                  <h2>Uploder</h2>
                </div>
                <div class="image-settings col-md-2 col-xs-6">
                  <img src="images/upload.jpg" />
                </div>
                <div class="form-group col-xs-6 col-md-3">
                  <label for="sel1">start time</label>
                  <select class="form-control start-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="form-group col-xs-6 col-md-3">
                  <label for="sel1">end time</label>
                  <select class="form-control end-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="active-option col-md-2 col-xs-12">
                  <label class="form-check-label">הפעל</label>
                  <input type="checkbox" class="form-check-input active">
                </div>
              </div>


              <div class="row fan">
                <div class="title-settings col-md-2 col-xs-6">
                  <h2>Fan</h2>
                </div>
                <div class="image-settings col-xs-6 col-md-2">
                  <img src="images/fan.jpg" />
                </div>
                <div class="form-group col-xs-6 col-md-3">
                  <label for="sel1">start time</label>
                  <select class="form-control start-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="form-group col-xs-6 col-md-3">
                  <label for="sel1">end time</label>
                  <select class="form-control end-time">
                    <script>
                      loopHour();
                    </script>
                  </select>
                </div>
                <div class="active-option col-md-2 col-xs-12">
                  <label class="form-check-label">הפעל</label>
                  <input type="checkbox" class="form-check-input active">
                </div>
                <span id="popup-button" data-dismiss="modal" onclick="sendOptionsToDb()">עדכן</span>
              </div>

            </div>
        </div>
        </form>
      </div>

    </div>
  </div>
</div>
</div>