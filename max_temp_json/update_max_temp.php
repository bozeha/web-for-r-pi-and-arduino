<?php
if(isset($_POST['updat_max'])&&isset($_POST['active_max']))
{
     $current_max= $_POST['updat_max'] ;
     $active_max = $_POST['active_max'];
}
$current_max ='<?php echo \'{"id":1,"max_temp":'.$current_max.',"activ":'.$active_max.'}\';?>'; 
$file = 'max_temp_json.php';
// Open the file to get existing content
//$current = file_get_contents($file);
// Append a new person to the file
//$current .= "John Smith\n";
// Write the contents back to the file
file_put_contents($file, $current_max);
?>