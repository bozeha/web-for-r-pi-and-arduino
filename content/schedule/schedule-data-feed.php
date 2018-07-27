<?php
$servername = "localhost";
$dbname = "aqua";
$username = "boze3";
$password = "boze1234567";
$loop =0;


     $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

 
 $sql = "SELECT id, hour_feed, active FROM feed_control";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
            $all_content['id'][$loop] = $row["id"];
            $all_content['hour_feed'][$loop] = $row["hour_feed"];
            $all_content['active'][$loop] = $row["active"];
             $loop++;
             }       
        
        }
        else{
         
        }
$myJSON = json_encode($all_content);
echo json_encode($all_content);
 //echo $all_content['element'][0];
mysqli_close($conn);  
?>
