<?php

$password = ''; // fill your own
mysql_connect ("localhost", "asisten", $password);
mysql_select_db ("asisten");

function dbQuery ($sql)
{
	return mysql_query ($sql);
}

function dbResult ($res)
{
	$rv = array ();
	while ($row = mysql_fetch_array ($res))
	{
		$rv[] = $row;
	}
	return $rv;
}

function ldapLogin ($uid, $pwd)
{
	$ds = ldap_connect ("ldaps.cs.ui.ac.id");
	$res = ldap_bind ($ds);

	if ($res)
	{
		$res = ldap_search ($ds, "o=Universitas Indonesia, c=ID",
				"uid=$uid");
		$entries = ldap_get_entries ($ds, $res);

		if ($entries['count'] == 1)
		{
			$res = @ldap_bind ($ds, $entries[0]['dn'], $pwd);
			if ($res)
			{
				return true;
			}
		}
	}

	return false;
}

function ldapGet ($info, $param)
{
	$ds = ldap_connect ("ldaps.cs.ui.ac.id");
	$res = ldap_bind ($ds);
	$rv = array ();

	if (!is_array ($info))
	{
		$info = array ($info);
	}

	if ($res)
	{
		$res = ldap_search ($ds, "o=Universitas Indonesia, c=ID",
				$param, $info);
		$entries = ldap_get_entries ($ds, $res);

		for ($i = 0; $i < $entries['count']; ++$i)
		{
			$val = array ();

			foreach ($info as $inf)
			{
				$val[$inf] = array ();
				for ($j = 0; $j < $entries[$i][$inf]['count']; ++$j)
				{
					$val[$inf][] = $entries[$i][$inf][$j];
				}
			}

			$rv[] = $val;
		}
	}

	return $rv;
}

?>
