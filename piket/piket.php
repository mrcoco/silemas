<?php

if (!@include_once ('db/db.php'))
{
	@require_once ('../db/db.php');
}

if (!@include_once ('sched/sched.php'))
{
	@require_once ('../sched/sched.php');
}

$days = array ("MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN");

function addPiket ($npm, $subj, $day, $hour)
{
	$schid = getCurrentSchedule ();
	return dbQuery ("insert into piket values (".
			"'$schid[id]', '$npm', '$subj', '$day', '$hour');");
}

function removePiket ($npm, $subj, $day, $hour)
{
	$schid = getCurrentSchedule ();
	return dbQuery ("delete from piket where ".
			"id_jadwal = '$schid[id]' and ".
			"npm = '$npm' and ".
			"id_subject = '$subj' and ".
			"day = '$day' and ".
			"hour = '$hour';");
}

function getPiket ()
{
	global $days;
	$schid = getCurrentSchedule ();
	$res = dbResult (dbQuery ("select * from piket where ".
				"id_jadwal = '$schid[id]';"));
	$rv = array ();

	foreach ($days as $d)
	{
		$rv[$d] = array ();
		for ($i = 8; $i < 20; ++$i)
		{
			$rv[$d][$i] = array ();
		}
	}

	foreach ($res as $r)
	{
		$rv[$r['day']][$r['hour']][] = array (
			"npm" => $r['npm'],
			"id_subject" => $r['id_subject']
		);
	}

	return $rv;
}

?>
