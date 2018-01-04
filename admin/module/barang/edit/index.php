 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
<?php 
	$id = $_GET['barang'];
	$hasil = $lihat -> barang_edit($id);
?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
					  	<a href="index.php?page=barang"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
						<h3>Details Barang</h3>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Edit Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						<table class="table table-striped">
							<form action="fungsi/edit/edit.php?barang=edit" method="POST">
								<tr>
									<td>ID Barang</td>
									<td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_barang'];?>" name="id"></td>
								</tr>
								<tr>
									<td>Kategori</td>
									<td>
									<?php $selected=$hasil['id_kategori'];?>
									<select name="kategori" class="form-control">
										
										<?php  $kat = $lihat -> kategori(); foreach($kat as $isi){ 	?>
										<option value="<?php echo $isi['id_kategori'];?>" <?php if($selected == $isi['id_kategori']){echo("selected");}?>>
										<?php echo $isi['nama_kategori'];?></option>
										<?php }?>
									</select>
									</td>
								</tr>
								<tr>
									<td>Nama Barang</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['nama_barang'];?>" name="nama"></td>
								</tr>
								<tr>
									<td>Harga Jual</td>
									<td><input type="number" class="form-control" value="<?php echo $hasil['harga_jual'];?>" name="jual"></td>
								</tr>
								<tr>
									<td>Stok</td>
									<td><input type="number" class="form-control" value="<?php echo $hasil['stok'];?>" name="stok"></td>
								</tr>
								<tr>
									<td></td>
									<td><button class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
								</tr>
							</form>
						</table>
						<div class="clearfix" style="padding-top:16%;"></div>
				  </div>
              </div>
          </section>
      </section>
