<?php
header('Content-Type: application/javascript');
$json =array(
    'success' => false,
    'result' => 0
);


    if(isset($_POST['ip']))
    {
        $ip = (int)$_POST['ip'];

        $json['success'] = true;
    }
  //  $json_obj = json_decode($json_str);

    echo "dddddddd";





?>

