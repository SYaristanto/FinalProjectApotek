<?php

session_start();
if($_SESSION['role']!= 'super_admin'){
	header('Location:../login.php');
	exit();
}

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header_owner.php");
// require_once("{$base_dir}pages{$ds}p_owner.php");
?>
<body>
<div class="main-panel">
			<div class="content">
                <div class="page-inner">                    
                     	<div class="page-header">
						    <h4 class="page-title">Data Penjualan</h4>
						    <ul class="breadcrumbs">
							    <li class="nav-home">
								    <a href="dashboard_owner.php">
									    <i class="flaticon-home"></i>
								    </a>
							    </li>
							        <li class="separator">
								        <i class="flaticon-right-arrow"></i>
                                        <a href =""></a>
							        </li>
							    <li class="nav-item">
                                    <a href="sub-item">Penjualan</a>
							        </li>
								<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
						    </ul>
						</div>
				</div>
                <div class="col-md-12">
							<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
    								<div class="justify-content-start">
									<h4 class="card-title">Penjualan</h4>
										<!-- <a href = "form_penjualan.php">
											<button class="btn btn-primary btn-round ml-auto" name="tambah penjualan" data-toggle="modal" data-target="#addRowModal">
												<i class="fa fa-plus mx-1"></i>
            									Tambah Penjualan
        									</button>
										</a> -->
    							</div>
							</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Obat</th>
													<th>Nama Pegawai</th>
                                                    <th>Tanggal Penjualan</th>
                                                    <th>Jumlah Terjual</th>
													<th>Harga Satuan</th>
													<th>Total</th>
													<th>Bayar</th>
													<th>Kembali</th>
												</tr>
											</thead>
											<tbody>
												<?php
												require "../backend/config/db_apotek.php";
												$daftar_penjualan = mysqli_query($db_connect, "SELECT  p.id_penjualan, s.nama_obat, u.nama AS nama_user, p.tanggal_penjualan, p.jumlah_terjual, p.harga_satuan, p.total_harga, p.bayar, p.kembali 
												FROM tbl_penjualan p
												INNER JOIN tbl_stok_obat s ON p.id_obat = s.id_obat
												INNER JOIN tbl_user u ON p.id_user = u.id_user");
												
												$no = 1;
												
												while ($tbl_penjualan = mysqli_fetch_array($daftar_penjualan)){
												
												?>
												<tr>
													<td>
														<?php echo $no++; ?>
													</td>
													<td>
														<?php echo $tbl_penjualan ['nama_obat']; ?>
													</td>
													<td>
														<?php echo $tbl_penjualan ['nama_user']; ?>
													</td>
													<td>
														<?php echo $tbl_penjualan ['tanggal_penjualan']; ?>
													</td>
													<td>
														<?php echo $tbl_penjualan ['jumlah_terjual']; ?>
													</td>
													<td>
														<?php echo $tbl_penjualan ['harga_satuan']; ?>
													</td>
													<td>
														<?php echo $tbl_penjualan ['total_harga']; ?>
													</td>
													<td>
														<?php echo $tbl_penjualan ['bayar']; ?>
													</td>
													<td>
														<?php echo $tbl_penjualan ['kembali']; ?>
													</td>
													<!-- <td>
														<div class="card-action d-flex justify-content-between">
															<a href="edit_penjualan.php">
                                                                <button type="submit" name="Edit" class="btn btn-primary" style="margin-right: 10px;">Edit</button>
                                                            </a>
															<a href="../backend/hapus_penjualan.php?id_penjualan=<?php echo $tbl_penjualan['id_penjualan']; ?>">
															<button type="submit" name="Hapus" class="btn btn-danger">Hapus</button>
														</div>
													</td> -->
												</tr>
											<?php
											}
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

</div>  
</body>

<!-- <?php require_once("{$base_dir}pages{$ds}core{$ds}footer_owner.php");
?>  -->