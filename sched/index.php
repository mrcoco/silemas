<?php

@require_once ('../auth/auth.php');
requiresRole ('piket');

@require_once ('sched.php');

// TODO: authenticate

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	header ("Location: $_SERVER[HTTP_REFERER]");
	header ("Content-type: text/plain");

	if ($_POST['action'] == "add")
	{
		if (addSchedule ($_POST['description'], true))
		{
			echo 0;
		}
		else
		{
			echo 1;
		}
	}
	else if ($_POST['action'] == "current")
	{
		if (makeScheduleCurrent ($_POST['id']))
		{
			echo 0;
		}
		else
		{
			echo 1;
		}
	}
	else if ($_POST['action'] == "edit")
	{
		if (setScheduleDescription ($_POST['id'], $_POST['description'],
					$_POST['kurikulum']))
		{
			echo 0;
		}
		else
		{
			echo 1;
		}
	}
	else if ($_POST['action'] == "remove")
	{
		if (removeSchedule ($_POST['id']))
		{
			echo 0;
		}
		else
		{
			echo 1;
		}
	}
}
else
{
	header ("HTTP/1.1 404 Not Found");
	echo "<h1>404 Not Found</h1>";
	die ();
}

?>
