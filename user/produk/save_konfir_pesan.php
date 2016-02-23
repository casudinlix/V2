<?php 
include "../../setting/server.php";
include "../../setting/session.php";


$idt = $_SESSION['nama'];
//$id=$_GET['id_order'];
$kode =$_POST['kode'];
$biaya =$_POST['ongkos'];
//$select =$conn->query("SELECT * FROM transaksi WHERE id_order='$id'");
//$data =$select->fetch_assoc();


$foto= $_FILES['bukti']['name'];
$acak = $kode.rand(1,99);
$unic = $acak.$foto;



	
<<<<<<< HEAD
	$sql = $conn->query("UPDATE transaksi SET bukti_transfer='$unic', status='Sedang Verifikasi Data',biaya='$biaya' WHERE id_order='$kode'");
=======
	$sql = $conn->query("UPDATE transaksi SET bukti_transfer='$unic', status='Menunggu Konfirmasi',biaya='$biaya' WHERE id_order='$kode'");
>>>>>>> d53e5d96353904116fafd489fcce24ba29cd4957
	move_uploaded_file($_FILES['bukti']['tmp_name'],"../bukti/".$acak.$_FILES['bukti']['name']);
	echo "<script>window.location = 'sumari.php?id=$kode';</script>";
 ?>