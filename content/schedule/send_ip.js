var request = require('request');
// Set the headers

var headers = {
    'User-Agent':       'Super Agent/0.0.1',
    'Content-Type':     'application/x-www-form-urlencoded'
}


get_ex_ip();

function update_ip(the_new_ip)
    {
		console.log(the_new_ip);
        // Configure the request
        var options = {
            url: 'http://justdo.co.il/aqua/content/send-ip.php',
            method: 'GET',
            headers: headers,
            qs: {'ip': the_new_ip , 'name': 'boze','date':get_date()}
        }

        // Start the request
        request(options, function (error, response, body) {
            if (!error && response.statusCode == 200) {
                // Print out the response body
                console.log(body+"aaaaaaaaaaaaaaa")
            }
        })
    }

function get_ex_ip()
{
    var options = {
        url: 'http://justdo.co.il/aqua/whatismyip.php',
        method: 'GET',
        headers: headers
    }
    
    // Start the request
    request(options, function (error, response, body) {
        if (!error && response.statusCode == 200) {
            // Print out the response body
             
            update_ip(body);
        }
    })
}

function get_date()
{
    var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
var d = new Date(); // for now
var current_time = d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();


if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today ='Date: '+ dd + '/' + mm + '/' + yyyy + " Time: "+current_time;
return today;
}