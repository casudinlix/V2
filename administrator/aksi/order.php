<?php 
include_once '../../setting/server.php';
include_once '../../setting/session.php';

$id = $_GET['id'];
$cek = $conn->query("SELECT * FROM transaksi WHERE id_order='$id'");

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Order masuk</title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
<center>
	<form action="aksi_order.php" method="POST" accept-charset="utf-8">
	<table border="1">
		
		<tr>
		<th colspan="" rowspan="" headers="" scope="">Id Order</th>
		<th colspan="" rowspan="" headers="" scope="">Id Produk</th>
		<th colspan="" rowspan="" headers="" scope="">Qty</th>
		<th colspan="" rowspan="" headers="" scope="">Pemesan</th>
		<th colspan="" rowspan="" headers="" scope="">Tanggal</th>
		<th colspan="" rowspan="" headers="" scope="">Type Order</th>
		<th colspan="" rowspan="" headers="" scope="">Bukti Pembayaran</th>
		<th colspan="" rowspan="" headers="" scope="">Biaya Kirim</th>
		<th colspan="" rowspan="" headers="" scope="">Status</th>
		<th colspan="" rowspan="" headers="" scope="">Aksi</th>
		</tr>
		<tbody>
			<?php while ( $data = $cek->fetch_array()) {
				# code...
			?>

				<tr>
				<td rowspan=""><?php echo $data['id_order']; ?></td>

				<td><?php echo $data['id_produk']; ?></td>
				<td><?php echo $data['qty']; ?></td>
				<td><?php echo $data['username']; ?></td>
				
				<td><?php echo $data['tanggal']; ?></td>

				<td><?php echo $data['type_order']; ?></td>
				<td><a href="../../user/bukti/<?php echo $data['bukti_transfer'];?>" title="" target='_blank'>Attachment</td></a>

				<td><?php echo $data['biaya']; ?></td>

				<td>

						<?php echo $data['status']; ?>


				</td>

				</tr>

<?php }?>
		</tbody>
		</table>
		<table></table>
		<td colspan="" rowspan="" headers=""><input type="submit" name="submit" value="Approve"></td>
	</form>


</center>
 </body>
 </html>

 <?php 

  ?>