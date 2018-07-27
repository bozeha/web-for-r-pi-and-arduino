

global_json ={};

//window.setInterval(function(){
$.getJSON( "https://api.ipify.org?format=json", function( json ) {
  console.log( "ip: " + json.ip );
  global_json['ip'] =json.ip;
 }).then(function(){
 var current_time =getTime();
$.ajax({
        url: "http://justdo.co.il/aqua/content/send-ip.php",
        type: "GET",
        data: {'ip':global_json['ip'],'name':'boaz','date':current_time},
        success: function (result) {
            console.log(result);
      },
  error: function (request, status, error) {
        //alert(request.responseText);
    console.log(error);
    }   
});

})

//}, 1000 );

function getTime()
{
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today = mm + '/' + dd + '/' + yyyy;

var dt = new Date();
var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
today = today+" T"+time;

return today;

}
//var arr = { City: 'Moscow', Age: 25 };