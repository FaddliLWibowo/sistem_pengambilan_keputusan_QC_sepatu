<?php
include ".../config.php";

$id_penyakit=$_REQUEST['id_penyakit'];
$id_gejala=$_REQUEST['id_gejala'];

$pjg_array=count($id_gejala);
for($k=0;$k<$pjg_array;$k++)
{
//isert ke tabel transaksi berdasarkan array (id_gejala) dan id_penyakit
mysql_query("INSERT INTO transaksi (id_penyakit, id_gejala) VALUES ('$id_penyakit','$id_gejala[$k]')");

$ok=$ok+$id_gejala[$k];
}
//update ke tabel master_penyakit berdasarkan nilai_temuan=nilai_temuan yang sekarang ditambah id_penyakit
mysql_query("UPDATE master_penyakit SET nilai_temuan='$ok' WHERE id='$id_penyakit'");

header("location:index.php?menu=seting_rule&id_penyakit=$id_penyakit");
?>