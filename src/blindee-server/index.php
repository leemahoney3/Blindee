<?php

/* Blindee API (Non-Final) */

header("Access-Control-Allow-Origin: *");

require('functions.php');


$blindSecret = "ilikecats";

if (isset($_POST['action']))
	$action = $_POST['action'];
else
	$action = null;

if (isset($_POST['secret']))
	$secret = $_POST['secret'];
else
	$secret = null;

if (empty($action) || empty($secret))
	die("Unauthorized Request.");

/* Otherwise all good, we think.. */

if ($secret != $blindSecret)
	die("Invalid Secret.");

switch($action) {
	case 'open':
		shell_exec('sudo python openBlind.py');
	break;

	case 'close':
		shell_exec('sudo python closeBlind.py');
	break;

	case 'get-timers':
		$timers = json_encode(getTimers());
		echo $timers;
	break;

	case 'set-timer':
		
		$timerAction = $_POST['timerAction'];
		$time   = $_POST['time'];
		addTimer($timerAction, $time);
	break;

	case 'delete-timer':
		$id = $_POST['timer-id'];
		deleteTimer($id);
	break;

	case 'blind-status':
		
		$status = file_get_contents('/var/www/html/api/blindPosition.txt');
		
		echo ($status == '1') ? 'OPEN' : 'CLOSED';

}