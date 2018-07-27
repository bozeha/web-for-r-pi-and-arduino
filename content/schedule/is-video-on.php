
<?php

    

// command to see nubmer of users on port 8081
exec('netstat -plan | grep :8081 | wc -l', $outputArray);
if($outputArray[0] >1)
{
    
    echo ($outputArray[0]."aaaa");
}
else 
{

   exec('sudo service motion restart');

    exec('sudo service motion stop');


}


?>
