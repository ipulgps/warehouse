 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Laporan Berdasarkan Bulan
						
									<?php
												$selected = $_POST['bln'];
											?>			
						</h3>
						<div class="col-sm-4">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h4><i class="fa fa-category"></i> Bulan</h4>
								</div>
								<div class="panel-body">
									<form method="POST"  ">
										<select class="form-control" name="bln" id="bln" onchange="this.form.submit();" >
										<option value="0" disabled selected>Pilih Bulan</option>
										<option	 value="01"	<?php if($selected == '1'){echo("selected");}?>>	Januari	</option>
										<option	 value="02"	<?php if($selected == '2'){echo("selected");}?>>	Februari	</option>
										<option	 value="03"	<?php if($selected == '3'){echo("selected");}?>>	Maret	</option>
										<option	 value="04"	<?php if($selected == '4'){echo("selected");}?>>	April	</option>
										<option	 value="05"	<?php if($selected == '5'){echo("selected");}?>>	Mei	</option>
										<option	 value="06"	<?php if($selected == '6'){echo("selected");}?>>	Juni	</option>
										<option	 value="07"	<?php if($selected == '7'){echo("selected");}?>>	Juli	</option>
										<option	 value="08"	<?php if($selected == '8'){echo("selected");}?>>	Agustus	</option>
										<option	 value="09"	<?php if($selected == '9'){echo("selected");}?>>	September	</option>
										<option	 value="10"	<?php if($selected == '10'){echo("selected");}?>>	Oktober	</option>
										<option	 value="11"	<?php if($selected == '11'){echo("selected");}?>>	Nopember	</option>
										<option	 value="12"	<?php if($selected == '12'){echo("selected");}?>>	Desember	</option>

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
									<?php $pemasukan=0; $no=1; $bln = $_POST['bln']; $hasil = $lihat -> l_bln($bln); ?>
									
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
								jumlah Total : Rp.<?php echo number_format($pemasukan);?>,-
							</h3>
							<div class="clearfix" style="padding-top:27%;"></div>
						</div>
					</div>
				  </div>
              </div>
          </section>
      </section>
	

