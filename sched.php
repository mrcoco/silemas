<?php

@require_once ('auth/auth.php');
requiresRole ('piket');

@require_once ('ui/page.php');
@require_once ('sched/sched.php');

?>

<div id="daftar-jadwal">
 <table>
  <caption>Daftar Jadwal</caption>
  <thead>
   <td>&gt;</td>
   <td>ID</td>
   <td>Deskripsi</td>
   <td>Kurikulum</td>
   <td>Hapus</td>
  </thead>

<?php

	$schedules = getSchedules ();
	foreach ($schedules as $sched)
	{
		if ($sched['current'] == "1")
		{
            $csched = $sched;
			echo "<tr id=\"current-sched\">\n";

            echo "<td><span style=\"font-weight: bold;\">*</span></td>\n";
		}
		else
		{
			echo "<tr>\n";

            echo "<td>\n<form action=\"sched/\" method=\"post\">\n";
            echo "<input type=\"hidden\" name=\"id\" value=\"$sched[id]\" />\n";
            echo "<input type=\"hidden\" name=\"action\" value=\"current\" />\n";
            echo "<input type=\"submit\" value=\"set\" />\n";
            echo "</form>\n</td>\n";
		}

		echo "<td>$sched[id]</td>\n";
		echo "<td>$sched[description]</td>\n";
		echo "<td>$sched[kurikulum]</td>\n";

		echo "<td>\n<form action=\"sched/\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"id\" value=\"$sched[id]\" />\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"remove\" />\n";
		echo "<input type=\"submit\" value=\"Hapus\" />\n";
		echo "</form>\n</td>\n";
		echo "</tr>\n";
	}

?>

  <tfoot>
   <td cellspan="4">
    <form action="sched/" method="post">
     <input type="hidden" name="action" value="add" />
     <input type="submit" value="Tambah" />
    </form>
   <td>
  </tfoot>

 </table>
</div>

<div id="info-jadwal">
 <form action="sched/" method="post">
  <input type="hidden" name="action" value="edit" />
  <input type="hidden" name="id" value="<?php echo $csched['id']; ?>" />
  <label for="description">Deskripsi:</label>
  <input type="text" name="description" value="<?php
       echo $csched['description'];
   ?>" />
  <label for="kurikulum">Kurikulum:</label>
  <input type="text" name="kurikulum" value="<?php
       echo $csched['kurikulum'];
   ?>" />
  <input type="submit" value="Simpan" />
 </form>
</div>

<?php endPage (); ?>
