    <?php
header('Content-Type: application/json');
if (isset($_POST['options_from_db'])) { 
    $update_array =$_POST['options_from_db'];
// echo json_encode($update_array);
} 
////////// send elements control to db 



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

//echo "xxx";
foreach ($update_array["element"] as $value) {
mysqli_query($conn,"UPDATE time_control SET active='".$update_array["active"][$loop]."' WHERE element='".$update_array["element"][$loop]."'");
mysqli_query($conn,"UPDATE time_control SET hour_start='".$update_array["hour_start"][$loop]."' WHERE element='".$update_array["element"][$loop]."'");
mysqli_query($conn,"UPDATE time_control SET hour_end='".$update_array["hour_end"][$loop]."' WHERE element='".$update_array["element"][$loop]."'");

$loop++;
}


mysqli_close($conn);  
?>
