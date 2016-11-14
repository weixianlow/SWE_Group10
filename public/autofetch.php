<?php
shell_exec('cd /var/www/html/test-cs4320/SWE_Group10/');
$output = shell_exec('sudo git pull downstream master');
echo "<pre>$output</pre>";
?>