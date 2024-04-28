<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ANTRIAN ADMINISTRASI INFORMATIKA</title>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/fontawesome-free/css/fontawesome.css">
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/vendor/sweetalert2/dist/sweetalert2.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <small> ANTRIAN ADMINISTRASI INFORMATIKA</small>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="/admin/dashboard">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="/admin/layanan">
                    <i class="fas fa-fw fa-phone"></i>
                    <span>Layanan</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="/admin/antrian">
                    <i class="fas fa-fw fa-list-ol"></i>
                    <span>Antrian</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="/admin/rekapitulasi">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Rekapitulasi</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <?php
// Set Timezone ke "Asia/Jakarta"
date_default_timezone_set('Asia/Jakarta');
?>

                <!-- Begin Page Content -->
                <div class="table-responsive">
                    <div class="card-header d-flex justify-content-between py-3">
                        <h6 id="current-time" class="m-0 font-weight-bold text-primary">
                        </h6>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="py-5">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header text-center bg-primary text-white">
                                            Nomor antrian saat ini
                                        </div>
                                        <div class="card-body">
                                            <h1 class="text-center">
                                                <?php
if (!empty($antriansaatini['nomor'])) {
    echo $antriansaatini['nomor'];
} else {
    echo "Antrian Kosong";
}
?>
                                            </h1>
                                            <!-- Content for card 1 -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Card 1 -->
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header text-center bg-primary text-white">
                                            Jumlah Antrian
                                        </div>
                                        <div class="card-body">
                                            <h1 class="text-center">
                                                <?php
if (!empty($jumlahantrian) && isset($jumlahantrian['nomor'])) {
    echo $jumlahantrian['nomor'];
} else {
    echo "Antrian Kosong";
}
?>
                                            </h1>
                                            <!-- Content for card 1 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Antrian</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataX" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Jam</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Layanan</th>
                                            <th>No.Antrian</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($antrian as $at): ?>
                                        <tr>
                                            <td><?=$at['jam'];?></td>
                                            <td><?=$at['nim'];?></td>
                                            <td><?=$at['nama_mahasiswa'];?></td>
                                            <td><?=$at['nama_layanan'];?></td>
                                            <td><?=$at['nomor'];?></td>
                                            <td>
                                                <form action="/pesan" method="post" class="d-inline">
                                                    <input type="hidden" name="no_hp" value=<?=$at['no_hp'];?>>
                                                    <button type="submit" class="btn btn-success btn-sm"><i
                                                            class="fa fa-phone"></i> Panggil</button>
                                                </form>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#editstatus<?=$at['id']?>">
                                                    <i class="fas fa-check"></i> Selesai
                                                </button>
                                                <form action="/selesai" method="post" class="d-inline">
                                                    <div class="modal fade" id="editstatus<?=$at['id']?>" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="d-inline modal-dialog" role="document">
                                                            <input type="hidden" name="id" value="<?=$at['id'];?>">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editstatus">
                                                                        Alert</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label> Apakah anda yakin untuk
                                                                        menyelesaikan
                                                                        antrian ini? </label>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Selesai</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#hapus<?=$at['id']?>">
                                                    <i class="fas fa-ban"></i> Batal
                                                </button>
                                                <form action="/batal" method="post" class="d-inline">
                                                    <div class="modal fade" id="hapus<?=$at['id']?>" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <input type="hidden" name="id" value="<?=$at['id'];?>">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="hapus">Alert
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label> Apakah anda yakin untuk membatalkan
                                                                        antrian
                                                                        ini? </label>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Batal</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                    <i class="fas fa-eye"></i> Lihat
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Lihat
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <iframe src="<?=base_url('pdf/' . $at['file'])?>"
                                                                        style="border:none" width="100%" height="600px"
                                                                        title="lihat"></iframe>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ANTRIAN ADMINISTRASI INFORMATIKA 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Setelah <b>Logout</b>, untuk masuk ke sistem ini anda diharuskan
                    <b>Login</b>
                    terlebih.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets/js/sb-admin-2.min.js"></script>
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script>
    <script src="../assets/js/demo/datatables-demo.js"></script>
    <script src="../assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="../assets/js/jam.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataX').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sLast": "Terakhir",
                    "sNext": "Selanjutnya",
                    "sPrevious": "Sebelumnya"
                },
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "sSearch": "Cari:",
                "sEmptyTable": "Tidak ada data yang tersedia dalam tabel",
                "sLengthMenu": "Tampilkan _MENU_ data",
                "sZeroRecords": "Tidak ada data yang cocok dengan pencarian Anda"
            }
        });
    });
    </script>

    <script>
    // Fungsi untuk memperbarui waktu secara real-time
    function updateClock() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();

        // Tambahkan nol di depan jika angka kurang dari 10
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;

        // Format waktu dalam string
        var currentTimeString = hours + ":" + minutes + ":" + seconds;

        // Update elemen HTML dengan waktu yang baru
        document.getElementById("current-time").innerHTML = "Jam :" + currentTimeString;
    }

    // Panggil fungsi updateClock setiap detik (1000 milidetik)
    setInterval(updateClock, 1000);

    // Panggil fungsi updateClock untuk memperbarui waktu saat halaman dimuat
    updateClock();
    </script>
</body>

</html>