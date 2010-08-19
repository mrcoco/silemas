<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:schemalocation="http://www.w3.org/MarkUp/SCHEMA/xhtml11.xsd"
	xml:lang="en">
 <head>
  <title>SIPLA</title>
  <link rel="stylesheet" type="text/css" href="ui/style.css" />
 </head>
 <body>
  <div id="head">
   <a href="."><h1>Sistem Informasi Lembaga Asisten (SILEMAS)</h1></a>
  </div>
  <div id="nav">
   <ul>
    <li><a href="sched.php">Semester</a></li>
    <li><a href="subj.php">Kuliah</a></li>
    <li><a href="asst.php">Asisten</a></li>
    <li><a href="piket.php">Jadwal</a></li>
   </ul>
  </div>
  <div id="content">
<?php function endPage () { ?>
  </div>
  <div id="footer">
   Copyright &copy; 2010 Lembaga Asisten Fasilkom UI<br />
   All Rights Reserved
  </div>
 </body>
</html>
<?php } ?>
