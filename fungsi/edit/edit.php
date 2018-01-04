<html>
	<head>
        <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../assets/js/jquery-2.2.3.min.js"></script>
		<style>
			.header{background:#53B773; color:#fff;}
			#main-content{ background:#fff;}
			
			#hidden {display:none}
			#progress-bar {position:fixed;z-index:99999;top:0;left:0;width:0;height:4px;background-color:#fff}
			#loading {position:fixed;z-index:999;top:0;left:0;width:100%;height:100%;background:#fff url(assets/img/loading_large.gif) center no-repeat}
		</style>
		<script type="text/javascript">
		$(document).ready(function() {
			$("#hidden").css('display', 'block');
			$("#progress-bar").animate({width:"100%"}, 2000); });
			$(window).bind('load', function() {
			$("#progress-bar").stop().animate({width:"100%"}, 2000, function() {
			$("#hidden").fadeOut(3000); }); });
		</script>
	</head>
	<body>
	<div id="hidden">
		<div id="progress-bar"></div><div id="loading"></div>
	</div>
		<?php 
			require '../../config.php';
			
			
			if(!empty($_GET['kategori'])){
				$nama= htmlentities($_POST['kategori']);
				$id= htmlentities($_POST['id']);
				$data[] = $nama;
				$data[] = $id;
				$sql = 'UPDATE kategori SET  nama_kategori=? WHERE id_kategori=?';
				$row = $config -> prepare($sql);
				$row -> execute($data);
				echo '<script>window.location="../../index.php?page=kategori/edit&kategori='.$id.'&success=edit-data"</script>';
			}
			if(!empty($_GET['stok'])){
				$restok = htmlentities($_POST['restok']);
				$id = htmlentities($_POST['id']);
				$dataS[] = $id;
				$sqlS = 'select*from barang WHERE id_barang=?';
				$rowS = $config -> prepare($sqlS);
				$rowS -> execute($dataS);
				$hasil = $rowS -> fetch();
				
				$stok = $restok + $hasil['stok'];
				
				$data[] = $stok;
				$data[] = $id;
				$sql = 'UPDATE barang SET stok=? WHERE id_barang=?';
				$row = $config -> prepare($sql);
				$row -> execute($data);
				echo '<script>window.location="../../index.php?page=barang&success-stok=stok-data"</script>';
			}
			
			if(!empty($_GET['barang'])){
				$id = htmlentities($_POST['id']);
				$kategori = htmlentities($_POST['kategori']);
				$nama = htmlentities($_POST['nama']);
				
				$jual = htmlentities($_POST['jual']);
				$stok = htmlentities($_POST['stok']);
				
				$data[] = $kategori;
				$data[] = $nama;
				$data[] = $jual;
				$data[] = $stok;
				$data[] = $id;
				$sql = 'UPDATE barang SET id_kategori=?, nama_barang=?, 
						harga_jual=?, stok=?  WHERE id_barang=?';
				$row = $config -> prepare($sql);
				$row -> execute($data);
				echo '<script>window.location="../../index.php?page=barang&success=edit-data"</script>';
			}
			if(!empty($_GET['gambar'])){
				$id = htmlentities($_POST['id']);
				set_time_limit(0);
				$allowedImageType = array("image/gif",   "image/JPG",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );
				
				if ($_FILES['foto']["error"] > 0) {
					$output['error']= "Error in File";
				} elseif (!in_array($_FILES['foto']["type"], $allowedImageType)) {
					echo "You can only upload JPG, PNG and GIF file";
					echo "<font face='Verdana' size='2' ><BR><BR><BR>
							<a href='../../index.php?page=user'>Back to upform</a><BR>";

				}elseif (round($_FILES['foto']["size"] / 1024) > 4096) {
					echo "WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB";
					echo "<font face='Verdana' size='2' ><BR><BR><BR>
							<a href='../../index.php?page=user'>Back to upform</a><BR>";

				}else{
					$target_path = '../../assets/img/user/';
					$target_path = $target_path . basename( $_FILES['foto']['name']); 
					if (file_exists("$target_path")){ 
					 echo "<font face='Verdana' size='2' >Ini Terjadi Karena Telah Masuk Nama File Yang Sama,
					 <br> Silahkan Rename File terlebih dahulu<br>";

					echo "<font face='Verdana' size='2' ><BR><BR><BR>
							<a href='../../index.php?page=user'>Back to upform</a><BR>";

					 }elseif(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)){
						 //post foto lama
						$foto2 = $_POST['foto2'];
						//remove foto di direktori
						unlink('../../assets/img/user/'.$foto2.'');
						//input foto
						$id = $_POST['id'];
						$data[] = $_FILES['foto']['name'];
						$data[] = $id;
						$sql = 'UPDATE member SET gambar=?  WHERE member.id_member=?';
						$row = $config -> prepare($sql);
						$row -> execute($data);
						echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
					}
				}
			}
			if(!empty($_GET['profil'])){
				$id = htmlentities($_POST['id']);
				$nama = htmlentities($_POST['nama']);
				$alamat = htmlentities($_POST['alamat']);
				$tlp = htmlentities($_POST['tlp']);
				$email = htmlentities($_POST['email']);
				
				$data[] = $nama;
				$data[] = $alamat;
				$data[] = $tlp;
				$data[] = $email;
				$data[] = $id;
				$sql = 'UPDATE member SET nm_member=?,alamat_member=?,telepon=?,email=? WHERE id_member=?';
				$row = $config -> prepare($sql);
				$row -> execute($data);
				echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
			}
			if(!empty($_GET['pass'])){
				$id = htmlentities($_POST['id']);
				$user = htmlentities($_POST['user']);
				$pass = htmlentities($_POST['pass']);
				
				$data[] = $user;
				$data[] = $pass;
				$data[] = $id;
				$sql = 'UPDATE login SET user=?,pass=md5(?) WHERE id_member=?';
				$row = $config -> prepare($sql);
				$row -> execute($data);
				echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
			}
			
			if(!empty($_GET['pelanggan'])){
				$id = htmlentities($_POST['kode_pel']);
				$nama = htmlentities($_POST['nama']);
				$alamat = htmlentities($_POST['alamat']);
				$tlp = htmlentities($_POST['telpon']);
				$data[] = $nama;
				$data[] = $alamat;
				$data[] = $tlp;
				$data[] = $id;
				$sql = 'UPDATE pelanggan SET nm_pel=?,almt_pel=?,no_tlp=? WHERE kd_pel=?';
				$row = $config -> prepare($sql);
				$row -> execute($data);
				echo '<script>window.location="../../index.php?page=pelanggan&success=edit-data"</script>';
			}

			
		?>

	
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/jquery-1.8.3.min.js"></script>
	</body>
</html>
