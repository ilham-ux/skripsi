<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <?php $this->load->view("admin/header"); ?>
    <body class="pace-top">
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade show"><span class="spinner"></span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade">
            <!-- begin login -->
            <div class="login bg-black animated fadeInDown">
                <!-- begin brand -->
                <div class="login-header">
                    <div class="brand">
                        <span class="logo"></span> <b>Waroeng</b> Group
                        <small>SPK Pemilihan karyawan terbaik</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-lock"></i>
                    </div>
                </div>
                <!-- end brand -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form id="form_login" class="margin-bottom-0">
                        <div class="form-group m-b-20">
                            <input type="text" name="username" id="txt_username" class="form-control form-control-lg inverse-mode" placeholder="Username"/>
                        </div>
                        <div class="form-group m-b-20">
                            <input type="password" name="password" id="txt_password" class="form-control form-control-lg inverse-mode" placeholder="Password"/>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">Login</button>
                        </div>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end login -->

        </div>
        <!-- end page container -->

        <?php $this->load->view("admin/footer"); ?>

        <script>
            $(document).ready(function () {
                $('#form_login').bootstrapValidator({
                    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                    fields: {
                        username: {

                            validators: {

                                stringLength: {
                                    min: 4,
                                    message: 'username minimal 4 karakter'
                                },
                                notEmpty: {
                                    message: 'username tidak boleh kosong'
                                },
                                regexp: {
                                    regexp: /^[a-z\s]+$/i,
                                    message: 'Harus berupa huruf'
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'password tidak boleh kosong'
                                }
                            }
                        },
                    },
                })
                $('#form_login').on('success.form.bv', function (event) {
                    event.preventDefault();
                    var data_login = {
                        'data_username': $("#txt_username").val(),
                        'data_password': $("#txt_password").val(),
                    };
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('autentikasi/login'); ?>",
                        data: data_login,
                        success: function (result) {
                            if (result != 0) {
                                // On success redirect.  

                                swal({
                                    title: "Login Sukses!",
                                    text: "Selamat menggunakan SPK pemilihan karyawan terbaik",
                                    icon: "success",
                                }).then(function () {
                                    window.location = result;
                                });

                            } else
                                swal({
                                    title: "Login Gagal!",
                                    text: "Mohon periksa kembali username atau password",
                                    icon: "error",
                                }).then(function () {
                                    $("#bt_login").removeAttr("disabled");
                                });
                        }
                    })
                })
            });
        </script>
    </body>
</html>
