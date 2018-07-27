    <?php
header('Content-Type: application/json');
if (isset($_POST['options_feed_from_db'])) { 
    $update_array =$_POST['options_feed_from_db'];
//echo json_encode($update_array);
} 




$servername = "localhost";
$dbname = "aqua";
$username = "boze3";
$password = "boze1234567";
$loop =0;
 $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "err conection !!";
} 

//echo "xxx";
foreach ($update_array["id"] as $value) {
    echo "aaaaa";
mysqli_query($conn,"UPDATE feed_control SET active='".$update_array["active"][$loop]."' WHERE id='".$update_array["id"][$loop]."'");
mysqli_query($conn,"UPDATE feed_control SET hour_feed='".$update_array["hour_feed"][$loop]."' WHERE id='".$update_array["id"][$loop]."'");
echo $loop;
$loop++;
}


mysqli_close($conn);  
?>
