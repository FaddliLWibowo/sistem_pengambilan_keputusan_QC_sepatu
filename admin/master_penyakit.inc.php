<?php
$master_penyakit=$_REQUEST['master_penyakit'];

if ($aksi=="del")
{
mysql_query("delete from master_penyakit where id='$id'");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<a href="index.php?menu=master_penyakit&aksi=add">Tambah</a>
<table border="0" cellpadding="2" cellspacing="2">
<tr bgcolor="#FFFF66">
<td width="50" height="30" align="center">NO.</td>
<td width="350" align="center">NAMA PENYAKIT </td>
<td colspan="2">&nbsp;</td>
</tr>
<?php
if ($aksi=="add")
{
?>
<tr>
<form method="post" action="insert_penyakit.php">
  <td align="center" height="30">&nbsp;</td>
  <td align="center"><input type="text" name="nama_penyakit" value="<?php echo $nama_penyakit; ?>" size="50" /></td>
  <td width="50" align="center"><input type="submit" value=" Simpan " /></td>
  <td width="50" align="center"><input type="button" value=" Batal " onclick="parent.location='index.php?menu=master_penyakit'" /></td>
</form>
</tr>
<?php
}
elseif ($aksi=="edit")
{
$strsql="select * from master_penyakit where id='$id'";
$hasil=mysql_query($strsql);
$row=mysql_fetch_array($hasil);
?>
<tr>
<form method="post" action="update_penyakit.php">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
  <td align="center" height="30">&nbsp;</td>
  <td align="center"><input type="text" name="nama_penyakit" value="<?php echo $row[master_penyakit]; ?>" size="50" /></td>
  <td width="50" align="center"><input type="submit" value=" Simpan " /></td>
  <td width="50" align="center"><input type="button" value=" Batal " onclick="parent.location='index.php?menu=master_penyakit'" /></td>
</form>
</tr>
<?php
}
$strsql="select * from master_penyakit order by id asc";
$hasil=mysql_query($strsql);
while($row=mysql_fetch_array($hasil))
{
$no++;
if ($no%2<>0) {$warna="#efefef";} else {$warna="#dddddd";}
?>
<tr bgcolor="<?php echo $warna; ?>">
  <td align="center" height="30"><?php echo $no; ?></td>
  <td align="left"><?php echo $row[master_penyakit]; ?></td>
  <td width="50" align="center"><a href="index.php?menu=master_penyakit&aksi=edit&id=<?php echo $row[id]; ?>">Edit</a></td>
  <td width="50" align="center"><a href="index.php?menu=master_penyakit&aksi=del&id=<?php echo $row[id]; ?>" onClick="return confirmdelete('Data ini');">Delete</a></td>
</tr>
<?php
}
mysql_free_result($hasil);
?>
</table>
</body>
</html>
