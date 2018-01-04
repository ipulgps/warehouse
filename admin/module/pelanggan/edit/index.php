 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
		<?php
		$id = $_GET['pelanggan']; 
		$hasil = $lihat -> pelanggan_edit($id); ?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
					  	<a href="index.php?page=pelanggan"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
						<h3>Edit Pelanggan</h3>
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
							<form action="fungsi/edit/edit.php?pelanggan=edit" method="POST">
								
									<input type="hidden" class="form-control" value="<?php echo $hasil['kd_pel'];?>" name="kode_pel">
								<tr>
									<td>Nama Pelanggan</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['nm_pel'];?>" name="nama"></td>
								</tr>
								
								<tr>
									<td>No Telpon</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['no_tlp'];?>" name="telpon"></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><textarea  name="alamat" rows="3" class="form-control" style="border-radius:0px;" 
										required="required"><?php echo $hasil['almt_pel']; ?></textarea></td>
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
