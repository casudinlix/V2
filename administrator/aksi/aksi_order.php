<?php 
include_once '../../setting/server.php';
include_once '../../setting/session.php';

	if(isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = "";
}


//
//
if (isset($_GET['act'])) {
	$act=$_GET['act'];
}
if ($act=='hapus') {
$u=$conn->query("SELECT * FROM transaksi WHERE id_order='$id'");
$us=$u->fetch_array();
$foto= $_FILES['bukti_transfer']['name'];
if(file_exists("../../user/bukti/".$us['bukti_transfer'])){
	unlink("../../user/bukti/".$us['bukti_transfer']);
	$delete = $conn->query("DELETE FROM transaksi WHERE id_order='$id'");
	$hapus = $conn->query("DELETE FROM order_detail WHERE id_order='$id'");
}
	if (!$delete) {
		echo $conn->error;
	}else{
		echo "<script>window.alert('Data Berhasil Di Hapus');</script>";
	echo "<script>window.location = 'cek_order.php';</script>";
	}

}

?>