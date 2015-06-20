<?php
session_start();
require_once('conn.php');
include_once('cek-login.php');
if ($_SESSION['role'] != 'admin') {
    header('location: barang.php');
}
if(isset($_POST['krim'])){
$text="INSERT INTO barang (idbarang,kode_barang,chasis,type,spec,nama_barang,qty,harga)
		VALUES ('".$_POST['idbarang']."',
                        '".$_POST['kode_barang']."',
                        '".$_POST['chasis']."',   
                        '".$_POST['type']."',
                        '".$_POST['spec']."',
                        '".$_POST['nama_barang']."',
                        '".$_POST['qty']."',
			'".$_POST['harga']."')";			
$query=mysql_query($text);
if ($query){
	header("l");

	}else{
		echo mysql_error() ;
	}
}
include("top.php");
?>
<style>
body {background:url(gfx/bg.png);}
</style>
<form method="post" id="save">
    <table class="table top-block">
    <tr>
                <td><input type="hidden" name="idbarang" ></td>
	</tr>
        <tr>
		<td>Kode barang</td>
		<td>:<input type="text" name="kode_barang"></td>
	</tr>
        <tr>
		<td>Chasis</td>
		<td>:<input type="text" name="chasis"></td>
	</tr>
        <tr>
		<td>Type</td>
		<td>:<input type="text" name="type"></td>
	</tr>
        <tr>
		<td>Spec</td>
		<td>:<input type="text" name="spec"></td>
	</tr>
    <tr>
		<td>Nama Barang</td>
		<td>:<input type="text" name="nama_barang"></td>
	</tr>
	<tr>
		<td>Qty</td>
		<td>:<input type="text" name="qty"></td>
	</tr>
        <tr>
		<td>Harga</td>
		<td>:<input type="text" name="harga"></td>
	</tr>
		<td></td>
                <td><input type="submit" class="btn btn-small btn-danger" name="krim" value="Simpan"></td>
	</tr>
</table>
</form>
<?php
/*--------------------------------------------------------------------------------------------
|    @desc:        pagination index.php
|    @author:      Aravind Buddha
|    @url:         http://www.techumber.com
|    @date:        12 August 2012
|    @email        aravind@techumber.com
|    @license:     Free!, to Share,copy, distribute and transmit , 
|                  but i'll be glad if i my name listed in the credits'
---------------------------------------------------------------------------------------------*/
include('conn.php');    //include of db config file
include ('paginate.php'); //include of paginat page

$per_page = 8;         // number of results to show per page
$result = mysql_query("SELECT * FROM barang");
$total_results = mysql_num_rows($result);
$total_pages = ceil($total_results / $per_page);//total pages we going to have

//-------------if page is setcheck------------------//
if (isset($_GET['page'])) {
    $show_page = $_GET['page'];             //it will telles the current page
    if ($show_page > 0 && $show_page <= $total_pages) {
        $start = ($show_page - 1) * $per_page;
        $end = $start + $per_page;
    } else {
        // error - show first set of results
        $start = 0;              
        $end = $per_page;
    }
} else {
    // if page isn't set, show first set of results
    $start = 0;
    $end = $per_page;
}
// display pagination
$page = intval($_GET['page']);

$tpages=$total_pages;
if ($page <= 0)
    $page = 1;
	$no=($page-1)*$per_page+1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PaginationWithPHP-techumber.com</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <style type="text/css">
.logo
{
    text-align: center;
}
.container{

}
</style>
</head>
<body>
    <div class="container">
        <div class="row">
        </div>
        <div class="row">
                <div class="mini-layout">
                 <?php
                    $reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
                    echo '<div class="pagination"><ul>';
                    if ($total_pages > 1) {
                        echo paginate($reload, $show_page, $total_pages);
                    }
                    echo "</ul></div>";
                    // display data in table
                    echo "<table class='table table-bordered'>";
                    echo "<thead><tr><th>No</th><th>Kode Barang</th><th>Chasis</th><th>Type</th><th>Spec</th><th>Nama Barang</th><th>Qty</th><th>Harga</th></tr></thead>";
                    // loop through results of database query, displaying them in the table 
                    for ($i = $start; $i < $end; $i++) {
                        // make sure that PHP doesn't try to show results that don't exist
                        if ($i == $total_results) {
                            break;
                        }
                      
                        // echo out the contents of each row into a table
                        echo "<tr " . $cls . ">";
						echo '<td>' . $no++ . '</td>';
                        echo '<td>' . mysql_result($result, $i, 'kode_barang') . '</td>';
						echo '<td>' . mysql_result($result, $i, 'chasis') . '</td>';
						echo '<td>' . mysql_result($result, $i, 'type') . '</td>';
						echo '<td>' . mysql_result($result, $i, 'spec') . '</td>';	
						echo '<td>' . mysql_result($result, $i, 'nama_barang') . '</td>';		
						echo '<td>' . mysql_result($result, $i, 'qty') . '</td>';							
						echo '<td>' . mysql_result($result, $i, 'harga') . '</td>';
						echo "<td><a href='barang_edit.php?idbarang=".mysql_result($result, $i, 'idbarang') ."'>Edit</a></td>";
						echo "<td><a href='barang_delete.php?idbarang=".mysql_result($result, $i, 'idbarang') ."'>Hapus</a></td>";
						echo "<td><a href='cetak_barang.php.php?idbarang=".mysql_result($result, $i, 'idbarang') ."'>Cetak</a></td>";
                        echo "</tr>";
                    }       
                    // close table>
                echo "</table>";
            // pagination
            ?>
            </div>
    </div>
</div>
</body>
</html>
