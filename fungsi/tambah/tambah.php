<?php 
	require '../../config.php';
	if(!empty($_GET['kategori'])){
		$nama= $_POST['kategori'];
		$tgl= date("j F Y, G:i");
		$data[] = $nama;
		$data[] = $tgl;
		$sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
	}
	if(!empty($_GET['barang'])){
		$id = $_POST['id'];
		$kategori = $_POST['kategori'];
		$nama = $_POST['nama'];
		$jual = $_POST['jual'];
		$stok= $_POST['stok'];
		
		$data[] = $id;
		$data[] = $kategori;
		$data[] = $nama;
		$data[] = $jual;
		$data[] = $stok;
		$sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,harga_jual,stok) 
			    VALUES (?,?,?,?,?) ';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
	}
	if(!empty($_GET['pelanggan'])){
	
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telpon = $_POST['telpon'];
	
		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $telpon;
		$sql = 'INSERT INTO pelanggan (nm_pel,almt_pel,no_tlp) 
			    VALUES (?,?,?) ';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=pelanggan&success=tambah-data"</script>';
	}
	
	
		?>