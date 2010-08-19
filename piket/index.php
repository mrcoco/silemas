<?php

@require_once ('../auth/auth.php');
requiresRole ('piket');

@require_once ('piket.php');

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	header ("Content-type: text/plain");
	header ("Location: $_SERVER[HTTP_REFERER]");

	if ($_POST['action'] == "add")
	{
		$asst = split (":", $_POST['npm']);
		if (addPiket ($asst[1], $asst[0], $_POST['day'], $_POST['hour']))
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
		if (removePiket ($_POST['npm'], $_POST['id_subject'],
					$_POST['day'], $_POST['hour']))
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
