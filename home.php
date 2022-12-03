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
                            <h1 class="m-0">Pemesanan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pemesanan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Responsive Hover Table</h3>
                                    
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right"
                                                placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <a href="tambahPesanan.php"><button type="button" class="btn btn-info">Tambah</button></a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>NomerHP</th>
                                                <th>Alamat</th>
                                                <th>Keterangan</th>
                                                <th>Harga</th>
                                                <th>Hari Pemesanan</th>
                                                <th>Hari Selesai</th>
                                                <th>Status Pembayaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                                include 'config.php';
                                                $no=1;
                                                $sql=$conn->query("SELECT * FROM pemesanan");
                                                foreach ($sql as $row) {
                                                    # code...

                                            ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $row['nama'];?></td>
                                                <td><?php echo $row['nomerHP'];?></td>
                                                <td><?php echo $row['alamat'];?></td>
                                                <td><?php echo $row['keterangan'];?></td>
                                                <td><?php echo $row['harga'];?></td>
                                                <td><?php echo $row['hariPemesanan'];?></td>
                                                <td><?php echo $row['hariSelesai'];?></td>
                                                <td><?php 
                                                    if ($row['sudahBayar']==1) {
                                                        echo 'Sudah Bayar';
                                                    }else{
                                                        echo 'Belum Bayar';
                                                    }
                                                ?></td>
                                                <td><div class="btn-group-vertical">
                                                    <a href="editPesanan.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-info" >Edit</button></a>
                                                    <a href="hapusPesanan.php?id=<?php echo $row['id']?>"><button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus?')">Hapus</button></a>
                                                </div></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

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
    
    
    <?php include('include/JS.php');?>
</body>

</html>