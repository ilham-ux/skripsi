<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <?php $this->load->view("user/header"); ?>
    <body>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade show"><span class="spinner"></span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="page-container fade page-without-sidebar page-header-fixed page-with-top-menu">
            <!-- begin #header -->
            <div id="header" class="header navbar-default">
                <!-- begin navbar-header -->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Waroeng</b> Group</a>
                </div>
                <!-- end navbar-header -->
                <?php $this->load->view("user/navbar"); ?>
            </div>
            <!-- end #header -->

            <?php $this->load->view("user/top_menu"); ?>

            <!-- begin #content -->
            <div id="content" class="content">
                <!-- begin breadcrumb -->

                <nav style="display: grid; padding-bottom: 10px; font-size: 12pt" aria-label="breadcrumb" >
                    <ol class="breadcrumb pull-left">
                        <li class="breadcrumb-item"><a href="javascript:;">WaroengGroup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">User</a></li>
                        <li class="breadcrumb-item active">Periode Seleksi dan Alternatif</li>
                    </ol>
                </nav>
                <!-- end breadcrumb -->
                <!-- begin panel -->
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-inverse" data-sortable-id="index-10" >
                            <div class="panel-heading">
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                                <a href="#" class="btn btn-primary btn-icon btn-circle btn-sm" onclick="tambah_periode()">
                                    <i class="fa fa-plus"></i> 
                                </a>
                            </div>
                            <div class="panel-body">
                                <div id="data-periode">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-inverse" data-sortable-id="index-10" >
                            <div class="panel-heading">
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                                <h4 class="panel-title">Data Alternatif Karyawan</h4>
                            </div>
                            <div class="panel-body">
                                <div id="data-alternatif-karyawan">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end panel -->
            </div>
            <!-- end #content -->

            <!-- begin scroll to top btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            <!-- end scroll to top btn -->
        </div>
        <!-- end page container -->

        <?php $this->load->view("user/footer"); ?>

        <script>
            $(document).ready(function () {
                get_periode();
                get_alternatif_karyawan();
            });
        </script>

        <script></script>

        <script>
            function get_periode() {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/get_periode'); ?>",
                    beforeSend: function () {
                        $('#data-periode').html('<div class="d-flex justify-content-center"><div class="fa-3x"><i class="fas fa-spinner fa-pulse"></i></div></div>');
                    },
                    success: function (result) {
                        $('#data-periode').html(result);
                        $('#data-table-default').DataTable({
                            responsive: true
                        });
                    }
                });
            }

            function tambah_periode() {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/cek_jumlah_karyawan'); ?>",
                    success: function (hasil) {
                        if (hasil == 'proses') {
                            swal("Peringatan!", "Masih pada proses seleksi pada periode ini!", "warning");
                        } else if (hasil == 0) {
                            swal("Peringatan!", "Jumlah karyawan 0 orang, silahkan input data karyawan!", "warning");
                        } else {
                            swal({
                                title: "Pemberitahuan",
                                text: "Jumlah karyawan : " + hasil + " orang, lanjutkan tambah periode?",
                                icon: "info",
                                buttons: {
                                    cancel: "Batal",
                                    confirm: "Lanjut"
                                }
                                //dangerMode: true,
                            }).then((willDelete) => {
                                if (willDelete) {
                                    $.ajax({
                                        type: 'POST',
                                        url: "<?php echo site_url('user/tambah_periode'); ?>",
                                        success: function (result) {
                                            if (result == 1) {
                                                // On success redirect.  
                                                swal({
                                                    title: "Sukses",
                                                    text: "Berhasil tambah periode",
                                                    icon: "success"
                                                }).then(function () {
                                                    get_periode();
                                                });

                                            } else
                                                swal({
                                                    title: "Gagal!",
                                                    text: "Sudah ada 2 sesi dalam periode " + result,
                                                    icon: "error",
                                                })
                                        }
                                    })
                                } else {
                                    //                            swal("Your imaginary file is safe!");
                                }
                            });
                        }
                    }
                })
            }

            function get_alternatif_karyawan(id_periode, periode_bulan, sesi) {
                var data = {
                    'id_periode': id_periode,
                    'periode_bulan': periode_bulan,
                    'sesi': sesi
                };
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/get_alternatif_karyawan'); ?>",
                    data: data,
                    beforeSend: function () {
                        $('#data-alternatif-karyawan').html('<div class="d-flex justify-content-center"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>');
                    },
                    success: function (result) {
                        $('#data-alternatif-karyawan').html(result);
                        $('#data-table-default1').DataTable({
                            "language": {
                                "url": "http://localhost:8888/vendor_selection/aset/assets/plugins/DataTables/json/indonesian.json",
                                "sEmptyTable": "Tidak ada data di database",
                            },
                            responsive: true
                        });

                    }
                });
            }

            function hapus_periode(id) {
                swal({
                    title: "Peringatan Hapus",
                    text: "Apakah anda yakin menghapus data periode seleksi ini?",
                    icon: "warning",
                    buttons: {
                        cancel: "Batal",
                        confirm: "Hapus"
                    }
                    //dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var data_hapus = {
                            'id_hapus_periode': id,
                        };
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo site_url('user/hapus_periode'); ?>",
                            data: data_hapus,
                            success: function (result) {
                                if (result != 0) {
                                    // On success redirect.  
                                    swal({
                                        title: "Sukses",
                                        text: "Berhasil hapus periode",
                                        icon: "success"
                                    }).then(function () {
                                        get_periode();
                                    });

                                } else
                                    swal({
                                        title: "Gagal!",
                                        text: "Gagal hapus periode",
                                        icon: "error",
                                    })
                            }
                        })
                    } else {
                        //                            swal("Your imaginary file is safe!");
                    }
                });
            }
        </script>

    </body>
</html>
