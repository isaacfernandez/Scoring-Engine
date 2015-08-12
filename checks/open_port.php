<?php
# This will be a template check file
function open_port($address, $args) {

    $starttime = microtime(true);
    $file      = fsockopen ($address, $args[0], $errno, $errstr, 10);
    $stoptime  = microtime(true);
    $status    = 0;

    if (!$file) return false;
    else {
        fclose($file);
	return true;
    }
}
?>
