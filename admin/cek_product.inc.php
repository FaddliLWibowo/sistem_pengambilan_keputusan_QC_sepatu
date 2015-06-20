<?php
//$key=$_REQUEST['key'];
$id_gejala=$_REQUEST['id_gejala'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<table width="800" border="0" cellpadding="1" cellspacing="1">
<tr>
<td width="400" valign="top">
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td height="30" align="center" bgcolor="#FFFF66" colspan="2">Cek Produk</td>
</tr>
<form method="post" action="cek_product.inc.php">
<input type="hidden" name="id_penyakit" value="<?php echo $id_penyakit; ?>" />
<?php
$strsql="select * from master_gejala order by id asc";
$hasil=mysql_query($strsql);
$rt = mysql_num_rows($hasil);
echo "<input type='hidden' name='jml' value='$rt'>";
while($row=mysql_fetch_array($hasil))
{
$no++;
if ($no%2<>0) {$warna="#efefef";} else {$warna="#dddddd";}
?>
<tr bgcolor="<?php echo $warna; ?>">
  <td align="center" width="10%"><input type="checkbox" name="id_gejala[]" value="<?php echo $row[id]; ?>" /></td>
  <td height="25" width="90%">Apakah <?php echo $row[master_gejala]; ?> ?...</td>
</tr>
<?php
}
?>
<tr>
  <td height="25" colspan="2">&nbsp;&nbsp;<input type="submit" value=" Penyakit Anda !!! " /></td>
</tr>
</form>
</table>
</td>
<td width="50">&nbsp;</td>
<td width="350" valign="top">
<?php
if (isset($id_gejala))
{
	$pjg_array=count($id_gejala);
	for($k=0;$k<$pjg_array;$k++)
	{
		$ok=$ok+$id_gejala[$k];
	}
	$strsql_temuan="select * from master_penyakit where nilai_temuan='$ok'";
	$hasil_temuan=mysql_query($strsql_temuan);
	echo "HASIL DIAGNOSIS SISTEM PAKAR MENGATAKAN, BAHWA ANDA TERSERANG PENYAKIT:";
	while($row_temuan=mysql_fetch_array($hasil_temuan))
	{
	 echo $row_temuan[master_penyakit].",";
	}
}
?>
</td>
</tr>
</table>
</body>
</html>