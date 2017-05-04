<?php

$db = new PDO('mysql:host=127.0.0.1;dbname=blindee', 'root', 'REMOVED');

// Grab all from timers.
$result = $db->prepare("SELECT action, time FROM timers");
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {	

	if ($row['time'] == date('H:i')) {

		if ($row['action'] == 'close') {
			shell_exec('sudo python /var/www/html/api/closeBlind.py');
		} else if ($row['action'] == 'open')	{
			shell_exec('sudo python /var/www/html/api/openBlind.py');
		}	
	
	}

	echo "Action: {$row['action']} | Time: {$row['time']}";

}

echo date('H:i');