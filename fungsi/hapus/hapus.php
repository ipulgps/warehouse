<?php 
	require '../../config.php';
	if(!empty($_GET['kategori'])){
		$id= $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM kategori WHERE id_kategori=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&&remove=hapus-data"</script>';
	}
	if(!empty($_GET['barang'])){
		$id= $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM barang WHERE id_barang=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang&&remove=hapus-data"</script>';
	}
	if(!empty($_GET['pelanggan'])){
		$id= $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM pelanggan WHERE kd_pel=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=pelanggan&&remove=hapus-data"</script>';
	}
	
	
	if(!empty($_GET['penjualan'])){
		$id= $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM penjualan WHERE id_penjualan=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=laporan&&remove=hapus-data"</script>';
	}
	
?>

