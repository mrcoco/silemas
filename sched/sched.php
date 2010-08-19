<?php

if (!include_once ('db/db.php'))
{
	require_once ('../db/db.php');
}

function addSchedule ($current)
{
	if (!$current)
	{
		$res = dbResult (dbQuery ("select count (*) from jadwal ".
					"where current = '1';"));

		if ($res[0] == 0)
		{
			$cur = "1";
		}
		else
		{
			$cur = "0";
		}
	}

	if ($current)
	{
		dbQuery ("update jadwal set current = '0';");
		$cur = "1";
	}

	$year = date ("Y");
	$prev = dbResult (dbQuery ("select id from jadwal ".
				"where id like '$year-%';"));
	$max = 0;
	foreach ($prev as $p)
	{
		if ($max < $p['id'][5])
		{
			$max = $p['id'][5];
		}
	}
	++$max;
	
	return dbQuery ("insert into jadwal values ('$year-$max', ".
			"'', '', '$cur');");
}

function removeSchedule ($id)
{
	$rv = dbQuery ("delete from jadwal where id = '$id';");
	$res = dbResult (dbQuery ("select count(*) from jadwal ".
				"where current = '1';"));

	if ($res [0][0] == "0")
	{
		echo "reres<br/>";
		dbQuery ("update jadwal set current = '1' limit 1;");
	}

	return $rv;
}

function makeScheduleCurrent ($id)
{
	if (dbQuery ("update jadwal set current = '0';"))
	{
		dbQuery ("update jadwal set current = '1' where id = '$id';");
	}
	else
	{
		return false;
	}
}

function setScheduleDescription ($id, $description, $kurikulum)
{
	return dbQuery ("update jadwal set description = '$description', ".
			"kurikulum = '$kurikulum' ".
			"where id = '$id';");
}

function getCurrentSchedule ()
{
	$res = dbResult (dbQuery ("select * from jadwal ".
				"where current = '1' limit 1;"));
	return $res[0];
}

function getSchedules ()
{
	return dbResult (dbQuery ("select * from jadwal order by id asc;"));
}

?>
