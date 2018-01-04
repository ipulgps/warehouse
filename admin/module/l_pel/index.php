
 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Laporan Berdasarkan Pelanggan
						
									<?php
												
												$selected = $_POST['pel'];
											?>			
						</h3>
						<div class="col-sm-4">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h4><i class="fa fa-category"></i> Bulan</h4>
								</div>
								<div class="panel-body">
									<form method="POST"  ">
										<select class="form-control" name="pel" id="pel" onchange="this.form.submit();" >
										<option value="0" disabled selected>Pilih Pelanggan</option>
										 <?php $hasil1 = $lihat -> pelanggan(); ?>
										 <?php foreach($hasil1 as $isi){;?>
										 
								<option	 value="<?php echo $isi['kd_pel'];?>"	<?php if($selected == $isi['kd_pel']){echo("selected");}?> >	<?php echo $isi['nm_pel'];?>	</option>
										 
										 
										 <?php } ?>
										
										</select>
										

									</form>
									
								</div>
							</div>
						</div>
						<div class="clearfix" style="padding-top:5%;"></div>
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered" id="example1">
								<thead>
									<tr>
										<td> No</td>
										<td> ID Barang</td>
										<td> Nama Barang</td>
										<td style="width:10%;"> Jumlah</td>
										<td style="width:20%;"> Total</td>
										<td> Kasir</td>
										<td> Pelanggan</td>
										<td> Tanggal Input</td>
										<td> Aksi</td>
										
									</tr>
								</thead>
								<tbody>
									<?php $no=1; $pel = $_POST['pel']; $hasil = $lihat -> l_pel($pel);?>
									
									<?php foreach($hasil as $isi){;?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi['id_barang'];?></td>
										<td><?php echo $isi['nama_barang'];?></td>
										<td><?php echo $isi['jumlah'];?> </td>
										<td>Rp.<?php echo number_format($isi['total']);?>,-</td>
										<td><?php echo $isi['nm_member'];?></td>
										<td><?php echo $isi['nm_pel'];?></td>
										<td><?php echo $isi['tanggal_input'];?></td>
										<td><a href="fungsi/hapus/hapus.php?penjualan=hapus&id=<?php echo $isi['id_penjualan'];?>" 
											onclick="javascript:return confirm('Hapus Data Laporan ?');">
											<button class="btn btn-danger">Hapus</button></a></td>
									</tr>
									<?php $pemasukan+=$isi['total']; $no++; }?>
								</tbody>
							</table>
							<h3>
								Jumlah Total : Rp.<?php echo number_format($pemasukan);?>,-
							</h3>
							<div class="clearfix" style="padding-top:27%;"></div>
						</div>
					</div>
				  </div>
              </div>
          </section>
      </section>
	

