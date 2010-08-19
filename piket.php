<?php

@require_once ('auth/auth.php');
requiresRole ('piket');

@require_once ('piket/piket.php');
@require_once ('subj/subj.php');
@require_once ('asst/asst.php');
@require_once ('ui/page.php');

?>

<div id="tabel-piket">
 <table>
  <thead>
   <td>Waktu</td>
   <td>Senin</td>
   <td>Selasa</td>
   <td>Rabu</td>
   <td>Kamis</td>
   <td>Jumat</td>
  </thead>
<?php

	$days = array ("MON", "TUE", "WED", "THU", "FRI");
	$piket = getPiket ();
	for ($i = 8; $i < 20; ++$i)
	{
		echo "<tr>\n";
		echo "<td>$i:00</td>\n";

		foreach ($days as $d)
		{
			echo "<td>\n";

			foreach ($piket[$d][$i] as $p)
			{
				$subj = getSubject ($p['id_subject']);
				echo "<form action=\"piket/\" method=\"post\">\n";
				echo "<p>\n";
				echo getAsstName ($p['npm']);
				echo "<br />$subj[description]";
				echo "</p>\n";
				echo "<input type=\"hidden\" name=\"id_subject\" ".
					"value=\"$p[id_subject]\" />\n";
				echo "<input type=\"hidden\" name=\"npm\" ".
					"value=\"$p[npm]\" />\n";
				echo "<input type=\"hidden\" name=\"hour\" ".
					"value=\"$i\" />\n";
				echo "<input type=\"hidden\" name=\"day\" ".
					"value=\"$d\" />\n";
				echo "<input type=\"hidden\" name=\"action\" ".
					"value=\"remove\" />\n";
				echo "<input type=\"submit\" value=\"Hapus\" />\n";
				echo "</form>\n";
			}

			echo "</ul>\n";
			echo "</td>\n";
		}

		echo "</tr>\n";
	}

?>
 </table>
</div>

<div id="tambah-jadwal">
 <form action="piket/" method="post">
  <input type="hidden" name="action" value="add" />
  <label for="npm">Asisten:</label>
  <select name="npm" id="npm">
<?php

	$assts = getAsisten ();
	foreach ($assts as $a)
	{
		echo "<option value=\"$a[id_subject]:$a[npm]\">";
		echo "$a[name] ($a[description])</option>\n";
	}

?>
  </select><br />
  <label for="day">Hari</label>
  <select name="day" id="day">
   <option value="MON">Senin</option>
   <option value="TUE">Selasa</option>
   <option value="WED">Rabu</option>
   <option value="THU">Kamis</option>
   <option value="FRI">Jumat</option>
  </select><br />
  <label for="hour">Jam:</hour>
  <select name="hour" id="hour">
   <option value="8">08:00</option>
   <option value="9">09:00</option>
   <option value="10">10:00</option>
   <option value="11">11:00</option>
   <option value="13">13:00</option>
   <option value="14">14:00</option>
   <option value="15">15:00</option>
   <option value="16">16:00</option>
   <option value="17">17:00</option>
   <option value="18">18:00</option>
   <option value="19">19:00</option>
  </select><br />
  <input type="submit" value="Tambah" />
 </form>
</div>

<?php endPage (); ?>
