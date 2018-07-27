 var request = require('request');
/*
var cheerio = require('cheerio');
 */

res = "";



function loadDb() {
  
var request = require("request");

request({
  uri: "http://localhost/content/schedule/schedule-data-feed.php",
  method: "POST",
  form: {
    command: "info"
  }
}, function(error, response, body) {
  
    time_control_feed_array  =JSON.parse(body);
    startControl(time_control_feed_array);
    
});

}






function startControl(schedule_array)
{
    var current_date = new Date();
    var current_hour = current_date.getHours();
    //console.log(schedule_array['element'].length);
    var number_of_elements = schedule_array['id'].length;
    for(loop5=0;loop5!=number_of_elements;loop5++)
    {
        //console.log(schedule_array['active'][loop5]);
        if(schedule_array['active'][loop5]==1) // if active is on 
        {
                    var start_time =schedule_array['hour_feed'][loop5];
               
                            if (start_time==current_hour)
                            {
                                
                                sendCommand("feed");

                                //console.log('start light');
                               
                            // if its true you can get off the loop5
                            }
        }
    }
}
function sendCommand(command)
{
var params = "command="+command;     
var request = require("request");
console.log("commandddd");
request({
  uri: "http://localhost/commands.php",
  method: "POST",
  form:'command='+command
  
}, function(error, response, body) {
    
});

}

loadDb();


