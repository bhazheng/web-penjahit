<!DOCTYPE html>
<html lang="en">

<head>
    <?php include'config.php'?>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="public/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="public/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="public/plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/dist/css/adminlte.min.css">


</head>
<?php
            include("config.php");

            // kalau tidak ada id di query string
            if( !isset($_GET['id']) ){
                header('Location: home.php');
            }
            
            //ambil id dari query string
            $id = $_GET['id'];
            
            // buat query untuk ambil data dari database
            $sql = "SELECT * FROM pemesanan WHERE id=$id";
            $query = mysqli_query($conn, $sql);
            $pesan = mysqli_fetch_assoc($query);
            
            // jika data yang di-edit tidak ditemukan
            if( mysqli_num_rows($query) < 1 ){
                die("data tidak ditemukan...");
            }
            
            if (isset($_POST['simpan'])) {
                $name=$_POST['name'];
                $deskripsi=$_POST['deskripsi'];
                $nomerHP=$_POST['nomerHP'];
                $alamat=$_POST['alamat'];
                $harga=$_POST['harga'];
                $tglPesan=$_POST['tglPesan'];
                $tglJadi=$_POST['tglJadi'];
                $sudahBayar=0;

                
                

                $sql1   = "UPDATE pemesanan SET nama='$name',nomerHP='$nomerHP',alamat='$alamat',keterangan='$deskripsi',harga='$harga',hariPemesanan='$tglPesan',hariSelesai='$tglJadi' WHERE id=$id";
                $q1     = mysqli_query($conn, $sql1);
                // var_dump($q);
                if ($q1) {
                    echo "<script>window.alert('Berhasil');window.location('home.php')</script>";
                    header('Location: home.php');
                }else {
                    echo "<script>window.alert('gagal');window.location('tambahPesanan.php')</script>";
                }
            }
        
        ?>
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
                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Tambah Produk</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="name">Nama pelanggan</label>
                                                        <input type="text" name="name" class="form-control" value="<?php echo $pesan['nama'];?>"
                                                            required>
                                                        <p class="text-danger"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Deskripsi</label>

                                                        <!-- TAMBAHKAN ID YANG NNTINYA DIGUNAKAN UTK MENGHUBUNGKAN DENGAN CKEDITOR -->
                                                        <textarea name="deskripsi" id="description" 
                                                            class="form-control"><?php echo $pesan['keterangan'];?></textarea>
                                                        <p class="text-danger"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="name">Nomer Telepon</label>
                                                        <input type="text" name="nomerHP" class="form-control" value="<?php echo $pesan['nomerHP'];?>"
                                                            required>
                                                        <p class="text-danger"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Alamat</label>
                                                        <input type="text" name="alamat" class="form-control" value="<?php echo $pesan['alamat'];?>"
                                                            required>
                                                        <p class="text-danger"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="price">Harga</label>
                                                        <input type="harga" name="harga" class="form-control" value="<?php echo $pesan['harga'];?>"
                                                            required>
                                                        <p class="text-danger"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Pesan</label>
                                                        <div class="input-group date" id="tglpesan"
                                                            data-target-input="nearest">
                                                            <input type="text" name="tglPesan"
                                                                class="form-control datetimepicker-input" value="<?php echo $pesan['hariPemesanan'];?>"
                                                                data-target="#tglpesan" />
                                                            <div class="input-group-append" data-target="#tglpesan"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Tanggal Jadi</label>
                                                        <div class="input-group date" id="tgljadi"
                                                            data-target-input="nearest">
                                                            <input type="text" name="tglJadi"
                                                                class="form-control datetimepicker-input" value="<?php echo $pesan['hariSelesai'];?>"
                                                                data-target="#tgljadi" />
                                                            <div class="input-group-append" data-target="#tgljadi"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit" name="simpan"
                                                            class="btn btn-primary btn-sm">Tambah</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- /.card-body -->
                            </div>
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
    <script src="public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="public/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="public/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="public/plugins/moment/moment.min.js"></script>
    <script src="public/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="public/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="public/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="public/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="public/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="public/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->


    <script language="JavaScript" type="text/javascript">
        // Data Picker Initialization
        $('#tglpesan').datetimepicker({
            format: 'YYYY-MM-DD'

        });

        $('#tgljadi').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>

</body>

</html>