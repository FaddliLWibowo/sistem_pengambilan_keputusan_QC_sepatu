<?php
$nama_gejala=$_REQUEST['nama_gejala'];

if ($aksi=="del")
{
mysql_query("delete from master_gejala where id='$id'");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<a href="index.php?menu=master_gejala&aksi=add">Tambah</a>
<table border="0" cellpadding="2" cellspacing="2">
<tr bgcolor="#FFFF66">
<td width="50" height="30" align="center">NO.</td>
<td width="350" align="center">NAMA GEJALA</td>
<td colspan="2">&nbsp;</td>
</tr>
<?php
if ($aksi=="add")
{
?>
<tr>
<form method="post" action="insert_gejala.php">
  <td align="center" height="30">&nbsp;</td>
  <td align="center"><input type="text" name="nama_gejala" value="<?php echo $nama_gejala; ?>" size="50" /></td>
  <td width="50" align="center"><input type="submit" value=" Simpan " /></td>
  <td width="50" align="center"><input type="button" value=" Batal " onclick="parent.location='index.php?menu=master_gejala'" /></td>
</form>
</tr>
<?php
}
elseif ($aksi=="edit")
{
$strsql="select * from master_gejala where id='$id'";
$hasil=mysql_query($strsql);
$row=mysql_fetch_array($hasil);
?>
<tr>
<form method="post" action="update_gejala.php">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
  <td align="center" height="30">&nbsp;</td>
  <td align="center"><input type="text" name="nama_gejala" value="<?php echo $row[master_gejala]; ?>" size="50" /></td>
  <td width="50" align="center"><input type="submit" value=" Simpan " /></td>
  <td width="50" align="center"><input type="button" value=" Batal " onclick="parent.location='index.php?menu=master_gejala'" /></td>
</form>
</tr>
<?php
}
$strsql="select * from master_gejala order by id asc";
$hasil=mysql_query($strsql);
while($row=mysql_fetch_array($hasil))
{
$no++;
if ($no%2<>0) {$warna="#efefef";} else {$warna="#dddddd";}
?>
<tr bgcolor="<?php echo $warna; ?>">
  <td align="center" height="30"><?php echo $no; ?></td>
  <td align="left"><?php echo $row[master_gejala]; ?></td>
  <td width="50" align="center"><a href="index.php?menu=master_gejala&aksi=edit&id=<?php echo $row[id]; ?>">Edit</a></td>
  <td width="50" align="center"><a href="index.php?menu=master_gejala&aksi=del&id=<?php echo $row[id]; ?>" onClick="return confirmdelete('Data ini');">Delete</a></td>
</tr>
<?php
}
mysql_free_result($hasil);
?>
</table>
</body>
</html>
