<?php
$id_gejala=$_REQUEST['id_gejala'];
$id_penyakit=$_REQUEST['id_penyakit'];
$id_gejala=$_REQUEST['id_gejala'];
$id_transaksi=$_REQUEST['id_transaksi'];

if (empty($id_penyakit))
{
$id_penyakit=1;
}

if ($aksi=="del")
{
mysql_query("DELETE FROM transaksi WHERE id='$id_transaksi'");
mysql_query("UPDATE master_penyakit SET nilai_temuan=nilai_temuan-'$id_gejala' WHERE id='$id_penyakit'");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<table border="0" cellpadding="1" cellspacing="1" width="800">
<tr>
<td width="350" valign="top">
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td height="30" align="center" bgcolor="#FFFF66" colspan="2">DAFTAR GEJALA</td>
</tr>
<form method="post" action="insert_rule.php">
<input type="hidden" name="id_penyakit" value="<?php echo $id_penyakit; ?>" />
<?php
$strsql="select * from master_gejala where id not in (select id_gejala from transaksi where id_penyakit='$id_penyakit') order by id asc";
$hasil=mysql_query($strsql);
while($row=mysql_fetch_array($hasil))
{
$no++;
if ($no%2<>0) {$warna="#efefef";} else {$warna="#dddddd";}
?>
<tr bgcolor="<?php echo $warna; ?>">
  <td align="center" width="10%"><input type="checkbox" name="id_gejala[]" value="<?php echo $row[id]; ?>" /></td>
  <td height="25" width="90%"><?php echo $row[master_gejala]; ?></td>
</tr>
<?php
}
?>
<tr>
  <td height="25" colspan="2">&nbsp;&nbsp;<input type="submit" value=" Simpan " /></td>
</tr>
</form>
</table>
</td>
<td width="50">&nbsp;</td>
<td width="400" valign="top">
<form method="post" action="index.php?menu=seting_rule">
Nama Penyakit: <select name="id_penyakit" onchange="submit();">
<?php
$strsql_penyakit="select * from master_penyakit order by id asc";
$hasil_penyakit=mysql_query($strsql_penyakit);
while($row_penyakit=mysql_fetch_array($hasil_penyakit))
{
?>
<option value="<?php echo $row_penyakit[id]; ?>" <?php if ($id_penyakit==$row_penyakit[id]) { echo "selected"; } ?>><?php echo $row_penyakit[master_penyakit]; ?></option>
<?php
}
?>
</select>
</form>
<table border="0" cellpadding="1" cellspacing="1" width="100%">
<tr>
<td height="30" align="center" bgcolor="#FFFF66">RULE</td>
<td height="30" align="center" bgcolor="#FFFF66">&nbsp;</td>
</tr>
<?php
$strsql_rule="select c.id as id_transaksi, a.master_gejala, a.id as id_gejala
from master_gejala a, master_penyakit b, transaksi c
where a.id=c.id_gejala and b.id=c.id_penyakit and b.id='$id_penyakit' order by b.id";
$hasil_rule=mysql_query($strsql_rule);
while($row_rule=mysql_fetch_array($hasil_rule))
{
$no++;
if ($no%2<>0) {$warna="#efefef";} else {$warna="#dddddd";}
?>
<tr bgcolor="<?php echo $warna; ?>">
<td height="25"><?php echo $row_rule[master_gejala]; ?></td>
<td align="center"><a href="index.php?menu=seting_rule&id_transaksi=<?php echo $row_rule[id_transaksi]; ?>&aksi=del&id_penyakit=<?php echo $id_penyakit; ?>&id_gejala=<?php echo $row_rule[id_gejala]; ?>" onClick="return confirmdelete('Data ini');">Delete</a></td>
</tr>
<?php
}
?>
</table>
</td>
</tr>
</table>
</body>
</html>
