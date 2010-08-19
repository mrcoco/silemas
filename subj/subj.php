<?php

if (!@include_once ('db/db.php'))
{
	@require_once ('../db/db.php');
}

if (!@include_once ('sched/sched.php'))
{
	@require_once ('../sched/sched.php');
}

function addSubject ($id, $desc)
{
	$curr = getCurrentSchedule ();
	$curr = $curr['kurikulum'];
	return dbQuery ("insert into subject values ('$id', '$curr', '$desc');");
}

function deleteSubject ($id)
{
	$curr = getCurrentSchedule ();
	$curr = $curr['kurikulum'];
	return dbQuery ("delete from subject where id = '$id' ".
			"and kurikulum = '$curr';");
}

function getSubject ($id)
{
	$res = dbResult (dbQuery ("select subject.* from subject, jadwal where ".
				"subject.id = '$id' and ".
				"subject.kurikulum = jadwal.kurikulum and ".
				"jadwal.current = '1' limit 1;"));
	return $res[0];
}

function getSubjects ()
{
	return dbResult (dbQuery ("select subject.* from subject, jadwal ".
				"where subject.kurikulum = jadwal.kurikulum and ".
				"jadwal.current = '1';"));
}

?>
