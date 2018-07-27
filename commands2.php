
<?php
if (isset($_POST['command']))
{
    switch($_POST['command'])
    {
        case "refresh":
        $command = escapeshellcmd("sudo python ".$_POST['command'].".py");
        $output = shell_exec($command);
        echo $output;
        break;

        case "info":
        $command = escapeshellcmd("sudo python ".$_POST['command'].".py");
        $output = shell_exec($command);
        echo $output;
        break;

        case "temp":
        $command = escapeshellcmd("sudo python ".$_POST['command'].".py");
        $output = shell_exec($command);
        echo $output;
        break;

    }  
}


?>