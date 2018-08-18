
is_mobile = false;

$( document ).ready(function(){ 

getOptionsFromDb();
getOptionsFeedFromDb();



if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 console.log( "You are in mobile browser");
 is_mobile = true;
}


step0();
    
    }) 

function iframeOn()
                {
            if(is_mobile)
                {
                    setTimeout(function(){    
                    $('iframe').attr('src','')
                }, 60000);
                runCommand('video');    
                current_url =window.location.href+":8081";
                current_url = current_url.replace("http://", "");
                current_url = current_url.replace("/", "");
                current_url = current_url.replace("#", "");
                $('iframe').attr('src',"http://"+current_url);
                }
            else{

                runCommand('video');
                current_url =window.location.href+":8081";
                current_url = current_url.replace("http://", "");
                current_url = current_url.replace("/", "");
                current_url = current_url.replace("#", "");
                $('iframe').attr('src',"http://"+current_url);

                }
            
            }



                  function runCommand(command)
                  {


                    $.ajax({
                        url: "commands.php",
                        type: "POST",
                        data: { command: command },
                        success: function(data){
                        
                        },
                        error: function(){
                              console.log("yyyyyyy");
                        }
                    }).then(function(){step0()})//.then(function(){step1()})
                    
                   
                  }


        
        function step0()
        {

              $.ajax({
            url: "commands2.php",
            type: "POST",
            data: { command: "info" },
            success: function(data){
                console.log("v1");
                step2();
            },
            
            error: function(){
                    console.log("yyyyyyy");
            }
            })
        }





                function step1()
        {

              $.ajax({
            url: "commands2.php",
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
        

        function step2()
        {
         $.ajax({
            url: "get_info.php",
            type: "POST",
            success: function(data){
                console.log(data);
                current_temp =data;
                buttons_info= data;
                if(buttons_info==""||buttons_info.substring(11,14)!="end"){step0();}
                else 
                    {
                        fixButtonsStyle();
                        getTemp(current_temp);
                        buttons_info="";
                        loaderGif('off');
                    }
                

            },
            error: function(){
                    console.log("yyyyyyy");
            }
            })

        }


        function fixButtonsStyle()
        {

        //buttons_info = buttons_info.replace("start", "");
        //buttons_info = buttons_info.replace("end1", "");
        buttons_info= buttons_info.substring(5, 11);
        for(var x=5;x!=-1;x--)
        {
          if(buttons_info[x]==0)
          {
            $("#all-buttons .buttons-big:eq("+x+") img").css('filter','blur(0px)');
          }
          else
          {
            $("#all-buttons .buttons-big:eq("+x+") img").css('filter','blur(3px)');
          }

        }
        }
        function getTemp(current_temp)
        {
            var reg_string = current_temp.match(/Salinity=.(?:(?!w).)*/g);// get the salinity
            current_temp = current_temp.replace(reg_string,'');// remove the salinity from string
            Salinity(reg_string);// convert numbers to the real salinity 
            getMaxTemp();
            $("#water_temp").text(current_temp.substring(25,30)+"°C");
            if(current_temp.substring(25,30)>30)$("#water_temp").css("color","red")
            $("#home_humidity").text(current_temp.substring(44,49)+"%");
            if(current_temp.substring(44,49)>80)$("#home_humidity").css("color","red")
            $("#home_temp").text(current_temp.substring(66,71)+"°C");
            if(current_temp.substring(66,71)>40)$("#home_temp").css("color","red")
        }


function loaderGif(todo)
{
    todo=="on"?$("#loader").css("display","block"):$("#loader").css("display","none");;
    
}

function Salinity(reg_string)
{

    var salinity_number = reg_string[0].replace("Salinity=",""); 
    salinity_number=+salinity_number;
    console.log("aultra sonic:"+salinity_number);
    switch (true)
    {
        case  (salinity_number >79) :
        $("#salinity").text('LOW');
        $("#salinity").css('color','red');
        break;
        case  (80>salinity_number && salinity_number >77) :
        $("#salinity").text('1.019');
        $("#salinity").css('color','red');
        break;
        case  (78>salinity_number && salinity_number >72) :
        $("#salinity").text('1.020');
        $("#salinity").css('color','blue');
        break;
        case  (salinity_number ==72) :
        $("#salinity").text('1.021');
        $("#salinity").css('color','blue');
        break;
        case  (72>salinity_number && salinity_number >104) :
        $("#salinity").text('1.022');
        $("#salinity").css('color','blue');
        break;
        case  (70>salinity_number && salinity_number >68) :
        $("#salinity").text('1.023');
        $("#salinity").css('color','blue');
        break;
        case  (68>salinity_number && salinity_number >66) :
        $("#salinity").text('1.024');
        $("#salinity").css('color','red');
        break;
        case  (salinity_number < 66) :
        $("#salinity").text('height');
        $("#salinity").css('color','red');
        break;
    }



}
function updateMaxTemp()
{
    
    var current_max_temp =  $('#max_temp_number').val();    
    var current_max_active = $('#active_max_temp_number:checked').length;  
    
    $.ajax({
        url: "max_temp_json/update_max_temp.php",
        type: "POST",
        data: { updat_max: current_max_temp ,active_max:current_max_active },
        success: function(data){
            console.log("v1vvvvvvvvvvvvvv");
            
        },
        
        error: function(){
                console.log("yyyyyyy");
        }
        })
}

function getMaxTemp()
{
    $.ajax({
        url: "max_temp_json/max_temp_json.php",
        type: "POST",
        success: function(data){
            console.log(data);        
            console.log(JSON.parse(data));        
            var max_temp =JSON.parse(data);    
            console.log(JSON.parse(max_temp.max_temp));        
            $('#max_temp').text(max_temp.max_temp);    
            max_temp.activ==1?$('#activation').text('Active'):$('#activation').text('Not Active');    
            max_temp.activ==1?$('#activation').css('background-color','green'):$('#activation').css('background-color','white');    
        },
        
        error: function(){
                console.log("yyyyyyy");
        }
        })
}