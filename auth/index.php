<?php

@require_once ('auth.php');

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	header ("Location: $_SERVER[HTTP_REFERER]");
	header ("Content-type: text/plain");

	if ($_POST['action'] == "login")
	{
		if (login ($_POST['uid'], $_POST['password']))
		{
			echo 0;
		}
		else
		{
			echo 1;
		}
	}
	else if ($_POST['action'] == "logout")
	{
		if (logout ())
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
	echo "<h1>404 Not Found</h1>\n";
	die ();
}

?>
