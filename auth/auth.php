<?php

if (!@include_once ('db/db.php'))
{
	@require_once ('../db/db.php');
}

session_start ();

function login ($uid, $pwd)
{
	if (!ldapLogin ($uid, $pwd))
	{
		return false;
	}

	$res = dbResult (dbQuery ("select role from auth where name = '$uid'"));
	$roles = array ();

	foreach ($res as $r)
	{
		$roles[$r['role']] = true;
	}

	if (count ($roles) == 0)
	{
		return false;
	}

	$_SESSION['name'] = $uid;
	$_SESSION['roles'] = $roles;

	return true;
}

function logout ()
{
	unset ($_SESSION['name']);
	unset ($_SESSION['roles']);

	return true;
}

function isLoggedIn ()
{
	if (isset ($_SESSION['name']))
	{
		return $_SESSION['name'];
	}
	else
	{
		return false;
	}
}

function hasRole ($role)
{
	return isset ($_SESSION['roles'][$role]);
}

function requiresRole ($role)
{
	if (!hasRole ($role))
	{
		header ("HTTP/1.1 403 Forbidden");
		echo "<h1>403 Forbidden</h1>";
		die ();
	}
}

?>
