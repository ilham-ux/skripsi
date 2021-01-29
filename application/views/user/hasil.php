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
                        <li class="breadcrumb-item active">Hasil Pemilihan Karyawan</li>
                    </ol>
                </nav>
                <!-- end breadcrumb -->
                <!-- begin panel -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-inverse" data-sortable-id="index-10" >
                            <div class="panel-heading">
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                                <h4 class="panel-title">Hasil Pemilihan Karyawan</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="col-form-label">Periode Seleksi Karyawan</label>
                                        <select id="periode_selesai" name="periode" class="form-control form-control-sm">

                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                </div>
                                <hr>
                                <div id="data-hasil_seleksi">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end panel -->
            </div>
            <!-- end #content -->

            <!-- #modal-message -->
            <div class="modal fade" id="modal-proses-moora">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="periode_perangkingan"></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div id="data-perangkingan-moora">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Tutup</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- begin scroll to top btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            <!-- end scroll to top btn -->
        </div>
        <!-- end page container -->

        <?php $this->load->view("user/footer"); ?>

        <script>
            $(document).ready(function () {
                get_periode_selesai();
                get_data();
            });
        </script>

        <script>
            function get_periode_selesai() {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/get_periode_selesai'); ?>",
                    success: function (result) {
                        $('#periode_selesai').html(result);
                    }
                });
            }

            function get_data(par, label) {
                if (par == null) {
                    swal("Peringatan", "Silahkan pilih periode dan sesi terlebih dahulu", "warning");
                    $('#data-hasil_seleksi').html('<div class="d-flex justify-content-center"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>');
                } else {
                    var data = {
                        'id_periode_seleksi': par,
                        'label': label,
                    };
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('user/get_hasil_seleksi'); ?>",
                        data: data,
                        beforeSend: function () {
                            $('#data-hasil_seleksi').html('<div class="d-flex justify-content-center"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>');
                        },
                        success: function (result) {
                            $('#data-hasil_seleksi').html(result);
                        }
                    });
                }
            }

            function perangkingan_moora(par1) {
                var data = {
                    'id_periode_seleksi': par1,
                };
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/get_perangkingan_moora'); ?>",
                    data: data,
                    success: function (result) {
                        $('#data-perangkingan-moora').html(result);
                        $('#modal-proses-moora').modal('show');
                        var modal = $('#modal-proses-moora');
                        modal.find('#periode_perangkingan').text("Proses Perangkingan Karyawan " + $("#periode_selesai option:selected").text());
                    }
                });
            }

            $('#periode_selesai').on('change', function () {
                var periode = this.value;
                var label = $("#periode_selesai option:selected").text();
                if (periode == "0") {
                    get_data();
                } else {
                    get_data(periode, label);
                }
            });
        </script>
    </body>
</html>
