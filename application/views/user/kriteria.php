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
                        <li class="breadcrumb-item active">Data Kriteria</li>
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
                                <a href="#" class="btn btn-primary btn-icon btn-circle btn-sm" 
                                   data-toggle="modal" data-target="#modal-tambah-kriteria">
                                    <i class="fa fa-plus"></i> 
                                </a>
                                <a href="#" class="btn btn-success btn-xs" onclick="get_bobot_kriteria()">Kelola Bobot</a>
                            </div>
                            <div class="panel-body">
                                <div id="data-kriteria">

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
                                <h4 class="panel-title">Data Normalisasi</h4>
                            </div>
                            <div class="panel-body">
                                <div id="data-normalisasi">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end panel -->
            </div>
            <!-- end #content -->

            <!-- #modal-dialog -->
            <div class="modal fade" id="modal-tambah-kriteria">
                <div class="modal-dialog">
                    <div style="background-color: #000;color: #fff" class="modal-content">
                        <div class="modal-header">
                            <h4 style="color: #fff" class="modal-title">Tambah Kriteria</h4>
                            <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                                <i class="fa fa-times"></i> 
                            </a>
                        </div>
                        <form  role="form" enctype="multipart/form-data" id="form_tambah_kriteria" class="margin-bottom-0">
                            <div style="background-color: #fff"class="modal-body">
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Nama Kriteria</label>
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" name="nama_kriteria" placeholder="Nama kriteria" />
                                    </div>
                                </div>
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Tipe Kriteria</label>
                                    <div class="input-group m-b-10">
                                        <select name="tipe_kriteria" class="form-control">
                                            <option value="" >- Pilih salah satu -</option>
                                            <option value="benefit" >Benefit</option>
                                            <option value="cost" >Cost</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div style="background-color: #fff" class="modal-footer">
                                <button href="javascript:;" class="btn btn-warning" data-dismiss="modal">Batal</button>>
                                <button type="submit" class="btn btn-success">Simpan</button>>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- #modal-dialog -->
            <div class="modal fade" id="modal-edit-kriteria">
                <div class="modal-dialog">
                    <div style="background-color: #000;color: #fff" class="modal-content">
                        <div class="modal-header">
                            <h4 style="color: #fff" class="modal-title">Edit kriteria</h4>
                            <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                                <i class="fa fa-times"></i> 
                            </a>
                        </div>
                        <form enctype="multipart/form-data" id="form_update_kriteria" class="margin-bottom-0">
                            <div style="background-color: #fff"class="modal-body">
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Nama kriteria</label>
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" name="nama_kriteria" id="id_nama_kriteria" placeholder="Nama kriteria" />
                                        <input type="hidden" name="id_kriteria" id="id_kriteria"/>
                                    </div>
                                </div>
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Tipe Kriteria</label>
                                    <div class="input-group m-b-10">
                                        <select id="id_tipe_kriteria" name="tipe_kriteria" class="form-control">
                                            <option value="" >- Pilih salah satu -</option>
                                            <option value="benefit" >Benefit</option>
                                            <option value="cost" >Cost</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div style="background-color: #fff" class="modal-footer">
                                <button href="javascript:;" class="btn btn-warning" data-dismiss="modal">Batal</button>>
                                <button type="submit" class="btn btn-success">Update</button>>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- #modal-dialog -->
            <div class="modal fade" id="modal-kelola-bobot">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div id="kelola-bobot-kriteria">

                        </div>
                    </div>
                </div>
            </div>


            <!-- #modal-dialog -->
            <div class="modal fade" id="modal-tambah-normalisasi">
                <div class="modal-dialog">
                    <div style="background-color: #000;color: #fff" class="modal-content">
                        <div class="modal-header">
                            <h4 style="color: #fff" class="modal-title">Tambah Normalisasi Kriteria</h4>
                            <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                                <i class="fa fa-times"></i> 
                            </a>
                        </div>
                        <form  role="form" enctype="multipart/form-data" id="form_tambah_normalisasi" class="margin-bottom-0">
                            <div style="background-color: #fff"class="modal-body">
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Keterangan/Label Normalisasi Kriteria</label>
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" />
                                        <input type="hidden" id="t_id_kriteria" name="id_kriteria" /><input type="hidden" id="id_nama_kriteria" name="nama_kriteria" />
                                    </div>
                                </div>
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Nilai</label>
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" id="t_nilai" name="nilai" placeholder="Nilai" />
                                    </div>
                                </div>
                            </div>
                            <div style="background-color: #fff" class="modal-footer">
                                <button href="javascript:;" class="btn btn-warning" data-dismiss="modal">Batal</button>>
                                <button type="submit" class="btn btn-success">Simpan</button>>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- #modal-dialog -->
            <div class="modal fade" id="modal-kelola-normalisasi">
                <div class="modal-dialog">
                    <div style="background-color: #000;color: #fff" class="modal-content">
                        <div class="modal-header">
                            <h4 style="color: #fff" class="modal-title">Kelola normalisasi</h4>
                            <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                                <i class="fa fa-times"></i> 
                            </a>
                        </div>
                        <form enctype="multipart/form-data" id="form_update_normalisasi" class="margin-bottom-0">
                            <div style="background-color: #fff"class="modal-body">
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Keterangan/Label Normalisasi Kriteria</label>
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" id="u_keterangan" name="keterangan" placeholder="Keterangan" />
                                        <input type="hidden" name="id_normalisasi" id="id_normalisasi"/>
                                        <input type="hidden" name="id_kriteria" id="u_id_kriteria"/>
                                        <input type="hidden" name="nama_kriteria" id="id_nama_kriteria"/>
                                    </div>
                                </div>
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Nilai</label>
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" name="nilai" id="u_nilai" placeholder="Nilai" />
                                    </div>
                                </div>
                            </div>
                            <div style="background-color: #fff" class="modal-footer">
                                <button href="javascript:;" class="btn btn-warning" data-dismiss="modal">Batal</button>>
                                <button type="submit" class="btn btn-success">Update</button>>
                            </div>
                        </form>
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
                get_data_kriteria();
                get_data_normalisasi();
                $('#form_tambah_kriteria').bootstrapValidator({
                    fields: {
                        nama_kriteria: {
                            validators: {
                                notEmpty: {
                                    message: 'Nama kriteria tidak boleh kosong'
                                }
                            }
                        },
                        tipe_kriteria: {
                            validators: {
                                notEmpty: {
                                    message: 'Tipe kriteria tidak boleh kosong'
                                }
                            }
                        }
                    }
                });

                $('#form_update_kriteria').bootstrapValidator({
                    fields: {
                        nama_kriteria: {
                            validators: {
                                notEmpty: {
                                    message: 'Nama kriteria tidak boleh kosong'
                                }
                            }
                        },
                        tipe_kriteria: {
                            validators: {
                                notEmpty: {
                                    message: 'Tipe kriteria tidak boleh kosong'
                                }
                            }
                        }
                    }
                });

                $('#form_tambah_normalisasi').bootstrapValidator({
                    fields: {
                        keterangan: {
                            validators: {
                                notEmpty: {
                                    message: 'Keterangan tidak boleh kosong'
                                },
                                remote: {
                                    type: 'POST',
                                    message: 'Keterangan sudah digunakan',
                                    url: '<?php echo site_url('user/cek_keterangan'); ?>',
                                    data: function (validator) {
                                        return {
                                            id_kriteria: $('#t_id_kriteria').val()
                                        };
                                    }
                                }
                            }
                        },
                        nilai: {
                            validators: {
                                notEmpty: {
                                    message: 'Nilai tidak boleh kosong'
                                },
                                integer: {
                                    message: 'Nilai harus berupa angka'
                                },
                                remote: {
                                    type: 'POST',
                                    message: 'Nilai sudah digunakan',
                                    url: '<?php echo site_url('user/cek_nilai'); ?>',
                                    data: function (validator) {
                                        return {
                                            id_kriteria: $('#t_id_kriteria').val()
                                        };
                                    }
                                }
                            }
                        }
                    }
                });

                $('#form_update_normalisasi').bootstrapValidator({
                    fields: {
                        keterangan: {
                            validators: {
                                notEmpty: {
                                    message: 'Keterangan tidak boleh kosong'
                                },
                                remote: {
                                    type: 'POST',
                                    message: 'Keterangan sudah digunakan',
                                    url: '<?php echo site_url('user/cek_keterangan'); ?>',
                                    data: function (validator) {
                                        return {
                                            id_kriteria: $('#u_id_kriteria').val()
                                        };
                                    }
                                }
                            }
                        },
                        nilai: {
                            validators: {
                                notEmpty: {
                                    message: 'Nilai tidak boleh kosong'
                                },
                                integer: {
                                    message: 'Nilai harus berupa angka'
                                },
                                remote: {
                                    type: 'POST',
                                    message: 'Nilai sudah digunakan',
                                    url: '<?php echo site_url('user/cek_nilai'); ?>',
                                    data: function (validator) {
                                        return {
                                            id_kriteria: $('#u_id_kriteria').val()
                                        };
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#modal-edit-kriteria').on('show.bs.modal', function (event) {
                    var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                    var modal = $(this)
                    // Isi nilai pada field
                    modal.find('#id_kriteria').attr("value", div.data('id_kriteria'));
                    modal.find('#id_nama_kriteria').attr("value", div.data('nama_kriteria'));
                    modal.find('#id_tipe_kriteria option[value=' + div.data('tipe_kriteria') + ']').attr('selected', 'selected');
                });

                $('#modal-kelola-normalisasi').on('show.bs.modal', function (event) {
                    var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                    var modal = $(this)
                    // Isi nilai pada field
                    modal.find('#id_normalisasi').attr("value", div.data('id_normalisasi'));
                    modal.find('#u_id_kriteria').attr("value", div.data('id_kriteria'));
                    modal.find('#id_nama_kriteria').attr("value", div.data('nama_kriteria'));
                    modal.find('#u_keterangan').attr("value", div.data('keterangan'));
                    modal.find('#u_nilai').attr("value", div.data('nilai'));
                });

                $('#modal-kelola-normalisasi').on('hide.bs.modal', function (e) {
                    $('#form_update_normalisasi').data('bootstrapValidator').resetForm();
                    $('#form_update_normalisasi').trigger("reset");
                })

                $("#form_tambah_kriteria").on('success.form.bv', function (event) {
                    event.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('user/tambah_kriteria'); ?>",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function (result) {
                            if (result != 0) {
                                $('#modal-tambah-kriteria').modal('hide');
                                $('#form_tambah_kriteria').data('bootstrapValidator').resetForm();
                                $('#form_tambah_kriteria').trigger("reset");
                                swal({
                                    title: "Sukses",
                                    text: "Berhasil tambah kriteria",
                                    icon: "success"
                                }).then(function () {
                                    get_data_kriteria();
                                });
                            } else {
                                swal({
                                    title: "Gagal",
                                    text: "Gagal tambah kriteria",
                                    icon: "error"
                                })
                            }
                        }
                    })
                });

                $("#form_update_kriteria").on('success.form.bv', function (event) {
                    event.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('user/update_kriteria'); ?>",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function (result) {
                            if (result != 0) {
                                $('#modal-edit-kriteria').modal('hide');
                                $('#form_update_kriteria').data('bootstrapValidator').resetForm();
                                $('#form_update_kriteria').trigger("reset");
                                swal({
                                    title: "Sukses",
                                    text: "Berhasil update kriteria",
                                    icon: "success"
                                }).then(function () {
                                    get_data_kriteria();
                                });
                            } else {
                                swal({
                                    title: "Gagal",
                                    text: "Gagal update kriteria",
                                    icon: "error"
                                })
                            }
                        }
                    })
                });
                $("#form_tambah_normalisasi").on('success.form.bv', function (event) {
                    event.preventDefault();
                    var modal = $('#modal-tambah-normalisasi');
                    var nama_kriteria = modal.find('#id_nama_kriteria').val();
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('user/tambah_normalisasi'); ?>",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function (result) {
                            if (result != 0) {
                                $('#modal-tambah-normalisasi').modal('hide');
                                $('#form_tambah_normalisasi').data('bootstrapValidator').resetForm();
                                $('#form_tambah_normalisasi').trigger("reset");
                                swal({
                                    title: "Sukses",
                                    text: "Berhasil tambah normalisasi",
                                    icon: "success"
                                }).then(function () {
                                    get_data_normalisasi(result, nama_kriteria);
                                });
                            } else {
                                swal({
                                    title: "Gagal",
                                    text: "Gagal tambah normalisasi",
                                    icon: "error"
                                })
                            }
                        }
                    })
                });
                $("#form_update_normalisasi").on('success.form.bv', function (event) {
                    event.preventDefault();
                    var modal = $('#modal-kelola-normalisasi');
                    var id_kriteria = modal.find('#u_id_kriteria').val();
                    var nama_kriteria = modal.find('#id_nama_kriteria').val();
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('user/update_normalisasi'); ?>",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function (result) {
                            if (result != 0) {
                                $('#modal-kelola-normalisasi').modal('hide');
                                $('#form_update_normalisasi').data('bootstrapValidator').resetForm();
                                $('#form_update_normalisasi').trigger("reset");
                                swal({
                                    title: "Sukses",
                                    text: "Berhasil update normalisasi",
                                    icon: "success"
                                }).then(function () {
                                    get_data_normalisasi(id_kriteria, nama_kriteria);
                                });
                            } else {
                                swal({
                                    title: "Gagal",
                                    text: "Gagal update normalisasi",
                                    icon: "error"
                                })
                            }
                        }
                    })
                });
            });
        </script>
        <script>
            function get_data_kriteria() {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/get_kriteria'); ?>",
                    beforeSend: function () {
                        $('#data-kriteria').html('<div class="d-flex justify-content-center"><div class="fa-3x"><i class="fas fa-spinner fa-pulse"></i></div></div>');
                    },
                    success: function (result) {
                        $('#data-kriteria').html(result);
                        $('#data-table-default').DataTable({
                            responsive: true
                        });
                    }
                });
            }

            function get_bobot_kriteria() {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/get_bobot'); ?>",
                    success: function (result) {
                        $('#kelola-bobot-kriteria').html(result);
                        $('#modal-kelola-bobot').modal('show');
                        $('#form_kelola_bobot').bootstrapValidator({
                            fields: {
                                "bobot_kriteria[]": {
                                    validators: {
                                        notEmpty: {
                                            message: 'Bobot tidak boleh kosong'
                                        },
                                        regexp: {
                                            regexp: /^([1-9][0-9]{0,1}|100)$/i,
                                            message: 'Bobot harus berupa angka antara 1 hingga 100'
                                        }
                                    }
                                }
                            }
                        });
                        $("#form_kelola_bobot").on('success.form.bv', function (event) {
                            event.preventDefault();
                            $.ajax({
                                type: 'POST',
                                url: "<?php echo site_url('user/update_bobot'); ?>",
                                data: $("#form_kelola_bobot").serialize(),
                                success: function (result) {
                                    $('#modal-kelola-bobot').modal('hide');
                                    swal({
                                        title: "Sukses",
                                        text: "Berhasi kelola bobot kriteria",
                                        icon: "success"
                                    }).then(function () {
                                        get_data_kriteria()();
                                    });
                                }
                            })
                        });
                    }
                });
            }

            function cek_jumlah_bobot() {

                var bobot = 0;
                $('input[name="bobot_kriteria[]"').each(function () {
                    bobot += Number($(this).val());
                });
                $('#progress_bobot').attr("aria-valuenow", bobot);
                $('#progress_bobot').attr("style", "width:" + bobot + "%");
                $('#progress_bobot').text(bobot + '%');
                if (bobot != 100) {
                    $('#peringatan_bobot').show(1000);
                    $("#bt_simpan_bobot").attr("disabled", true);
                } else {
                    $('#peringatan_bobot').hide(1000);
                    $("#bt_simpan_bobot").removeAttr("disabled");
                }

            }

            function get_data_normalisasi(id_kriteria, nama_kriteria) {
                var data = {
                    'id_kriteria': id_kriteria,
                    'nama_kriteria': nama_kriteria,
                };
                var modal = $('#modal-tambah-normalisasi');
                modal.find('#t_id_kriteria').val(id_kriteria);
                modal.find('#id_nama_kriteria').val(nama_kriteria);
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/get_normalisasi'); ?>",
                    data: data,
                    beforeSend: function () {
                        $('#data-normalisasi').html('<div class="d-flex justify-content-center"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>');
                    },
                    success: function (result) {
                        $('#data-normalisasi').html(result);
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

            function hapus_kriteria(id) {
                swal({
                    title: "Peringatan Hapus",
                    text: "Apakah anda yakin menghapus data kriteria ini?",
                    icon: "warning",
                    buttons: {
                        cancel: "Batal",
                        confirm: "Hapus"
                    }
                    //dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var data_hapus = {
                            'id_hapus_kriteria': id,
                        };
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo site_url('user/hapus_kriteria'); ?>",
                            data: data_hapus,
                            success: function (result) {
                                if (result != 0) {
                                    // On success redirect.  
                                    swal({
                                        title: "Sukses",
                                        text: "Berhasil hapus kriteria",
                                        icon: "success"
                                    }).then(function () {
                                        get_data_kriteria();
                                    });

                                } else
                                    swal({
                                        title: "Gagal!",
                                        text: "Gagal hapus kriteria",
                                        icon: "error",
                                    })
                            }
                        })
                    } else {
                        //                            swal("Your imaginary file is safe!");
                    }
                });
            }

            function hapus_normalisasi(id) {
                swal({
                    title: "Peringatan Hapus",
                    text: "Apakah anda yakin menghapus data normalisasi ini?",
                    icon: "warning",
                    buttons: {
                        cancel: "Batal",
                        confirm: "Hapus"
                    }
                    //dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var data_hapus = {
                            'id_hapus_normalisasi': id,
                        };
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo site_url('user/hapus_normalisasi'); ?>",
                            data: data_hapus,
                            success: function (result) {
                                if (result != 0) {
                                    // On success redirect.  
                                    swal({
                                        title: "Sukses",
                                        text: "Berhasil hapus normalisasi",
                                        icon: "success"
                                    }).then(function () {
                                        get_data_normalisasi();
                                    });

                                } else
                                    swal({
                                        title: "Gagal!",
                                        text: "Gagal hapus normalisasi",
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
