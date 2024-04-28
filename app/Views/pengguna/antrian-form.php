<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ANTRIAN-ANTRIAN ADMINISTRASI INFORMATIKA</title>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/fontawesome-free/css/fontawesome.css">
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    <style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        float: right;
    }

    /* Hide default HTML checkbox */
    .switch input {
        display: none;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input.default:checked+.slider {
        background-color: #2196F3;
    }

    input.primary:checked+.slider {
        background-color: #2196F3;
    }

    input.success:checked+.slider {
        background-color: #8bc34a;
    }

    input.info:checked+.slider {
        background-color: #3de0f5;
    }

    input.warning:checked+.slider {
        background-color: #FFC107;
    }

    input.danger:checked+.slider {
        background-color: #f44336;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
    </style>
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
                <a class="nav-link" href="/pengguna/dashboard">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="/pengguna/antrian-form">
                    <i class="fas fa-fw fa-list-ol"></i>
                    <span>Antrian</span></a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Pengguna</span>
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="card-header d-flex justify-content-between py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Antrian Tersedia</h6>
                                <h6 class="m-0 font-weight-bold text-primary" id="dateInfo"></h6>
                            </div>
                            <?php if (session()->has('errors')): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach (session()->get('errors') as $error): ?>
                                    <li><?=esc($error)?></li>
                                    <?php endforeach?>
                                </ul>
                            </div>
                            <?php endif?>
                            <table class="table table-bordered" id="dataX" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope='col'>No.</th>
                                        <th>Jam Layanan</th>
                                        <th>Total Antrian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    <?php foreach ($antrianstatus as $a): ?>
                                    <?php if ($a['status'] == 'ON'): ?>
                                    <tr>
                                        <th scope='row'><?=$i++;?></th>
                                        <td data-jam-antrian="<?=$a['jam_antrian'];?>"><?=$a['jam_antrian'];?></td>

                                        <td class="result-<?=$i;?>"></td>
                                        <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            // Fetch data from the CI4 API endpoint
                                            fetch(
                                                    "http://localhost:8080/test/<?=$a['jam_antrian'];?>")
                                                .then((res) => res.text())
                                                .then((result) => {
                                                    // Log the raw response for debugging


                                                    // Extract only numeric part using regular expression
                                                    const numericPart = result.match(/\d+/);

                                                    // Check if a valid number is found
                                                    if (numericPart) {
                                                        // Convert the string to a number
                                                        const numericValue = parseInt(numericPart[0], 10);

                                                        // Limit the numeric value to the range 0-15
                                                        const limitedValue = Math.min(15, Math.max(0,
                                                            numericValue));

                                                        const myInput = document.querySelector(
                                                            '.myInput-<?=$i;?>');
                                                        myInput.value = limitedValue + 1;
                                                        // Display the result inside the corresponding <td>
                                                        const resultTd = document.querySelector(
                                                            '.result-<?=$i;?>');
                                                        resultTd.textContent = limitedValue +
                                                            "/15"; // Set content directly
                                                    } else {
                                                        console.error(
                                                            'No valid number found in the response');
                                                    }
                                                })
                                                .catch((error) => {
                                                    console.error('Error fetching news:', error);
                                                });
                                        });
                                        </script>

                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#ambilnomor<?=$i;?>">
                                                Ambil Nomor
                                            </button>

                                            <form action="/addantrian" method="post" enctype="multipart/form-data">
                                                <div class="modal fade" id="ambilnomor<?=$i;?>" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Ambil Nomor Antrian
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="hidden" name="jam"
                                                                    value=<?=$a['jam_antrian'];?>>

                                                                <?php foreach ($pengguna as $p): ?>

                                                                <input type="hidden" name="nama_mahasiswa"
                                                                    value="<?=$p['nama_mahasiswa'];?>">

                                                                <input type="hidden" name="nim" value=<?=$p['nim'];?>>
                                                                <?php endforeach;?>
                                                                <input type="hidden" name="nomor"
                                                                    class="myInput-<?=$i;?>" value="">
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="no_hp">No. WA Aktif</label>
                                                                    <input type="text" class="form-control" id="no_hp"
                                                                        name="no_hp" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_layanan">Nama Layanan</label>
                                                                    <select class="custom-select" id="nama_layanan"
                                                                        name="nama_layanan" required>
                                                                        <?php foreach ($layanan as $l): ?>

                                                                        <option value="<?=$l['nama_layanan'];?>">
                                                                            <?=$l['nama_layanan'];?></option>

                                                                        <?php endforeach;?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name">Deskripsi</label><br>
                                                                    <a href="<?=$l['deskripsi'];?>"
                                                                        target="_blank"><?=$l['deskripsi'];?></a><br><br>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="form-label">Upload File</label>
                                                                    <input type="file" id="file" name="file"
                                                                        class="from-control">



                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">
                                                                        Tutup
                                                                    </button>
                                                                    <button type="submit" class="btn btn-success"
                                                                        id="data-jam">
                                                                        Ambil Nomor
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                        </div>
                        </form>
                        </td>

                        </tr>
                        <?php endif;?>
                        <?php endforeach;?>
                        </tbody>
                        </table>


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
                <div class="modal-body">Setelah <b>Logout</b>, untuk masuk ke sistem ini anda diharuskan <b>Login</b>
                    terlebih.</div>
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
    document.addEventListener('DOMContentLoaded', function() {
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember'
        ];

        const now = new Date();
        const dayOfWeek = days[now.getDay()];
        const dayOfMonth = now.getDate();
        const month = months[now.getMonth()];
        const year = now.getFullYear();

        const todayElement = document.getElementById('dateInfo');
        todayElement.textContent = 'Hari ini: ' + dayOfWeek + ', ' + dayOfMonth + ' ' + month + ' ' + year;
    });
    </script>






</body>

</html>