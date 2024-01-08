<?php

session_start();
if($_SESSION['role'] != 'super_admin'){
	header('Location:../login.php');
	exit();
}
// session_start();
// if(!isset($_SESSION['role']) || $_SESSION['role'] != 'super_admin'){
//     header('Location:../login.php');
//     exit();

// }	
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header_owner.php");
require_once("{$base_dir}pages{$ds}core{$ds}sidebar_owner.php");
?>
<body>
<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
							</div>
						</div>
					</div>
				</div>
				<?php
				include '../backend/config/db_apotek.php';
				
				// Data Realtime Stok Obat
      			$dataRealtimeStokObat = mysqli_query($db_connect, "SELECT count(id_obat) AS jmlh_obat FROM tbl_stok_obat");
      			$viewStokObat = mysqli_fetch_array($dataRealtimeStokObat);

      			// Data Realtime Obat Masuk
      			$dataRealtimeObatMasuk = mysqli_query($db_connect, "SELECT count(id_obat_masuk) AS jmlh_obat_masuk FROM tbl_obat_masuk");
      			$viewObatMasuk = mysqli_fetch_array($dataRealtimeObatMasuk);

      			// Data Realtime Penjualan
      			$dataRealtimePenjualan = mysqli_query($db_connect, "SELECT count(id_penjualan) AS jmlh_penjualan FROM tbl_penjualan");
      			$viewPenjualan = mysqli_fetch_array($dataRealtimePenjualan);

				// Data Realtime Supplier
				$dataRealtimeSupplier = mysqli_query($db_connect, "SELECT count(id_supplier) AS jmlh_supplier FROM tbl_supplier");
				$viewSupplier = mysqli_fetch_array($dataRealtimeSupplier);
				?>

                <div class="page-inner mt--5">
                <div class="row mt--2">
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-primary card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-box-2"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Stok Obat</p>
												<h4 class="card-title"><?php echo $viewStokObat['jmlh_obat'];?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-info card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-graph-1"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Obat Masuk</p>
												<h4 class="card-title"><?php echo $viewObatMasuk['jmlh_obat_masuk'];?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-success card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-graph"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Penjualan Obat</p>
												<h4 class="card-title"><?php echo $viewPenjualan['jmlh_penjualan'];?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-secondary card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
                                            <i class="flaticon-box-3"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Supplier</p>
												<h4 class="card-title"><?php echo $viewSupplier['jmlh_supplier'];?></h4>
                                                
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
        </div>
                </div>

</div>  
</body>

<!-- <?php require_once("{$base_dir}pages{$ds}core{$ds}footer_owner.php");
?> -->