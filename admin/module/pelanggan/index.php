 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <div class="bg-shadow" style="background:rgba(0,0,0,0.3);z-index:99999;position:fixed;width:100%;height:6000px;"></div>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Pelanggan</h3>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Tambah Pelanggan Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Pelanggan Berhasil !</p>
						</div>
						<?php }?>
						<table>
							<tr>
								<td><button id="tombol-simpan" onclick="clickModals()" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button></td>
							</tr>
						</table>
						<br/>
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered" id="example1">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<td>No.</td>
										<td>Nama Pelanggan</td>
										<td>Alamat</td>
										<td>No Telpon</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
								<?php 
									$hasil = $lihat -> pelanggan();
									$no=1;
									foreach($hasil as $isi){
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi['nm_pel'];?></td>
										<td><?php echo $isi['almt_pel'];?></td>
										<td><?php echo $isi['no_tlp'];?></td>
										<td>
											<a href="index.php?page=pelanggan/details&pelanggan=<?php echo $isi['kd_pel'];?>"><button class="btn btn-primary">Details</button></a>
											<a href="index.php?page=pelanggan/edit&pelanggan=<?php echo $isi['kd_pel'];?>"><button class="btn btn-warning">Edit</button></a>
											<a href="fungsi/hapus/hapus.php?pelanggan=hapus&id=<?php echo $isi['kd_pel'];?>" onclick="javascript:return confirm('Hapus Data barang ?');">
											<button class="btn btn-danger">Hapus</button></a>
											
										</td>
									</tr>
								<?php $no++; }?>
								</tbody>
							</table>
							
							<div class="clearfix" style="padding-top:27%;"></div>
						</div>
					<!-- end view barang -->
					<!-- tambah barang MODALS-->
					<div class="modal-create" style="z-index:9999999;position:absolute;margin:0 auto;padding:0;top:0;width:85%;">
						<div class="panel panel-default" style="border:0px;">
							<div class="panel-heading">
								<h4><i class="fa fa-user-plus"></i>  Tambah Pelanggan
									<a class="pull-right">
										<button type="submit" class="btn btn-danger" onclick="cancelModals()" id="batal">Batal</button>
									</a>
								</h4>
							</div>
							<div class="panel-body">
								<div class="box-content">
									<table class="table table-striped bordered">
										<form action="fungsi/tambah/tambah.php?pelanggan=tambah" method="POST">
											
											<tr>
												<td>Nama Pelanggan</td>
												<td><input type="text" placeholder="Nama Pelanggan" class="form-control" name="nama"></td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td><input type="text" placeholder="Alamat" class="form-control"  name="alamat"></td>
											</tr>
											
											<tr>
												<td>No Telpon</td>
												<td><input type="text" Placeholder="08xxxxxxxxxx" class="form-control"  name="telpon"></td>
											</tr>
											
											<tr>
												<td></td>
												<td><button class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button></td>
											</tr>
										</form>
									</table>
								</div>
							</div>
						<!-- end tambah barang -->
					</div>
				  </div>
              </div>
          </section>
      </section>
	
