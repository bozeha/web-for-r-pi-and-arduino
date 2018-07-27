
var request = require("request");

request({
  uri: "http://localhost/content/schedule/is-video-on.php",
  method: "POST",
  form: {
    command: ""
  }
}, function(error, response, body) {

});


