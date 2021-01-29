<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <?php $this->load->view("admin/header"); ?>
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
                <?php $this->load->view("admin/navbar"); ?>
            </div>
            <!-- end #header -->

            <?php $this->load->view("admin/top_menu"); ?>

            <!-- begin #content -->
            <div id="content" class="content">
                <!-- begin breadcrumb -->

                <nav style="display: grid; padding-bottom: 10px; font-size: 12pt" aria-label="breadcrumb" >
                    <ol class="breadcrumb pull-left">
                        <li class="breadcrumb-item"><a href="javascript:;">WaroengGroup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">Admin</a></li>
                        <li class="breadcrumb-item active">Data Karyawan</li>
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
                                <h4 class="panel-title">Data Karyawan</h4>
                            </div>
                            <div class="panel-body">
                                <div id="data-karyawan">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end panel -->
            </div>
            <!-- end #content -->

            <!-- #modal-message -->
            <div class="modal fade" id="modal-detail-karyawan">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Data Karyawan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div id="data-detail-karyawan">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-success" data-dismiss="modal">Oke</a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- begin scroll to top btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            <!-- end scroll to top btn -->
        </div>
        <!-- end page container -->

        <?php $this->load->view("admin/footer"); ?>
        <script>
            //Form Validation
            $(document).ready(function () {
                get_data_karyawan();
            });

        </script>

        <script>

            function get_data_karyawan() {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('admin/get_karyawan'); ?>",
                    beforeSend: function () {
                        $('#data-karyawan').html('<div class="d-flex justify-content-center"><div class="fa-3x"><i class="fas fa-spinner fa-pulse"></i></div></div>');
                    },
                    success: function (result) {
                        $('#data-karyawan').html(result);
                        $('#data-table-default3').DataTable({
                            responsive: true
                        });
                    }
                });
            }

            function detail_karyawan(par) {
                var data = {
                    'id_karyawan': par,
                };
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('admin/get_detail_karyawan'); ?>",
                    data: data,
                    success: function (result) {
                        $('#data-detail-karyawan').html(result);
                        $('#modal-detail-karyawan').modal('show');
                    }
                });
            }

        </script>
    </body>
</html>
