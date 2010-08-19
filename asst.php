<?php

@require_once ('auth/auth.php');
requiresRole ('piket');

@require_once ('asst/asst.php');
@require_once ('subj/subj.php');
@require_once ('ui/page.php');

?>

<div id="asst-list">
 <table>
  <thead>
   <td>NPM</td>
   <td>Nama</td>
   <td>Mata Kuliah</td>
   <td>Hapus</td>
  </thead>
<?php

	$assts = getAsisten ();
	foreach ($assts as $a)
	{
		echo "<tr>\n";
		echo "<td>$a[npm]</td>\n";
		echo "<td>$a[name]</td>\n";
		echo "<td>$a[description]</td>\n";
		echo "<td>\n";
		echo "<form action=\"asst/\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"npm\" value=\"$a[npm]\" />\n";
		echo "<input type=\"hidden\" name=\"id_subject\" ".
			"value=\"$a[id_subject]\" />\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"remove\" />\n";
		echo "<input type=\"submit\" value=\"Hapus\" />\n";
	}

?>
 </table>
</div>

<div id="tambah-asisten">
 <form action="asst/" method="post">
  <label for="npm">NPM:</label>
  <!--select name="npm">
<?php

?>
  </select-->
  <input type="text" name="npm" />
  <label for="id_subject">Mata Kuliah:</label>
  <select name="id_subject">
<?php

	$subjs = getSubjects ();
	foreach ($subjs as $s)
	{
		echo "<option value=\"$s[id]\">$s[description]</option>\n";
	}

?>
  </select>
  <input type="hidden" name="action" value="add" />
  <input type="submit" value="Tambah" />
 </form>
</div>

<?php endPage (); ?>
