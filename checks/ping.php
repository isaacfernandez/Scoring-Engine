<?php
# This will be a template check file
function ping($address) {
                #$package = "\x08\x00\x7d\x4b\x00\x00\x00\x00PingHost";
                #$socket  = socket_create(AF_INET, SOCK_RAW, 1);
                #socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array('sec' => $timeout, 'usec' => 0));
                #socket_connect($socket, $address, null);

                #$ts = microtime(true);
                #socket_send($socket, $package, strLen($package), 0);
                #if (socket_read($socket, 255))
                #        $result = microtime(true) - $ts;
                #else    $result = false;
                #socket_close($socket);

                #return $result;
		return true;
}
?>
