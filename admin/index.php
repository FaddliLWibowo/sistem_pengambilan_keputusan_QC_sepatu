<?php
include ".../config.php";
$menu=$_REQUEST['menu'];
$aksi=$_REQUEST['aksi'];
$id=$_REQUEST['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>EXPERT SYSTEM</title>
<script language="javascript" src="jscript.js" type="text/javascript"></script>
</head>
<body>
EXPERT SYSTEM BASED ON PHP & MySQL <br />
 <br /><br />
<a href="index.php">Home</a> | <a href="index.php?menu=master_gejala">Master Gejala</a> | <a href="index.php?menu=master_penyakit">Master Penyakit</a> | <a href="index.php?menu=seting_rule">Seting Rule</a> | <a href="index.php?menu=keluhan_pasien">Keluhan Pasien</a>
<p>
<?php 
if (isset($menu))
{ include $menu.".inc.php"; }
else
{ echo "<br><br>SHORT ALGORITHM PRODUCE WONDERFULL OUTPUT, <br>dibalik Tampilan Yang Sederhana ini tersimpan Methode yang Cantik"; }
?>
</p>
</body>
</html>
