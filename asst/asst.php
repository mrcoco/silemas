<?php

if (!@include_once ('db/db.php'))
{
	@require_once ('../db/db.php');
}

if (!@include_once ('sched/sched.php'))
{
	@require_once ('../sched/sched.php');
}

function addAsisten ($npm, $subject)
{
	$sched = getCurrentSchedule ();
	return dbQuery ("insert into asisten ".
			"values ('$sched[id]', '$npm', '$subject');");
}

function removeAsisten ($npm, $subject)
{
	$sched = getCurrentSchedule ();
	return dbQuery ("delete from asisten where id_jadwal = '$sched[id]' ".
			"and npm = '$npm' and id_subject = '$subject' cascade;");
}

function getAsisten ()
{
	$assts = dbResult (dbQuery ("select asisten.*, subject.description ".
				"from asisten, jadwal, subject ".
				"where jadwal.id = asisten.id_jadwal ".
				"and subject.id = asisten.id_subject ".
				"and jadwal.current = '1';"));
	
	for ($i = 0; $i < count ($assts); ++$i)
	{
		$assts[$i]['name'] = getAsstName ($assts[$i]['npm']);
	}

	return $assts;
}

function getAsstName ($npm)
{
	$val = ldapGet ("cn", "kodeIdentitas=$npm");
	return $val[0]['cn'][0];
	/*
	return "Sebut Saja Mawar";
	*/
}

?>
