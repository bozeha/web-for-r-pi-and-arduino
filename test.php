<?php


$x=0;

for(;$x!=-100;$x++)
{

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = $x;
fwrite($myfile, $txt);
fclose($myfile);

}



?>

xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx