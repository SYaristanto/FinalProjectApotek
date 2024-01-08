<?php

session_start();
if($_SESSION['role']!= 'admin'){
	header('Location:../login.php');
	exit();
}

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Ubah Penjualan</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="dashboard.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<a href="penjualan.php">
								<i class="flaticon-right-arrow"></i>
								</a>
							</li>
							<li class="nav-item">
								<a href="">Penjualan</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
						</ul>
					</div>
								<form action="../backend/edit_penjualan.php" method="POST">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-row">
											<div class="form-group col-md-6">
												<?php
												require "../backend/config/db_apotek.php";
												$nama_obat = mysqli_query($db_connect, "SELECT * FROM tbl_stok_obat");
												$nama_obat_options = array();

												while($nama_obat_row = mysqli_fetch_assoc($nama_obat)) {
													$nama_obat_options[] = $nama_obat_row["nama_obat"]; 
												}
												
												
												?>
													<label for="Nama_Obat">Nama Obat</label>
													<select class="form-control" name="nama_obat" id="nama_obat">
														<option value="" disabled selected>--Pilih Obat--</option>
														<?php
														foreach($nama_obat_options as $nama_obat_option){

														 
														?>
														<option value="<?php echo $nama_obat_option?>"><?php echo $nama_obat_option?></option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group col-md-6">
												<?php
												require "../backend/config/db_apotek.php";
												$nama_user = mysqli_query($db_connect, "SELECT * FROM tbl_user");
												$nama_user_options = array();

												while($nama_user_row = mysqli_fetch_assoc($nama_user)) {
													$nama_user_options[] = $nama_user_row["nama"]; 
												}
												
												
												?>
													<label for="Nama_User">Nama</label>
													<select class="form-control" name="nama_user" id="nama_user">
														<option value="" disabled selected>--Pilih Nama--</option>
														<?php
														foreach($nama_user_options as $nama_user_option){

														 
														?>
														<option value="<?php echo $nama_user_option?>"><?php echo $nama_user_option?></option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group col-md-6">
													<label for="Tanggal_Penjualan">Tanggal Penjualan</label>
													<input type="date" name="Tanggal_Penjualan" class="form-control" id="Tanggal_Penjualan">
												</div>
												<div class="form-group col-md-6">
													<label for="Jumlah_Terjual">Jumlah Terjual</label>
													<input type="text" name="Jumlah_Terjual" class="form-control" id="Jumlah_Terjual">
												</div>
												<div class="form-group col-md-6">
													<label for="Harga_Satuan">Harga Satuan</label>
													<input type="text" name="Harga_Satuan" class="form-control" id="Harga_Satuan">
												</div>
												<div class="form-group col-md-6">
													<label for="Total">Total</label>
													<input type="text" name="Total" class="form-control" id="Total">
												</div>
												<div class="form-group col-md-6">
													<label for="Bayar">Bayar</label>
													<input type="text" name="Bayar" class="form-control" id="Bayar">
												</div>
												<div class="form-group col-md-6">
													<label for="Kembali">Kembali</label>
													<input type="text" name="Kembali" class="form-control" id="Kembali">
												</div>
											</div>
										</div>
									</div>
										<div class="card-action">
											<a href="penjualan.php">
												<button type="submit" name="simpan_penjualan" class="btn btn-secondary mx-2">Simpan</button>
											</a>
											<button type="submit" name="batal" class="btn btn-danger">Batal</button>
										</div>
									</div>
								</form>								