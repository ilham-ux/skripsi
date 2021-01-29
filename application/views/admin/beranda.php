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
                        <li class="breadcrumb-item active">Beranda</li>
                    </ol>
                </nav>
                <!-- end breadcrumb -->
                <!-- begin panel -->
                <div class="row">
                    <div class="col-lg-12 col-md-8">
                        <div class="widget widget-stats bg-black">

                            <div class="stats-info">
                                <center>
                                    <img id="logo-undip" style="margin: 10px;padding: auto;height: 150px;" src="<?php echo base_url(); ?>assets/img/logo/waroeng-logo.png">
                                </center>
                            </div>
                            <div class="stats-link">
                                <a style="font-size: 12pt"><marquee>Selamat datang di SPK pemilihan karyawan terbaik Waroeng Group</marquee></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-inverse" data-sortable-id="index-10" >
                            <div class="panel-heading">
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                                <h4 class="panel-title">Kalender</h4>
                            </div>
                            <div class="panel-body">
                                <div id="datepicker-inline" class="datepicker-full-width overflow-y-scroll position-relative">
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="panel panel-inverse" data-sortable-id="index-10" >
                            <div class="panel-heading">
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                                <h4 class="panel-title">Statistik Jenis Kelamin Karyawan</h4>
                            </div>
                            <div class="panel-body">
                                <center><canvas id="myChart1" height="255"></canvas></center>
                                <script>
                                    var ctx = document.getElementById("myChart1");
                                    var myChart = new Chart(ctx, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ['Laki-Laki', 'Perempuan'],
                                            datasets: [{
                                                    label: '# of Tomatoes',
                                                    data: [<?php echo $laki ?>, <?php echo $perempuan ?>],
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.5)',
                                                        'rgba(54, 162, 235, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255,99,132,1)',
                                                        'rgba(54, 162, 235, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                        },
                                        options: {
                                            //cutoutPercentage: 40,
                                            responsive: false,

                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="panel panel-inverse" data-sortable-id="index-10" >
                            <div class="panel-heading">
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                                <h4 class="panel-title">Statistik Status Pernikahan Karyawan</h4>
                            </div>
                            <div class="panel-body">
                                <center><canvas id="myChart" height="255"></canvas></center>
                                <script>
                                    var ctx = document.getElementById("myChart");
                                    var myChart = new Chart(ctx, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ['Lajang', 'Menikah'],
                                            datasets: [{
                                                    label: '# of Tomatoes',
                                                    data: [<?php echo $lajang ?>, <?php echo $menikah ?>],
                                                    backgroundColor: [
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                        },
                                        options: {
                                            //cutoutPercentage: 40,
                                            responsive: false,

                                        }
                                    });
                                </script>
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

        <?php $this->load->view("admin/footer"); ?>
    </body>
</html>
