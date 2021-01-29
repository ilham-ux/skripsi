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
                        <li class="breadcrumb-item active">Nilai Alternatif</li>
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
                                <h4 class="panel-title">Nilai Alternatif</h4>
                                <!--                                <a href="#" class="btn btn-primary btn-icon btn-circle btn-sm" onclick="tambah_periode()">
                                                                    <i class="fa fa-plus"></i> 
                                                                </a>-->
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="col-form-label">Periode Seleksi Karyawan</label>
                                        <select id="periode_aktif" name="periode" class="form-control form-control-sm">

                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                </div>
                                <hr>
                                <div id="data-periode-penilaian">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end panel -->
            </div>
            <!-- end #content -->

            <!-- #modal-dialog -->
            <div class="modal fade" id="modal-nilai-alternatif">
                <div class="modal-dialog">
                    <div style="background-color: #000;color: #fff" class="modal-content">
                        <div class="modal-header">
                            <h6 style="color: #fff" class="modal-title" id="label_tkriteria">Input Nilai Karyawan</h6>
                            <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                                <i class="fa fa-times"></i> 
                            </a>
                        </div>
                        <div id="data-kriteria-penilaian">

                        </div>
                    </div>
                </div>
            </div>

            <!-- #modal-dialog -->
            <div class="modal fade" id="modal-edit-alternatif">
                <div class="modal-dialog">
                    <div style="background-color: #000;color: #fff" class="modal-content">
                        <div class="modal-header">
                            <h6 style="color: #fff" class="modal-title" id="label_tkriteria">Edit Nilai Karyawan</h6>
                            <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                                <i class="fa fa-times"></i> 
                            </a>
                        </div>
                        <div id="data-edit-kriteria-penilaian">

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
                get_periode_aktif();
                get_data();
            });
        </script>

        <script>
            function get_periode_aktif() {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/get_periode_aktif'); ?>",
                    success: function (result) {
                        $('#periode_aktif').html(result);
                    }
                });
            }

            function get_data(par) {
                if (par == null) {
                    swal("Peringatan", "Silahkan pilih periode dan sesi terlebih dahulu", "warning");
                }

                var data = {
                    'id_periode_seleksi': par,
                };
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/get_alternatif_aktif'); ?>",
                    data: data,
                    beforeSend: function () {
                        $('#data-periode-penilaian').html('<div class="d-flex justify-content-center"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>');
                    },
                    success: function (result) {
                        $('#data-periode-penilaian').html(result);
                        $('#data-table-default').DataTable({
                            "language": {
                                "sEmptyTable": "Tidak ada data di database",
                            },
                            responsive: true
                        });
                    }
                });
            }

            function get_data_edit(id_periode_seleksi, id_alternatif) {
                var data = {
                    'id_periode_seleksi': id_periode_seleksi,
                    'id_alternatif': id_alternatif,
                    'id_dm': '<?php echo $this->session->userdata('id_dm'); ?>'
                };
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/get_data_edit_alternatif'); ?>",
                    data: data,
                    beforeSend: function () {
                        $('#data-edit-kriteria-penilaian').html('<div class="d-flex justify-content-center"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>');
                    },
                    success: function (result) {
                        $('#data-edit-kriteria-penilaian').html(result);
                        $('#form_edit_nilai_alternatif').bootstrapValidator({
                            fields: {
                                nilai_input: {
                                    selector: 'input[name="nilai[]"]',
                                    validators: {
                                        notEmpty: {
                                            message: 'Nilai tidak boleh kosong'
                                        },
                                        numeric: {
                                            message: 'Nilai harus berupa angka'
                                        },
                                    }
                                },
                                nilai_select: {
                                    selector: 'select[name="nilai[]"]',
                                    validators: {
                                        notEmpty: {
                                            message: 'Nilai tidak boleh kosong'
                                        },
                                        numeric: {
                                            message: 'Nilai harus berupa angka'
                                        },
                                    }
                                },
                            }
                        });

                        $("#form_edit_nilai_alternatif").on('success.form.bv', function (event) {
                            event.preventDefault();
                            var id_periode = $('#periode_aktif').val();
                            $.ajax({
                                type: 'POST',
                                url: "<?php echo site_url('user/update_nilai_alternatif'); ?>",
                                data: $("#form_edit_nilai_alternatif").serialize(),
                                success: function (result) {
                                    $('#modal-edit-alternatif').modal('hide');
                                    $('#form_edit_nilai_alternatif').data('bootstrapValidator').resetForm();
                                    swal({
                                        title: "Sukses",
                                        text: "Berhasi perbarui nilai karyawan",
                                        icon: "success"
                                    }).then(function () {
                                        get_data(id_periode);
                                    });
                                }
                            })
                        });
                    }
                });
            }

            function get_kriteria_penilaian(par) {
                var data = {
                    'id_periode_seleksi': par
                };
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/get_kriteria_penilaian'); ?>",
                    data: data,
                    success: function (result) {
                        $('#data-kriteria-penilaian').html(result);
                        $('#form_nilai_alternatif').bootstrapValidator({
                            fields: {
                                nilai_input: {
                                    selector: 'input[name="nilai[]"]',
                                    validators: {
                                        notEmpty: {
                                            message: 'Nilai tidak boleh kosong'
                                        },
                                        numeric: {
                                            message: 'Nilai harus berupa angka'
                                        },
                                    }
                                },
                                nilai_select: {
                                    selector: 'select[name="nilai[]"]',
                                    validators: {
                                        notEmpty: {
                                            message: 'Nilai tidak boleh kosong'
                                        },
                                        numeric: {
                                            message: 'Nilai harus berupa angka'
                                        },
                                    }
                                },
                            }
                        });

                        $('#modal-nilai-alternatif').on('show.bs.modal', function (event) {
                            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                            var modal = $(this)

                            // Isi nilai pada field
                            modal.find('#id_alternatif').attr("value", div.data('id_alternatif'));
                        });

                        $("#form_nilai_alternatif").on('success.form.bv', function (event) {
                            event.preventDefault();
                            var id_periode = $('#periode_aktif').val();
                            $.ajax({
                                type: 'POST',
                                url: "<?php echo site_url('user/input_nilai_alternatif'); ?>",
                                data: $("#form_nilai_alternatif").serialize(),
                                success: function (result) {
                                    $('#modal-nilai-alternatif').modal('hide');
                                    $('#form_nilai_alternatif').data('bootstrapValidator').resetForm();
                                    $('#form_nilai_alternatif').trigger("reset");
                                    swal({
                                        title: "Sukses",
                                        text: "Berhasil input nilai karyawan",
                                        icon: "success"
                                    }).then(function () {
                                        get_data(id_periode);
                                    });
                                }
                            })
                        });
                    }
                });
            }

            function simpan_penilaian_final(id_periode_seleksi) {
                swal({
                    title: "Peringatan",
                    text: "Data penilaian tidak dapat diubah kembali, tetap proses?",
                    icon: "warning",
                    buttons: {
                        cancel: "Batal",
                        confirm: "Proses"
                    }
                    //dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            'id_periode_seleksi': id_periode_seleksi
                        };
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo site_url('user/metode_moora'); ?>",
                            data: data,
                            success: function (result) {
                                if (result != 0) {
                                    // On success redirect.  
                                    swal({
                                        title: "Sukses",
                                        text: "Berhasil proses seleksi karyawan",
                                        icon: "success"
                                    }).then(function () {
                                        get_periode_aktif();
                                        get_data();
                                    });

                                } else
                                    swal({
                                        title: "Gagal!",
                                        text: "Gagal proses seleksi karyawan",
                                        icon: "error",
                                    })
                            }
                        })
                    } else {
                        //                            swal("Your imaginary file is safe!");
                    }
                });

            }

            $('#periode_aktif').on('change', function () {
                var periode = this.value;
                get_data(periode);
                get_kriteria_penilaian(periode);
            });
        </script>
    </body>
</html>
