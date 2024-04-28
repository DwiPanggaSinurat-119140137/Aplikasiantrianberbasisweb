<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LAYANAN-ANTRIAN ADMINISTRASI INFORMATIKA</title>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/vendor/fontawesome-free/css/fontawesome.css" />
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/vendor/sweetalert2/dist/sweetalert2.min.css" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <small> ANTRIAN ADMINISTRASI INFORMATIKA</small>
            </a>

            <hr class="sidebar-divider my-0" />

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

            <hr class="sidebar-divider" />

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
                                <img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg" />
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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Data Layanan

                                <?php if (session()->getFlashdata('pesan')): ?>
                                <div class="alert alert-success" role="alert">
                                    <h6>
                                        <?=session()->getFlashdata('pesan');?>
                                    </h6>
                                </div>
                                <?php endif;?>

                            </h4>

                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#tambahlayanan">
                                    <i class="fas fa-plus-square"></i>
                                    Tambah Layanan
                                </button>

                                <!-- Modal Tambah Layanan-->
                                <form action="/addlayanan" method="post">
                                    <div class="modal fade" id="tambahlayanan" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Tambah Layanan
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="nama_layanan">Nama Layanan</label>
                                                        <input type="text" class="form-control" id="nama_layanan"
                                                            name="nama_layanan" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Deskripsi</label>
                                                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                        Tutup
                                                    </button>
                                                    <button type="submit" class="btn btn-success">
                                                        Simpan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </form>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataX" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope='col'>No.</th>
                                            <th>Nama Layanan</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;?>
                                        <?php foreach ($layanan as $l): ?>
                                        <tr>
                                            <th scope='row'><?=$i++;?></th>
                                            <td><?=$l['nama_layanan'];?></td>
                                            <td><?=$l['deskripsi'];?></td>
                                            <td>
                                                <!-- Modal Edit Layanan -->
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#editlayanan<?=$l['id'];?>">
                                                    <i class="fa fa-pen-square"></i> Edit
                                                </button>

                                                <div class="modal fade" id="editlayanan<?=$l['id'];?>" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Layanan</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/editlayanan" method="post">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="id"
                                                                            value=<?=$l['id'];?>>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_layanan">Nama Layanan</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama_layanan" name="nama_layanan"
                                                                            required value=<?=$l['nama_layanan'];?>>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="deskripsi">Deskripsi</label>
                                                                        <textarea name="deskripsi" id="deskripsi"
                                                                            cols="30" rows="10"
                                                                            class="form-control"><?=$l['deskripsi'];?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Simpan</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                                <!-- Button trigger modal hapus-->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#hapuslayanan<?=$l['id'];?>">
                                                    <i class="fas fa-trash"></i>
                                                    Hapus
                                                </button>

                                                <div class="modal fade" id="hapuslayanan<?=$l['id'];?>" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Alert
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/deletelayanan" method="post">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="id"
                                                                            value=<?=$l['id'];?>>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label> Apakah anda yakin ingin menghapus
                                                                            layanan ini?</label>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Hapus</button>
                                                                    </div>
                                                            </form>

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
                    <h5 class="modal-title" id="exampleModalLabel">
                        Yakin Ingin Logout?
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Setelah <b>Logout</b>, untuk masuk ke sistem ini anda diharuskan
                    <b>Login</b> terlebih.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        Cancel
                    </button>
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
</body>

</html>