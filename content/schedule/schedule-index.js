 var request = require('request');
 var temp_max_temp;
/*
var cheerio = require('cheerio');
 */

res = "";

   function step2()
        {


            
var request = require("request");

request({
  uri: "http://localhost/get_info.php",
  method: "POST",
  form: {
    command: "info"
  }
}, function(error, response, body) {
    res = body.substring(5, 11);
    full_string = body; // for the max temp 
    if((res[0]!=1&&0)||(res[1]!=1&&0)||(res[2]!=1&&0)||(res[3]!=1&&0)||(res[4]!=1&&0)||(res[5]!=1&&0))
        {
         console.log(res[0]);
         console.log('error in input info');
         loadInfo();
        }
        else
        {
        loadDoc();
        }
 
});


}



        

function loadInfo() {

var request = require("request");

request({
  uri: "http://localhost/commands2.php",
  method: "POST",
  form: {
    command: "info"
  }
}, function(error, response, body) {
  //console.log(body);
       step2();
});

}



function loadDoc() {
  
var request = require("request");

request({
  uri: "http://localhost/content/schedule/schedule-data.php",
  method: "POST",
  form: {
    command: "info"
  }
}, function(error, response, body) {
  
    time_control_array  =JSON.parse(body);
    startControl(time_control_array);
    
});

}


function loadDoc2() {
  
var request = require("request");

request({
  uri: "http://localhost/content/schedule/schedule-data-feed.php",
  method: "POST",
  form: {

  }
}, function(error, response, body) {
  
    time_control_feed_array  =JSON.parse(body);
    startFeed(time_control_feed_array);
    
});

}




function startControl(schedule_array)
{

    //step1();
    getMaxTemp();

    
    setTimeout(function(){

        ///////////// test if temp is higher then max temp 
            console.log(res+"rssssssssrrrrrrrrrrrs");
            var get_only_current_temp = full_string.replace(/.*?water_temp=/, ""); 
            get_only_current_temp = get_only_current_temp.replace(/home_humidity.*/, ""); 
            get_only_max_temp = temp_max_temp.max_temp;
            get_only_max_temp_active = temp_max_temp.activ;
            var its_max_temp = 0; ///defualt max temp dont need to be on 
            get_only_max_temp_active==1 ?schedule_array['active'][5] = 1:'';
            if (get_only_max_temp<get_only_current_temp)
            {
                
   
                var its_max_temp = 1; ///water temp hat need to be cooler  
              
            }
            ///////////// test if temp is higher then max temp 
           





   // console.log(res+"resssssssssssssss");
    var current_date = new Date();
    var current_hour = current_date.getHours();
    //console.log(schedule_array['element'].length);
    var number_of_elements = schedule_array['element'].length;
    for(loop=0;loop!=number_of_elements;loop++)
    {
        //console.log(schedule_array['active'][loop]);
        if(schedule_array['active'][loop]==1) // if active is on 
        {

                    //console.log("sc:::::::::;"+JSON.stringify(schedule_array));
                    var need_to_be_on =false; 
                    var start_time =schedule_array['hour_start'][loop];
                    var end_time =  schedule_array['hour_end'][loop];
                    for(loop2=start_time;loop2!=end_time;loop2++)
                        {
                            if (loop2==current_hour|| loop==5)
                            {
                                
                               // console.log('090909');
                                switch (schedule_array['element'][loop]) 
                                {
                                    case 'light':
                                            if(res[0]==1)
                                            {
                                                console.log('turn on light');
                                                sendCommand("light");
                                            }
                                        break;
                                    
                                    case 'empty':
                                                console.log(res+'  empty');
                                            if(res[1]==1)
                                            {
                                                console.log('turn on empty');
                                                
                                                sendCommand("empty");
                                            }
                                        break;

                                    case 'skimmer':
                                        if(res[2]==1)
                                            {
                                                console.log('turn on ski');
                                                sendCommand("skimmer");
                                            }
                                        break;

                                        case 'wave':
                                        if(res[3]==1)
                                        {
                                            console.log('turn on wave');
                                            sendCommand("wave");
                                        }
                                    break;
                        

                                    case 'upload':
                                            if(res[4]==1)
                                            {
                                                console.log('turn on up');
                                                sendCommand("upload");
                                            }
                                        break;

                                        case 'fan':
                                        console.log("fannnnnnnnnnnnnnnnnnnnnnnnnn1");
                                                if((res[5]==1   && its_max_temp == 1) || (res[5]==1  && loop2==current_hour) )
                                                {
                                                    console.log('turn on fan');
                                                    sendCommand("fan");
                                                }
                                            break;


                                }


                                //console.log('start light');
                                need_to_be_on= true;
                                break; // if its true you can get off the loop
                            }
                            //else{console.log('llllll')}

                            if (loop2 == 23)loop2=-1;     
                        }// end of time loop
                    if(need_to_be_on== false || loop==5)
                    {
                         
                                switch (schedule_array['element'][loop]) 
                                {
                                    case 'light':
                                            if(res[0]==0)
                                            {
                                                console.log('turn off light');
                                                sendCommand("light");
                                            }
                                        break;
                                    
                                    case 'empty':
                                            if(res[1]==0)
                                            {
                                                console.log('turn off empty');
                                                sendCommand("empty");
                                            }
                                        break;

                                    case 'skimmer':
                                        if(res[2]==0)
                                            {
                                                console.log('turn off skimmer');
                                                sendCommand("skimmer");
                                            }
                                        break;
                                        case 'wave':
                                        if(res[3]==1)
                                        {
                                            console.log('turn off wave');
                                            sendCommand("wave");
                                        }
                                    break;
                        

                                    case 'upload':
                                            if(res[4]==1)
                                            {
                                                console.log('turn off upload');
                                                sendCommand("upload");
                                            }
                                        break;

                         
                                        case 'fan':
                                        console.log('fannnnnnnnnnnnnnnnnnnn2');
                                        if((res[5]==0 &&  its_max_temp == 0) ||(res[5]==0 && need_to_be_on== false) )
                                        {
                                            console.log('turn off fan');
                                            sendCommand("fan");
                                        }
                                    break;

                                }
                    }

        }
    }

}, 500);
}
function sendCommand(command)
{
var params = "command="+command;     
var request = require("request");
request({
  uri: "http://localhost/commands.php",
  method: "POST",
  form:'command='+command
  
}, function(error, response, body) {
/* console.log("error:"+error);
console.log("response:"+JSON.stringify(response));
console.log("body:"+body);  */


});

}

function startFeed(time_control_feed_array)
{
    var current_date = new Date();
    var current_hour = current_date.getHours();
    var number_of_feeding = time_control_feed_array['id'].length;
for(loop3=0;loop3!=number_of_feeding;loop3++)
    {
        //console.log(schedule_array['active'][loop]);
        if((time_control_feed_array['active'][loop3]==1)&&(time_control_feed_array['hour_feed'][loop3]==current_hour)) // if active is on 
        {
             
            sendCommand("feed");
        }
    }

}
/* function getMaxTemp()
{
    console.log('yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy');
    var request = require("request");
    request({
      uri: "http://localhost/max_temp_json/max_temp_json.php",
      method: "POST"
      
    }, function(error, response, body) {
        console.log('error:', error); // Print the error if one occurred
        console.log(data);        
        console.log(JSON.parse(data));        
        var max_temp =JSON.parse(data);    
        console.log(JSON.parse(max_temp.max_temp));        
        //$('#max_temp').text(max_temp.max_temp);    
       // $('#activation').text(max_temp.activ);    
       console.log('xxxxxxxxxxxxxx'+max_temp);
       return max_temp;

    
    });

}
 */

function getMaxTemp()
{
var request = require("request");

request({
  uri: "http://localhost/max_temp_json/max_temp_json.php",
  method: "POST",
  form: {

  }
}, function(error, response, data) {
    
        temp_max_temp =JSON.parse(data);    

       return temp_max_temp;
});

}
/* 
function step0()
{

      $.ajax({
    url: "http://localhost/commands2.php",
    type: "POST",
    data: { command: "info" },
    success: function(data){
        console.log("v1");
       // step2();
    },
    
    error: function(){
            console.log("yyyyyyy");
    }
    })
}





        function step1()
{

      $.ajax({
    url: "http://localhost/commands2.php",
    type: "POST",
    data: { command: "refresh" },
    success: function(data){
        step0();
        console.log("v0");
    },
    
    error: function(){
            console.log("yyyyyyy");
    }
    })
}
 */



loadInfo();

//loadInfo2();


