<?php
include ".../config.php";
$nama_penyakit=$_REQUEST['nama_penyakit'];

$strsql="INSERT INTO master_penyakit (master_penyakit,nilai_temuan) VALUES ('$nama_penyakit','0')";

if (empty($nama_penyakit))
{
echo "<script>alert('Anda Belum Memasukkan NAMA PENYAKIT'); document.location.href='index.php?menu=master_penyakit&aksi=add';</script>";
}
else
{
mysql_query($strsql);
header("location:index.php?menu=master_penyakit");
}
?>