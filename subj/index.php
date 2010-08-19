<?php

@require_once ('../auth/auth.php');
requiresRole ('piket');

@require_once ('subj.php');

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	header ("Location: $_SERVER[HTTP_REFERER]");
	header ("Content-type: text/plain");

	if ($_POST['action'] == "add")
	{
		if (addSubject ($_POST['id'], $_POST['description']))
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
		if (deleteSubject ($_POST['id']))
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
