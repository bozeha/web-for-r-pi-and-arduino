
<?php
if (isset($_POST['command']))
{
    switch($_POST['command'])
    {
        case "fan":
        case "empty":
        case "light":
        case "skimmer":
        case "upload":
        case "wave":
        case "feed":
        case "info":
        $command = escapeshellcmd("sudo python ".$_POST['command'].".py");
        $output = shell_exec($command);
        echo $output;
        break;

        case "video":
        $command = escapeshellcmd("sudo motion");
        $output = shell_exec($command);
        echo $output;
        break;


        case "close-video":
        $command = escapeshellcmd("sudo service motion stop");
        $output = shell_exec($command);
        echo $output;
        break;
        
        case "reboot":
        $command = escapeshellcmd("sudo reboot");
        $output = shell_exec($command);
        echo "$output";
        break;

    }  
}


?>