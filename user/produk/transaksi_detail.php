<?php  
include "../../setting/server.php";
include "../../setting/session.php";


$nama = $_SESSION['nama'];



$id = $_GET['id'];


$query =$conn->query("SELECT * FROM login WHERE nama='$nama'");
$data = $query->fetch_array();

$queryOrd = $conn->query("SELECT * FROM order_detail WHERE id_order='$id' ");
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
						<td><?php echo $id; ?></td>
					</tr>
					
				</table>
			</td>
		</tr><br/><br/><br/>
		<tr>
			<th width="25px">No</th>
			<th width="305px">Barang</th>
			<th width="190px">Harga Satuan</th>
			<th width="95px">Jumlah</th>
			<th width="95px">Berat</th>
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
			<td align="center"><?php echo $dataTrs['biaya'] ?>/Kg</td>
			<td align="center">Rp. <?php echo $subtotal+$biaya; ?></td>
			<td align="center" rowspan=""><?php echo $dataTrs['status']; ?></td>
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

