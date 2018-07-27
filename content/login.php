<?php
/* include "../settings/connect.php"; */
session_start();
  $servername = "localhost";
$dbname = "aqua";
$username = "boze3";
$password = "boze1234567";
 
 

if (isset($_POST["password"]) && !empty($_POST["password"])) {
    $current_password = $_POST["password"];
  //echo $current_password;
}else{  
 
}
     
     
     $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

 
 $sql = "SELECT id, name, password FROM users";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
         if($current_password == $row["password"])
        {
        $_SESSION['timeout'] = time();
        $_SESSION["log"] = "true";      
        $response_array['status'] = 'true';
        if (session_status() == PHP_SESSION_NONE) 
        {
            echo "none";
        }
        else
        {
            echo "not null";
        }
        
        }
        else{
         
        }
        
    }
    
}  
else 
{
 
}
 
mysqli_close($conn);  
?>
