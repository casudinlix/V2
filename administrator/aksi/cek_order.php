<?php 
include_once '../../setting/server.php';
include_once '../../setting/session.php';


$cek = $conn->query("SELECT * FROM order_detail");
$cek1 = $conn->query("SELECT * FROM transaksi");
$hasil =$cek1->fetch_array();
$no =0;
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
	<form action="" method="POST" accept-charset="utf-8">
	<table border="1">
		
		<tr>
		<th colspan="" rowspan="" headers="" scope="">No</th>
		<th colspan="" rowspan="" headers="" scope="">Id Order</th>
		
		<th colspan="" rowspan="" headers="" scope="">Pemesan</th>
		<th colspan="" rowspan="" headers="" scope="">Tanggal</th>
		<th colspan="" rowspan="" headers="" scope="">Aksi</th>
		
		
		</tr>
		<tbody>
			
<?php while ( $data = $cek->fetch_array()) {
			
				$no++;
			?>
				<tr>
				<td><?php echo $no; ?></td>
				<td><a href="order.php?id=<?php echo $data['id_order']; ?>"><?php echo $data['id_order']; ?></a></td>

				
				<td><?php echo $data['username']; ?></td>
				
				<td><?php echo $data['tanggal']; ?></td>

				<td colspan="" rowspan="1" headers=""><a href="aksi_order.php?act=hapus&amp;id=<?php echo $data['id_order'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"title="">Hapus</td></a>

				

				
					
				
				</td>
				

				</tr>
			<?php 
		
	}?>

		</tbody>
		
		</table>
		
		
		
	</form>


</center>
 </body>
 </html>