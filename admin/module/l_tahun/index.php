 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Laporan Berdasarkan Tahun
						
									<?php
												$selected = $_POST['tahun'];
											?>			
						</h3>
						<div class="col-sm-4">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h4><i class="fa fa-category"></i> Bulan</h4>
								</div>
								<div class="panel-body">
									<form method="POST"  ">
										
										<select class="form-control" name="tahun" id="tahun" onchange="this.form.submit();">
										<option value="0" disabled selected>Pilih Tahun</option>
										<?php
										$mulai= date('Y') - 10;
										for($i = $mulai;$i<=$mulai + 10;$i++){
											
											if($i==$selected){
												echo '<option value="'.$i.'" selected>'.$i.'</option>';
											}
											else {
												echo '<option value="'.$i.'" >'.$i.'</option>';		
											}
											
										}
										?>
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
									<?php $pemasukan=0; $no=1; $thn = $_POST['tahun']; $hasil = $lihat -> l_thn($thn); ?>
									
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
								Jumlah Total  : Rp.<?php echo number_format($pemasukan);?>,-
							</h3>
							<div class="clearfix" style="padding-top:27%;"></div>
						</div>
					</div>
				  </div>
              </div>
          </section>
      </section>
	

