<?php

session_start();
if($_SESSION['role']!= 'admin'){
	header('Location:../login.php');
	exit();
}

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
// require_once("{$base_dir}backend{$ds}tambah_stok_obat.php");
?>
<body>
<div class="main-panel">
			<div class="content">
                <div class="page-inner">                    
                     	<div class="page-header">
						    <h4 class="page-title">Data Obat</h4>
						    <ul class="breadcrumbs">
							    <li class="nav-home">
								    <a href="dashboard.php">
									    <i class="flaticon-home"></i>
								    </a>
							    </li>
							        <li class="separator">
								        <i class="flaticon-right-arrow"></i>
                                        <a href ="Data Obat"></a>
							        </li>
							    <li class="nav-item">
                                    <a href="sub-item">Obat Masuk</a>
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
										<a href = "form_obat_masuk.php">
											<button class="btn btn-primary btn-round ml-auto" name="tambah_obat_masuk" data-toggle="modal" data-target="#addRowModal">
												<i class="fa fa-plus mx-1"></i>
            									Tambah Obat Masuk
        									</button>
										</a>
    							</div>
							</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Supplier</th>
                                                    <th>Nama Obat</th>
                                                    <th>Tanggal Masuk</th>
                                                    <th>Jumlah Masuk</th>
													<th>Harga Beli</th>
													<th>Satuan</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
													<?php
													require "../backend/config/db_apotek.php";
													$daftar_obat_masuk = mysqli_query($db_connect,"SELECT obat_masuk.*, supplier.nama_supplier 
													FROM tbl_obat_masuk AS obat_masuk 
													JOIN tbl_supplier AS supplier ON obat_masuk.id_supplier = supplier.id_supplier");
													$no = 1;
													
													while ($tbl_obat_masuk = mysqli_fetch_array($daftar_obat_masuk)){
													
													?>
														<tr>
															<td>
																<?php echo $no++; ?>
															</td>
															<td>
																<?php echo $tbl_obat_masuk ['nama_supplier']; ?>
															</td>
                                                    		<td>
																<?php echo $tbl_obat_masuk ['nama_obat']; ?>
															</td>
                                                    		<td>
																<?php echo $tbl_obat_masuk ['tanggal_masuk']; ?>
															</td>
                                                    		<td>
																<?php echo $tbl_obat_masuk ['jumlah_masuk']; ?>
															</td>
															<td>
																<?php echo $tbl_obat_masuk ['harga_beli']; ?>
															</td>
															<td>
																<?php echo $tbl_obat_masuk ['satuan']; ?>
															</td>
															<td>
																<a href="edit_obat_masuk.php?id_obat_masuk=<?php echo $tbl_obat_masuk['id_obat_masuk'];?>"> 
																	<button type="button" name="Edit" class="btn btn-primary mx-2">Edit</button>
																</a>
															</td>
															<td>
																<!-- <a href="../backend/hapus_obat_masuk.php?id_obat_masuk=<?php echo $tbl_obat_masuk['id_obat_masuk']; ?>"> -->
																	<!-- <button type="button" class="btn btn-danger delete">Hapus</button> -->
																	<button type="button"
                                                                    href="../backend/hapus_obat_masuk.php?id_obat_masuk=<?php echo $tbl_obat_masuk['id_obat_masuk']; ?>"
                                                                    class="btn btn-danger delete">Hapus</button>
																</a>
															</td>
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
<script>
        const SweetAlert2Demo = function () {
            const initDemos = function () {
                $('.delete').click(function (e) {
                    var url = e.target.getAttribute('href');
                    swal({
                        title: 'Yakin ingin menghapus?',
                        text: "Data tidak bisa kembali jika terhapus!",
                        type: 'warning',
                        buttons: {
                            confirm: {
                                text: 'Hapus',
                                className: 'btn btn-success'
                            },
                            cancel: {
                                text: 'Batal',
                                visible: true,
                                className: 'btn btn-danger'
                            }
                        }
                    }).then((Delete) => {
                        if (Delete) {
                            swal({
                                title: 'Data Terhapus!',
                                text: 'Data Obat Masuk Terhapus',
                                type: 'success',
								buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                }
                            });
                            setTimeout(function () {
                                window.location.href = url;
                            }, 2000);
                        } else {
                            swal.close();
                        }
                    });
                });
            };
            return {
                init: function () {
                    initDemos();
                },
            };
        }();

        jQuery(document).ready(function () {
            SweetAlert2Demo.init();
        });
	</script>
<!-- <?php require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?> --> 