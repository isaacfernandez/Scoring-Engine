<?php
# This will be a template check file
function open_port($address) {

    $starttime = microtime(true);
    $file      = fsockopen ("google.com", 80, $errno, $errstr, 10);
    $stoptime  = microtime(true);
    $status    = 0;

    if (!$file) print "fail";
    else {
        fclose($file);
	print "pass";
    }
}
?>
