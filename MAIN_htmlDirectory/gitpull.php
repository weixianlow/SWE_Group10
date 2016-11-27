<?php
echo "hello </br>";
$old_path = getcwd();
chdir('/var/www/html/test-cs4320/SWE_Group10/');
echo "directory changed </br>";

$output_dir = shell_exec("ls");
echo "<pre> $output_dir</pre>";
echo shell_exec("whoami");
echo "</br>";
echo shell_exec("git pull downstream master");
echo "command started </br>";
echo "done</br>";
chdir($old_path);
?> 
