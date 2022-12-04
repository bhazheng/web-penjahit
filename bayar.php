<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Google Font: Source Sans Pro -->
    <?php include('include/header.php');?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        

        <!-- Navbar -->
        <?php include('include/navbar.php');?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include('include/sidebar.php');?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Pembayaran</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pembayaran</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <body>
		<div class='container pt-5'>
			<h1 class='text-center text-primary'>Nota Pembayaran</h1><hr>
			<?php
            include("config.php");
			if( isset($_GET['id']) ){

				// ambil id dari query string
				$id = $_GET['id'];
			
				// buat query hapus
				$id = $_GET['id'];
                $sql = "SELECT * FROM pemesanan WHERE id=$id";
                $query = mysqli_query($conn, $sql);
                $pesan = mysqli_fetch_assoc($query);
				$sql2 = "UPDATE pemesanan SET sudahBayar=1 WHERE id=$id";
				$query2 = mysqli_query($conn, $sql2);
			
			} else {
				die("akses dilarang...");
			}
                
                
                //ambil id dari query string
               
            
				
			?>
			<form method='post' action='index.php' autocomplete='off'>
				<div class='row'>
					<div class='col-md-4'>
						<h5 class='text-success'>Invoice Details</h5>
						<div class='form-group'>
							<label>Nomer Nota</label>
							<input type='text' name='invoice_no' value="<?php echo $pesan['id'];?>" required class='form-control'>
						</div>
						<div class='form-group'>
							<label>Tanggal Nota</label>
							<input type='text' name='invoice_date' value="<?php echo $pesan['hariSelesai'];?>" id='date' required class='form-control'>
						</div>
					</div>
					<div class='col-md-8'>
						<h5 class='text-success'>Detail pelanggan</h5>
						<div class='form-group'>
							<label>Nama</label>
							<input type='text' name='name' value="<?php echo $pesan['nama'];?>"required class='form-control'>
						</div>
						<div class='form-group'>
							<label>Alamat</label>
							<input type='text' name='alamat' value="<?php echo $pesan['alamat'];?>" required class='form-control'>
						</div>
						<div class='form-group'>
							<label>Nomer Telepon</label>
							<input type='text' name='nomerHP' value="<?php echo $pesan['nomerHP'];?>" required class='form-control'>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-12'>
						<h5 class='text-success'>Product Details</h5>
						<table class='table table-bordered'>
							<thead>
								<tr>
                                <th>ID</th>
                                                
                                <th>Keterangan</th>
                                <th>Hari Pemesanan</th>
                                <th>Hari Selesai</th>
                                <th>Status Pembayaran</th>
                                <th>Harga</th>
								</tr>
							</thead>
							<tbody id='product_tbody'>
								<tr>
									<td><input type='text' required name='idPembayaran' value="<?php echo $pesan['id'];?>" class='form-control'></td>
									<td><input type='text' required name='keterangan' value="<?php echo $pesan['keterangan'];?>" class='form-control price'></td>
									<td><input type='text' required name='hariPesan' value="<?php echo $pesan['hariPemesanan'];?>" class='form-control qty'></td>
                                    <td><input type='text' required name='hariSelesai' value="<?php echo $pesan['hariSelesai'];?>" class='form-control qty'></td>
                                    <td><input type='text' required name='statusBayar' value="<?php if ($pesan['sudahBayar']==1) {
                                                        echo 'Sudah Bayar';
                                                    }else{
                                                        echo 'Belum Bayar';
                                                    };?>" class='form-control qty'></td>
									<td><input type='text' required name='total' value="<?php echo $pesan['harga'];?>" class='form-control total'></td>
									
									
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td><input type='button' value='+ Add Row' class='btn btn-primary btn-sm' id='btn-add-row'></td>
									<td colspan='4' class='text-right'>Total</td>
									<td><input type='text' name='grand_total' id='grand_total' value="<?php echo $pesan['harga'];?>" class='form-control' required></td>
								</tr>
							</tfoot>
						</table>
                        
						<td><a href="javascript:window.print()"><button type="button" name="simpan"
                                                            class="btn btn-warning float-right">Print Invoice</button></a></td>
						
					</div>
				</div>
			</form>
		</div>
		<script>
			$(document).ready(function(){
				$("#date").datepicker({
					dateFormat:"dd-mm-yy"
				});
				
				$("#btn-add-row").click(function(){
					var row="<tr> <td><input type='text' required name='pname[]' class='form-control'></td> <td><input type='text' required name='price[]' class='form-control price'></td> <td><input type='text' required name='qty[]' class='form-control qty'></td> <td><input type='text' required name='total[]' class='form-control total'></td> <td><input type='button' value='x' class='btn btn-danger btn-sm btn-row-remove'> </td> </tr>";
					$("#product_tbody").append(row);
				});
				
				$("body").on("click",".btn-row-remove",function(){
					if(confirm("Are You Sure?")){
						$(this).closest("tr").remove();
						grand_total();
					}
				});

				$("body").on("keyup",".price",function(){
					var price=Number($(this).val());
					var qty=Number($(this).closest("tr").find(".qty").val());
					$(this).closest("tr").find(".total").val(price*qty);
					grand_total();
				});
				
				$("body").on("keyup",".qty",function(){
					var qty=Number($(this).val());
					var price=Number($(this).closest("tr").find(".price").val());
					$(this).closest("tr").find(".total").val(price*qty);
					grand_total();
				});			
				
				function grand_total(){
					var tot=0;
					$(".total").each(function(){
						tot+=Number($(this).val());
					});
					$("#grand_total").val(tot);
				}
			});
		</script>
	</body>
                            </div>
                            <!-- /.card-body -->
                            
                            <!-- /.card -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include('include/JS.php');?>
</body>

</html>
