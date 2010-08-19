<?php

@require_once ('auth/auth.php');
requiresRole ('piket');

@require_once ('subj/subj.php');
@require_once ('ui/page.php');

?>

<div id="subject-table">
 <table>
  <thead>
   <td>Kode</td>
   <td>Nama</td>
   <td>Hapus</td>
  </thead>
<?php

	$subjects = getSubjects ();
	foreach ($subjects as $s)
	{
		echo "<tr>\n";
		echo "<td>$s[id]</td>\n";
		echo "<td>$s[description]</td>\n";

		echo "<td>\n";
		echo "<form action=\"subj/\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"id\" value=\"$s[id]\" />\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"remove\" />\n";
		echo "<input type=\"submit\" value=\"Hapus\" />\n";
		echo "</form>\n";
		echo "</td>\n";

		echo "</tr>\n";
	}

?>
 </table>
</div>

<div id="add-subject">
 <form action="subj/" method="post">
  <label for="id">ID:</label>
  <input type="text" name="id" id="id" />
  <label for="description">Deskripsi</label>
  <input type="text" name="description" id="description" />
  <input type="hidden" name="action" value="add" />
  <input type="submit" value="Tambah MK" />
 </form>
</div>

<?php endPage (); ?>
