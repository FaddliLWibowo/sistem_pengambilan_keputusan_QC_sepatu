<?php
include ".../config.php";
$nama_penyakit=$_REQUEST['nama_penyakit'];
$id=$_REQUEST['id'];

$strsql="UPDATE master_penyakit SET master_penyakit='$nama_penyakit' WHERE id='$id'";

if (empty($nama_penyakit))
{
echo "<script>alert('Anda Belum Memasukkan NAMA PENYAKIT'); document.location.href='index.php?menu=master_penyakit&aksi=edit&id=$id';</script>";
}
else
{
mysql_query($strsql);
header("location:index.php?menu=master_penyakit");
}
?>