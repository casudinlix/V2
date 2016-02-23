<<<<<<< HEAD
<?php  
include "../../setting/server.php";
include "../../setting/session.php";


$idt = $_SESSION['nama'];

$query = $conn->query("SELECT username FROM order_user WHERE username = '$idt'");

if ($numRow = $query->num_rows == 0) {
	echo "<script>window.alert('Keranjang Belanja Anda Masih Kosong');</script>";
	echo "<script>window.location = '../user.php';</script>";
}

$id = $_GET['id'];


$query =$conn->query("SELECT * FROM login WHERE nama='$idt'");
$data = $query->fetch_array();

$queryOrd = $conn->query("SELECT * FROM order_detail WHERE username='$idt' ");
$dataOrd =$queryOrd->fetch_array();
?>
<style type="text/css">
	.info{
		border: 2px dashed;
		height: 70px;
		padding-top: 18px;
		padding-left: 7px;
	}
</style>
<div class="row-isi">
	<table width="95%" align="center">
		<tr>
			
		</tr>
	</table>
	<table class="border" width="95%" align="center" border="1" style="margin-top:-50px">
		<tr>
			<td colspan="7" style="padding-bottom:25px;" rowspan="" >
				<table>
					<tr>
						<td width="118px"><b>Nama Lengkap</b></td>
						<td width="10px">:</td>
						<td><?php echo $data['nama']; ?></td>
					</tr>
					<tr>
						<td style="vertical-align:top;"><b>Alamat</b></td>
						<td style="vertical-align:top;">:</td>
						<td><?php echo $data['alamat']; ?></td>
					</tr>
					<tr>
						<td><b>Nomor Telepon</b></td>
						<td>:</td>
						<td><?php echo $data['tlp']; ?></td>
					</tr>
					<tr>
						<td><b>Email</b></td>
						<td>:</td>
						<td><?php echo $data['email']; ?></td>
					</tr>
					<tr>
						<td><b>Nomor Order:</b></td>
						<td>:</td>
						<td><?php echo $id = $_GET['id']; ?></td>
					</tr>
					
				</table>
			</td>
		</tr><br/><br/><br/>
		<tr>
			<th width="25px">No</th>
			<th width="305px">Barang</th>
			<th width="190px">Harga Satuan</th>
			<th width="95px">Jumlah</th>
			<th width="95px">Total Berat</th>
			<th width="190px">Sub Total</th>
			<th width="190px">Status</th>
		</tr>
		<?php 
			$no = 1;

			$total = 0;
			$berat =0;
			$queryTrs = $conn->query("SELECT * FROM transaksi WHERE id_order='$dataOrd[id_order]'");
			while($dataTrs = $queryTrs->fetch_array()){

				$queryPro = $conn->query("SELECT * FROM m_produk WHERE id_produk='$dataTrs[id_produk]'");
				$dataPro = $queryPro->fetch_array();
				$subtotal = $dataPro['harga'] * $dataTrs['qty'];
				$biaya =$dataTrs['biaya'] + $dataTrs['qty'] ;
				
				$total = $total + $subtotal;
				
		?>
		<tr style="height:50px;">
			<td align="center"><?php echo $no; ?></td>
			<td><?php echo $dataPro['nama_produk']; ?></td>
			<td align="center">Rp. <?php echo $dataPro['harga']; ?></td>
			<td align="center"><?php echo $dataTrs['qty']; ?></td>
			<td align="center"><?php echo $dataPro['berat']; ?>-KG</td>
			<td align="center">Rp. <?php echo $subtotal +$biaya; ?></td>
			<td align="center" rowspan="2"><?php echo $dataTrs['status']; ?></td>
		</tr>
		<?php
			$no++;
		 	}
		?>
		<tr style="height:50px;">
			<td colspan="5" align="right"><b style="margin-right: 3px;">Total Biaya</b></td>
			<td align="center" rowspan="3" ><b>Rp. <?php echo $total+$biaya; ?></b></td>
		</tr>
	</table>

</div>
=======
<?php 
include "../../setting/server.php";
include "../../setting/session.php";
$id=$_GET['id'];

$idt = $_SESSION['nama'];
//$query = $conn->query("SELECT * FROM transaksi, m_produk WHERE username='$idt'AND transaksi.id_produk=m_produk.id_produk ");
//$cek = $query->fetch_array();
$query = $conn->query("SELECT * FROM transaksi WHERE username='$idt' AND id_order='$id' ");


 ?>
 <form method="post" action="save_pesan.php">
	<div class="row-isi">
		<table width="95%" align="center">
			<tr>
				<td><h2>Rincian Pembelian :</h2></td>
			</tr>
			<tr>
				<td>
					<a href="../user.php"><input type="button" value="Beli Lagi" ></a>
				</td>
			</tr>
		</table>

		<table border="1"  width="" align="center">
			<tr bgcolor="#75D1FF">
				<th width="">No</th>
				
				
				<th width="">ID Order</th>
				<th width="">Id Produk</th>
				
				<th width="">QTY</th>
				
				<th width="">Status</th>

			</tr>
			<tbody>
			<?php
$no = 0;
				while ($row=$query->fetch_array()) {
					
					$no++;
	
		
					?>
					
					<tr><td colspan="" rowspan="" headers=""><?php echo $no; ?></td>
					
					<td colspan="" rowspan="" headers=""><?php echo $row['id_order']; ?></td>
					<td colspan="" rowspan="" headers=""><?php echo $row['id_produk']; ?></td>
					<td><?php echo $row['qty'];?></td>

						<td><?php echo $row['status'];?></td>
						</td>


					</tr>

			
							
<?php } 

?>
		




</tbody>
			</table>
>>>>>>> d53e5d96353904116fafd489fcce24ba29cd4957
