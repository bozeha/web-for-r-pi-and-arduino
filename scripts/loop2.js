


var my_ip= '';
global_json ={};
    var current_time =getTime();
    getIp()
 
 function getIp()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET', 'https://api.ipify.org?format=json', true);
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4) {
                if(xmlhttp.status == 200) {
                    var obj = JSON.parse(xmlhttp.responseText);
                    my_ip = obj.ip;
                    console.log(my_ip);
//                    return(my_ip);

global_json = {'ip':my_ip,'name':'boaz','date':current_time}        
         sendData();
  

              }
            }



        }
    xmlhttp.send(null);
    
    
}

 
    
        
    






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

function sendData()
{
//;


//window.location.href = "http://justdo.co.il/aqua/content/send-ip.php?ip="+global_json.ip+"&name="+global_json.name+"&date="+global_json.date;


/*var xhr = new XMLHttpRequest();
//var url = "http://justdo.co.il/aqua/content/send-ip.php?data=" + encodeURIComponent(JSON.stringify(global_json));
var url = "http://justdo.co.il/aqua/content/send-ip.php?ip="+global_json.ip+"&name="+global_json.name+"&date="+global_json.date;
xhr.open("GET", url, true);
xhr.setRequestHeader("Content-type", "application/json");
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        var json = JSON.parse(xhr.responseText);
        console.log(json.email + ", " + json.password);
    }
};
xhr.send();
*/

var xhr = new XMLHttpRequest();
xhr.open("GET","http://justdo.co.il/aqua/content/send-ip.php?ip="+global_json.ip+"&name="+global_json.name+"&date="+global_json.date,true);
xhr.send();


}