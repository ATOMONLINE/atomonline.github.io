<?php 

/*

Icecast / Shoutcast MP3 Radio Stream 

Shoutcast V1 (http://shoutcast-server-ip:port/) 
Shoutcast V2 (http://shoutcast-server-ip:port/streamname) 
Icecast V2 (http://icecast-server-ip:port/streamname)

Type: Audio
Codec: MPEG Audio layer 1/2 (mpga)
Channels: Stereo
Sample rate: 44100 Hz
Bitrate: 128 kb/s

*/

header('Content-Type: audio/mpeg');

$server = "ohmi-design.com";
$port = "9156";
$mount = "1";

// HTTP Radio Stream URL with Mount Point
$url = "http://".$server.":".$port."/".$mount;

// Open Radio Stream URL
// Make Sure Radio Stream [Port] must be open / allow in this script hosting server firewall 
$f=fopen($url,'r');

// Read chunks maximum number of bytes to read
if(!$f) exit;
while(!feof($f))
{
	echo fread($f,96);  
	flush();
}
fclose($f);

?>