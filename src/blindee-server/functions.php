<?php

$db = new PDO('mysql:host=127.0.0.1;dbname=blindee', 'root', 'REMOVED');

function getTimers() {
	
	global $db;
	
	$query = $db->prepare("SELECT * FROM timers ORDER BY id DESC");
	$query->execute();

	return $query->fetchAll();

}

function addTimer($action, $time) {

	global $db;
	
	$query = $db->prepare("INSERT INTO timers (id, action, time) VALUES ('', :action, :time)");
	$query->execute([
		'action' => $action,
		'time'   => $time
	]);

}

function deleteTimer($id) {

	global $db;

	$query = $db->prepare("DELETE FROM timers WHERE id = :id");
	$query->execute(['id' => $id]);	

}

getTimers();