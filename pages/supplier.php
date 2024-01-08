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
<body>
<div class="main-panel">
			<div class="content">
                <div class="page-inner">                    
                     	<div class="page-header">
						    <h4 class="page-title">Data Supplier</h4>
						    <ul class="breadcrumbs">
							    <li class="nav-home">
								    <a href="dashboard.php">
									    <i class="flaticon-home"></i>
								    </a>
							    </li>
							        <li class="separator">
								        <i class="flaticon-right-arrow"></i>
                                        <a href =""></a>
							        </li>
							    <li class="nav-item">
                                    <a href="sub-item">Supplier</a>
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
										<a href = "form_supplier.php">
											<button class="btn btn-primary btn-round ml-auto" name="tambah supplier" data-toggle="modal" data-target="#addRowModal">
												<i class="fa fa-plus mx-1"></i>
            									Tambah Supplier
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
                                                    <th>Email</th>
													<th>Alamat</th>
                                                    <th>No Telp</th>
													<th>Action</th>
												</tr>
											</thead>
												<tbody>
													<?php
													require "../backend/config/db_apotek.php";
													$supplier = mysqli_query($db_connect, "SELECT * FROM tbl_supplier");
													$no = 1;
													while ($tbl_supplier = mysqli_fetch_array($supplier)){

													?>
														<tr>
															<td>
																<?php echo $no++;  ?>
															</td>
															<td>
																<?php echo $tbl_supplier ['nama_supplier']; ?>
															</td>
															<td>
																<?php echo $tbl_supplier ['email']; ?>
															</td>
															<td>
																<?php echo $tbl_supplier ['alamat']; ?>
															</td>
                                                    		<td>
																<?php echo $tbl_supplier ['no_telp']; ?>
															</td>
															<td>
																<div class="card-action d-flex justify-content-between">
																	<a href="edit_supplier.php">
                                                                		<button type="submit" name="Edit" class="btn btn-secondary mx-2" style="margin-right: 10px;">Edit</button>
                                                            		</a>
																	<!-- <a href="../backend/hapus_supplier.php?id_supplier=<?php echo $tbl_supplier['id_supplier']; ?>">
																	<button type="submit" name="Hapus" class="btn btn-danger">Hapus</button> -->
																	<button 
																		type="button" href="../backend/hapus_supplier.php?id_supplier=<?php echo $tbl_supplier['id_supplier']; ?>"
                                                             			class="btn btn-danger delete">Hapus
															 		</button>
																</div>
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
                                text: 'Data Supplier Terhapus',
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