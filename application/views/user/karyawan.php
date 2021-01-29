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
                        <li class="breadcrumb-item active">Data Karyawan</li>
                    </ol>
                </nav>
                <!-- end breadcrumb -->
                <!-- begin panel -->
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-items">
                                <a href="#tab-2" data-toggle="tab" class="nav-link active">
                                    <span class="d-sm-none">Tab 2</span>
                                    <span class="d-sm-block d-none">Data Kantor Cabang dan Karyawan</span>
                                </a>
                            </li>
                            <li class="nav-items">
                                <a href="#tab-1" data-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">Tab 1</span>
                                    <span class="d-sm-block d-none">Data Departemen dan Jabatan</span>
                                </a>
                            </li>
                        </ul>
                        <!-- end nav-tabs -->
                        <!-- begin tab-content -->
                        <div class="tab-content">
                            <!-- begin tab-pane -->
                            <div class="tab-pane fade" id="tab-1">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="panel panel-inverse" data-sortable-id="index-10" >
                                            <div class="panel-heading">
                                                <div class="panel-heading-btn">
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-plus"></i></a>
                                                </div>
                                                <a href="#" class="btn btn-primary btn-icon btn-circle btn-sm" 
                                                   data-toggle="modal" data-target="#modal-tambah-departemen">
                                                    <i class="fa fa-plus"></i> 
                                                </a>
                                            </div>
                                            <div class="panel-body border">
                                                <div id="data-departemen">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="panel panel-inverse" data-sortable-id="index-10" >
                                            <div class="panel-heading">
                                                <div class="panel-heading-btn">
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                </div>
                                                <a href="#" class="btn btn-primary btn-icon btn-circle btn-sm" 
                                                   data-toggle="modal" data-target="#modal-tambah-jabatan">
                                                    <i class="fa fa-plus"></i> 
                                                </a>
                                            </div>
                                            <div class="panel-body border">
                                                <div id="data-jabatan">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab-pane -->
                            <!-- begin tab-pane -->
                            <div class="tab-pane fade active show" id="tab-2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="panel panel-inverse" data-sortable-id="index-10" >
                                            <div class="panel-heading">
                                                <div class="panel-heading-btn">
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                </div>
                                                <a href="#" class="btn btn-primary btn-icon btn-circle btn-sm" 
                                                   data-toggle="modal" data-target="#modal-tambah-cabang">
                                                    <i class="fa fa-plus"></i> 
                                                </a>
                                            </div>
                                            <div class="panel-body border">
                                                <div id="data-cabang">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="panel panel-inverse" data-sortable-id="index-10" >
                                            <div class="panel-heading">
                                                <div class="panel-heading-btn">
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                </div>
                                                <a href="#" class="btn btn-primary btn-icon btn-circle btn-sm" 
                                                   data-toggle="modal" data-target="#modal-tambah-karyawan">
                                                    <i class="fa fa-plus"></i> 
                                                </a>
                                            </div>
                                            <div class="panel-body border">
                                                <div id="data-karyawan">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab-pane -->
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

        <!-- #modal-dialog -->
        <div class="modal fade" id="modal-tambah-cabang">
            <div class="modal-dialog">
                <div style="background-color: #000;color: #fff" class="modal-content">
                    <div class="modal-header">
                        <h4 style="color: #fff" class="modal-title">Tambah Kantor Cabang</h4>
                        <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> 
                        </a>
                    </div>
                    <form  role="form" enctype="multipart/form-data" id="form_tambah_cabang" class="margin-bottom-0">
                        <div style="background-color: #fff"class="modal-body">
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Nama Kantor Cabang</label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" name="nama_cabang" placeholder="Nama Kantor Cabang" />
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
        <div class="modal fade" id="modal-tambah-departemen">
            <div class="modal-dialog">
                <div style="background-color: #000;color: #fff" class="modal-content">
                    <div class="modal-header">
                        <h4 style="color: #fff" class="modal-title">Tambah Departemen</h4>
                        <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> 
                        </a>
                    </div>
                    <form  role="form" enctype="multipart/form-data" id="form_tambah_departemen" class="margin-bottom-0">
                        <div style="background-color: #fff"class="modal-body">
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Nama Departemen</label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" name="nama_departemen" placeholder="Nama Departemen" />
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
        <div class="modal fade" id="modal-tambah-jabatan">
            <div class="modal-dialog">
                <div style="background-color: #000;color: #fff" class="modal-content">
                    <div class="modal-header">
                        <h4 style="color: #fff" class="modal-title">Tambah jabatan</h4>
                        <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> 
                        </a>
                    </div>
                    <form  role="form" enctype="multipart/form-data" id="form_tambah_jabatan" class="margin-bottom-0">
                        <div style="background-color: #fff"class="modal-body">
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Nama Jabatan</label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" name="nama_jabatan" placeholder="Nama Jabatan" />
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
        <div class="modal fade" id="modal-tambah-karyawan">
            <div class="modal-dialog">
                <div style="background-color: #000;color: #fff" class="modal-content">
                    <div class="modal-header">
                        <h4 style="color: #fff" class="modal-title">Tambah karyawan</h4>
                        <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> 
                        </a>
                    </div>
                    <form  role="form" enctype="multipart/form-data" id="form_tambah_karyawan" class="margin-bottom-0">
                        <div style="background-color: #fff"class="modal-body">
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Nama karyawan</label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" name="nama_karyawan" placeholder="Nama karyawan" />
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">NIK Karyawan</label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" name="nik" placeholder="nik" />
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Jenis Kelamin</label>
                                <div class="input-group m-b-10">
                                    <div class="radio radio-inline">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="laki-laki" /> Laki-laki
                                        </label>
                                    </div>
                                    &emsp;
                                    <div class="radio radio-inline">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="perempuan" /> Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Kantor Cabang</label>
                                <div class="input-group m-b-10">
                                    <select id="txt_cabang" name="cabang" class="form-control">
                                        <option value="" >- Pilih salah satu -</option>
                                        <?php
                                        foreach ($data_cabang->result() as $row) {
                                            ?>
                                            <option value="<?php echo $row->id_cabang; ?>" ><?php echo $row->nama_cabang; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Departemen</label>
                                <div class="input-group m-b-10">
                                    <select id="txt_departemen" name="departemen" class="form-control">
                                        <option value="" >- Pilih salah satu -</option>
                                        <?php
                                        foreach ($data_departemen->result() as $row) {
                                            ?>
                                            <option value="<?php echo $row->id_departemen; ?>" ><?php echo $row->nama_departemen; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Jabatan</label>
                                <div class="input-group m-b-10">
                                    <select id="txt_jabatan" name="jabatan" class="form-control">
                                        <option value="" >- Pilih salah satu -</option>
                                        <?php
                                        foreach ($data_jabatan->result() as $row) {
                                            ?>
                                            <option value="<?php echo $row->id_jabatan; ?>" ><?php echo $row->nama_jabatan; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Status Perkawinan</label>
                                <div class="input-group m-b-10">
                                    <div class="radio radio-inline">
                                        <label>
                                            <input type="radio" name="status_perkawinan" value="menikah" /> Menikah
                                        </label>
                                    </div>
                                    &emsp;
                                    <div class="radio radio-inline">
                                        <label>
                                            <input type="radio" name="status_perkawinan" value="lajang" /> Lajang
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Foto</label>
                                <div class="input-group m-b-10">
                                    <input type="file" class="form-control" name="foto" placeholder="foto" />
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
        <div class="modal fade" id="modal-edit-cabang">
            <div class="modal-dialog">
                <div style="background-color: #000;color: #fff" class="modal-content">
                    <div class="modal-header">
                        <h4 style="color: #fff" class="modal-title">Edit Kantor Cabang</h4>
                        <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> 
                        </a>
                    </div>
                    <form enctype="multipart/form-data" id="form_update_cabang" class="margin-bottom-0">
                        <div style="background-color: #fff"class="modal-body">
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Nama Kantor Cabang</label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" name="nama_cabang" id="id_nama_cabang" placeholder="Nama Kantor Cabang" />
                                    <input type="hidden" name="id_cabang" id="id_cabang"/>
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
        <div class="modal fade" id="modal-edit-departemen">
            <div class="modal-dialog">
                <div style="background-color: #000;color: #fff" class="modal-content">
                    <div class="modal-header">
                        <h4 style="color: #fff" class="modal-title">Edit Departemen</h4>
                        <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> 
                        </a>
                    </div>
                    <form enctype="multipart/form-data" id="form_update_departemen" class="margin-bottom-0">
                        <div style="background-color: #fff"class="modal-body">
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Nama Departemen</label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" name="nama_departemen" id="id_nama_departemen" placeholder="Nama Departemen" />
                                    <input type="hidden" name="id_departemen" id="id_departemen"/>
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
        <div class="modal fade" id="modal-edit-jabatan">
            <div class="modal-dialog">
                <div style="background-color: #000;color: #fff" class="modal-content">
                    <div class="modal-header">
                        <h4 style="color: #fff" class="modal-title">Edit jabatan</h4>
                        <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> 
                        </a>
                    </div>
                    <form enctype="multipart/form-data" id="form_update_jabatan" class="margin-bottom-0">
                        <div style="background-color: #fff"class="modal-body">
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Nama jabatan</label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" name="nama_jabatan" id="id_nama_jabatan" placeholder="Nama jabatan" />
                                    <input type="hidden" name="id_jabatan" id="id_jabatan"/>
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
        <div class="modal fade" id="modal-edit-karyawan">
            <div class="modal-dialog">
                <div style="background-color: #000;color: #fff" class="modal-content">
                    <div class="modal-header">
                        <h4 style="color: #fff" class="modal-title">Update karyawan</h4>
                        <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> 
                        </a>
                    </div>
                    <form  role="form" enctype="multipart/form-data" id="form_update_karyawan" class="margin-bottom-0">
                        <div style="background-color: #fff"class="modal-body">
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Nama karyawan</label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" name="nama_karyawan" id="id_nama_karyawan" placeholder="Nama karyawan" />
                                    <input type="hidden" name="id_karyawan" id="id_karyawan"/> <input type="hidden" name="foto" id="id_foto"/> 
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">NIK Karyawan</label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" name="nik" id="id_nik" placeholder="nik" />
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Jenis Kelamin</label>
                                <div class="input-group m-b-10">
                                    <div class="radio radio-inline">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" id="id_jk_laki" value="laki-laki" /> Laki-laki
                                        </label>
                                    </div>
                                    &emsp;
                                    <div class="radio radio-inline">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" id="id_jk_perempuan" value="perempuan" /> Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Kantor Cabang</label>
                                <div class="input-group m-b-10">
                                    <select id="id_cabang" name="cabang" class="form-control">
                                        <option value="" >- Pilih salah satu -</option>
                                        <?php
                                        foreach ($data_cabang->result() as $row) {
                                            ?>
                                            <option value="<?php echo $row->id_cabang; ?>" ><?php echo $row->nama_cabang; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Departemen</label>
                                <div class="input-group m-b-10">
                                    <select id="id_departemen" name="departemen" class="form-control">
                                        <option value="" >- Pilih salah satu -</option>
                                        <?php
                                        foreach ($data_departemen->result() as $row) {
                                            ?>
                                            <option value="<?php echo $row->id_departemen; ?>" ><?php echo $row->nama_departemen; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Jabatan</label>
                                <div class="input-group m-b-10">
                                    <select id="id_jabatan" name="jabatan" class="form-control">
                                        <option value="" >- Pilih salah satu -</option>
                                        <?php
                                        foreach ($data_jabatan->result() as $row) {
                                            ?>
                                            <option value="<?php echo $row->id_jabatan; ?>" ><?php echo $row->nama_jabatan; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Status Perkawinan</label>
                                <div class="input-group m-b-10">
                                    <div class="radio radio-inline">
                                        <label>
                                            <input type="radio" name="status_perkawinan" id="id_sp_menikah" value="menikah" /> Menikah
                                        </label>
                                    </div>
                                    &emsp;
                                    <div class="radio radio-inline">
                                        <label>
                                            <input type="radio" name="status_perkawinan" id="id_sp_lajang" value="lajang" /> Lajang
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-b-15">
                                <label class="col-form-label">Foto</label>
                                <div class="input-group m-b-10">
                                    <input type="file" class="form-control" name="foto" placeholder="foto" />
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

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <?php $this->load->view("user/footer"); ?>
    <script>
        //Form Validation
        $(document).ready(function () {
            get_data_cabang();
            get_data_departemen();
            get_data_jabatan();
            get_data_karyawan();

            $('#form_tambah_cabang').bootstrapValidator({
                fields: {
                    nama_cabang: {
                        validators: {
                            notEmpty: {
                                message: 'Nama kantor cabang tidak boleh kosong'
                            },
                            remote: {
                                type: 'POST',
                                message: 'Nama kantor cabang sudah tersedia',
                                url: '<?php echo site_url('user/cek_cabang'); ?>',
                                data: {
                                    type: 'username'
                                }
                            }
                        }
                    },
                }
            });

            $('#form_tambah_departemen').bootstrapValidator({
                fields: {
                    nama_departemen: {
                        validators: {
                            notEmpty: {
                                message: 'Nama departemen tidak boleh kosong'
                            },
                            remote: {
                                type: 'POST',
                                message: 'Nama departemen sudah tersedia',
                                url: '<?php echo site_url('user/cek_departemen'); ?>',
                                data: {
                                    type: 'username'
                                }
                            }
                        }
                    },
                }
            });

            $('#form_tambah_jabatan').bootstrapValidator({
                fields: {
                    nama_jabatan: {
                        validators: {
                            notEmpty: {
                                message: 'Nama jabatan tidak boleh kosong'
                            },
                            remote: {
                                type: 'POST',
                                message: 'Nama jabatan sudah tersedia',
                                url: '<?php echo site_url('user/cek_jabatan'); ?>',
                                data: {
                                    type: 'username'
                                }
                            }
                        }
                    },
                }
            });

            $('#form_tambah_karyawan').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                fields: {
                    nama_karyawan: {
                        validators: {
                            notEmpty: {
                                message: 'Nama karyawan tidak boleh kosong'
                            },
                            regexp: {
                                regexp: /^[a-z\s]+$/i,
                                message: 'Nama karyawan harus berupa huruf'
                            }
                        }
                    },
                    nik: {
                        validators: {
                            notEmpty: {
                                message: 'NIK tidak boleh kosong'
                            },
                            remote: {
                                type: 'POST',
                                message: 'NIK sudah digunakan',
                                url: '<?php echo site_url('user/cek_nik'); ?>',
                                data: {
                                    type: 'username'
                                }
                            }
                        }
                    },
                    jenis_kelamin: {
                        validators: {
                            notEmpty: {
                                message: 'Jenis kelamin tidak boleh kosong'
                            }
                        }
                    },
                    cabang: {
                        validators: {
                            notEmpty: {
                                message: 'Kantor cabang tidak boleh kosong'
                            }
                        }
                    },
                    departemen: {
                        validators: {
                            notEmpty: {
                                message: 'Departemen tidak boleh kosong'
                            }
                        }
                    },
                    jabatan: {
                        validators: {
                            notEmpty: {
                                message: 'Jabatan tidak boleh kosong'
                            }
                        }
                    },
                    status_perkawinan: {
                        validators: {
                            notEmpty: {
                                message: 'Status perkawinan tidak boleh kosong'
                            }
                        }
                    },
                    foto: {
                        validators: {
                            notEmpty: {
                                message: 'File foto tidak boleh kosong'
                            },
                            file: {
                                extension: 'jpeg,jpg,png',
                                type: 'image/jpeg,image/png',
                                message: 'Ekstensi file yang diperbolehkan adalah .jpeg .jpg .png'
                            }
                        }
                    }
                }
            });
        });

        //Form Validation
        $(document).ready(function () {

            $('#form_update_cabang').bootstrapValidator({
                excluded: ':disabled',
                fields: {
                    nama_cabang: {
                        validators: {
                            notEmpty: {
                                message: 'Nama cabang tidak boleh kosong'
                            },
                            remote: {
                                type: 'POST',
                                message: 'Nama kantor cabang sudah tersedia',
                                url: '<?php echo site_url('user/cek_cabang'); ?>',
                                data: {
                                    type: 'username'
                                }
                            }
                        }
                    },
                }
            });

            $('#form_update_departemen').bootstrapValidator({
                excluded: ':disabled',
                fields: {
                    nama_departemen: {
                        validators: {
                            notEmpty: {
                                message: 'Nama departemen tidak boleh kosong'
                            },
                            remote: {
                                type: 'POST',
                                message: 'Nama departemen sudah tersedia',
                                url: '<?php echo site_url('user/cek_departemen'); ?>',
                                data: {
                                    type: 'username'
                                }
                            }
                        }
                    },
                }
            });

            $('#form_update_jabatan').bootstrapValidator({
                excluded: ':disabled',
                fields: {
                    nama_jabatan: {

                        validators: {
                            notEmpty: {
                                message: 'Nama jabatan tidak boleh kosong'
                            },
                            remote: {
                                type: 'POST',
                                message: 'Nama jabatan sudah tersedia',
                                url: '<?php echo site_url('user/cek_jabatan'); ?>',
                                data: {
                                    type: 'username'
                                }
                            }
                        }
                    },
                }
            });

            $('#form_update_karyawan').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                fields: {
                    nama_karyawan: {
                        validators: {
                            notEmpty: {
                                message: 'Nama karyawan tidak boleh kosong'
                            },
                            regexp: {
                                regexp: /^[a-z\s]+$/i,
                                message: 'Nama karyawan harus berupa huruf'
                            }
                        }
                    },
                    nik: {
                        validators: {
                            notEmpty: {
                                message: 'Username tidak boleh kosong'
                            }
                        }
                    },
                    jenis_kelamin: {
                        validators: {
                            notEmpty: {
                                message: 'Jenis kelamin tidak boleh kosong'
                            }
                        }
                    },
                    cabang: {
                        validators: {
                            notEmpty: {
                                message: 'Kantor cabang tidak boleh kosong'
                            }
                        }
                    },
                    departemen: {
                        validators: {
                            notEmpty: {
                                message: 'Departemen tidak boleh kosong'
                            }
                        }
                    },
                    jabatan: {
                        validators: {
                            notEmpty: {
                                message: 'Jabatan tidak boleh kosong'
                            }
                        }
                    },
                    status_perkawinan: {
                        validators: {
                            notEmpty: {
                                message: 'Status perkawinan tidak boleh kosong'
                            }
                        }
                    },
                    foto: {
                        validators: {
                            file: {
                                extension: 'jpeg,jpg,png',
                                type: 'image/jpeg,image/png',
                                message: 'Ekstensi file yang diperbolehkan adalah .jpeg .jpg .png'
                            }
                        }
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            // Untuk sunting

            $('#modal-edit-cabang').on('show.bs.modal', function (event) {
                var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal = $(this)
                // Isi nilai pada field
                modal.find('#id_cabang').attr("value", div.data('id_cabang'));
                modal.find('#id_nama_cabang').attr("value", div.data('nama_cabang'));
            });

            $('#modal-edit-cabang').on('hidden.bs.modal', function () {
                $('#form_update_cabang').data('bootstrapValidator').resetForm();
                $('#form_update_cabang').trigger("reset");
            })

            $('#modal-edit-departemen').on('show.bs.modal', function (event) {
                var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal = $(this)
                // Isi nilai pada field
                modal.find('#id_departemen').attr("value", div.data('id_departemen'));
                modal.find('#id_nama_departemen').attr("value", div.data('nama_departemen'));
            });

            $('#modal-edit-departemen').on('hidden.bs.modal', function () {
                $('#form_update_departemen').data('bootstrapValidator').resetForm();
                $('#form_update_departemen').trigger("reset");
            })

            $('#modal-edit-jabatan').on('show.bs.modal', function (event) {
                var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal = $(this)
                // Isi nilai pada field
                modal.find('#id_jabatan').attr("value", div.data('id_jabatan'));
                modal.find('#id_nama_jabatan').attr("value", div.data('nama_jabatan'));
            });

            $('#modal-edit-jabatan').on('hidden.bs.modal', function () {
                $('#form_update_jabatan').data('bootstrapValidator').resetForm();
                $('#form_update_jabatan').trigger("reset");
            })

            $('#modal-edit-karyawan').on('show.bs.modal', function (event) {
                var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal = $(this)

                // Isi nilai pada field
                modal.find('#id_karyawan').attr("value", div.data('id_karyawan'));
                modal.find('#id_foto').attr("value", div.data('id_foto'));
                modal.find('#id_nama_karyawan').attr("value", div.data('id_nama_karyawan'));
                modal.find('#id_nik').attr("value", div.data('id_nik_karyawan'));
                if (div.data('id_jenis_kelamin') == "laki-laki") {
                    modal.find('#id_jk_laki').attr('checked', 'checked');
                } else {
                    modal.find('#id_jk_perempuan').attr('checked', 'checked');
                }
                modal.find('#id_cabang option[value=' + div.data('id_cabang') + ']').attr('selected', 'selected');
                modal.find('#id_departemen option[value=' + div.data('id_departemen') + ']').attr('selected', 'selected');
                modal.find('#id_jabatan option[value=' + div.data('id_jabatan') + ']').attr('selected', 'selected');
                if (div.data('id_status_perkawinan') == "menikah") {
                    modal.find('#id_sp_menikah').attr('checked', 'checked');
                } else {
                    modal.find('#id_sp_lajang').attr('checked', 'checked');
                }
            });

            $("#form_tambah_cabang").on('success.form.bv', function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/tambah_cabang'); ?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        if (result != 0) {
                            $('#modal-tambah-cabang').modal('hide');
                            $('#form_tambah_cabang').data('bootstrapValidator').resetForm();
                            $('#form_tambah_cabang').trigger("reset");
                            swal({
                                title: "Sukses",
                                text: "Berhasil tambah cabang",
                                icon: "success"
                            }).then(function () {
                                get_data_cabang();
                                location.reload();
                            });
                        } else {
                            swal({
                                title: "Gagal",
                                text: "Gagal tambah cabang",
                                icon: "error"
                            })
                        }
                    }
                })
            });

            $("#form_tambah_departemen").on('success.form.bv', function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/tambah_departemen'); ?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        if (result != 0) {
                            $('#modal-tambah-departemen').modal('hide');
                            $('#form_tambah_departemen').data('bootstrapValidator').resetForm();
                            $('#form_tambah_departemen').trigger("reset");
                            swal({
                                title: "Sukses",
                                text: "Berhasil tambah departemen",
                                icon: "success"
                            }).then(function () {
                                get_data_departemen();
                                location.reload();
                            });
                        } else {
                            swal({
                                title: "Gagal",
                                text: "Gagal tambah departemen",
                                icon: "error"
                            })
                        }
                    }
                })
            });

            $("#form_tambah_jabatan").on('success.form.bv', function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/tambah_jabatan'); ?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        if (result != 0) {
                            $('#modal-tambah-jabatan').modal('hide');
                            $('#form_tambah_jabatan').data('bootstrapValidator').resetForm();
                            $('#form_tambah_jabatan').trigger("reset");
                            swal({
                                title: "Sukses",
                                text: "Berhasil tambah jabatan",
                                icon: "success"
                            }).then(function () {
                                get_data_jabatan();
                                location.reload();
                            });
                        } else {
                            swal({
                                title: "Gagal",
                                text: "Gagal tambah jabatan",
                                icon: "error"
                            })
                        }
                    }
                })
            });

            $("#form_tambah_karyawan").on('success.form.bv', function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/tambah_karyawan'); ?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        if (result != 0) {
                            $('#modal-tambah-karyawan').modal('hide');
                            $('#form_tambah_karyawan').data('bootstrapValidator').resetForm();
                            $('#form_tambah_karyawan').trigger("reset");
                            swal({
                                title: "Sukses",
                                text: "Berhasil tambah karyawan",
                                icon: "success"
                            }).then(function () {
                                location.reload();
                                get_data_karyawan();
                            });
                        } else {
                            swal({
                                title: "Gagal",
                                text: "Gagal tambah karyawan",
                                icon: "error"
                            })
                        }
                    }
                })
            });

            $("#form_update_cabang").on('success.form.bv', function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/update_cabang'); ?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        if (result != 0) {
                            $('#modal-edit-cabang').modal('hide');
                            $('#form_update_cabang').data('bootstrapValidator').resetForm();
                            $('#form_update_cabang').trigger("reset");
                            swal({
                                title: "Sukses",
                                text: "Berhasil update cabang",
                                icon: "success"
                            }).then(function () {
                                get_data_cabang();
                                location.reload();
                            });
                        } else {
                            swal({
                                title: "Gagal",
                                text: "Gagal update cabang",
                                icon: "error"
                            })
                        }
                    }
                })
            });

            $("#form_update_departemen").on('success.form.bv', function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/update_departemen'); ?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        if (result != 0) {
                            $('#modal-edit-departemen').modal('hide');
                            $('#form_update_departemen').data('bootstrapValidator').resetForm();
                            $('#form_update_departemen').trigger("reset");
                            swal({
                                title: "Sukses",
                                text: "Berhasil update departemen",
                                icon: "success"
                            }).then(function () {
                                get_data_departemen();
                                location.reload();
                            });
                        } else {
                            swal({
                                title: "Gagal",
                                text: "Gagal update departemen",
                                icon: "error"
                            })
                        }
                    }
                })
            });

            $("#form_update_jabatan").on('success.form.bv', function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/update_jabatan'); ?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        if (result != 0) {
                            $('#modal-edit-jabatan').modal('hide');
                            $('#form_update_jabatan').data('bootstrapValidator').resetForm();
                            $('#form_update_jabatan').trigger("reset");
                            swal({
                                title: "Sukses",
                                text: "Berhasil update jabatan",
                                icon: "success"
                            }).then(function () {
                                get_data_jabatan();
                                location.reload();
                            });
                        } else {
                            swal({
                                title: "Gagal",
                                text: "Gagal update jabatan",
                                icon: "error"
                            })
                        }
                    }
                })
            });

            $("#form_update_karyawan").on('success.form.bv', function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('user/update_karyawan'); ?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        if (result != 0) {
                            $('#modal-edit-karyawan').modal('hide');
                            $('#form_update_karyawan').data('bootstrapValidator').resetForm();
                            $('#form_update_karyawan').trigger("reset");
                            swal({
                                title: "Sukses",
                                text: "Berhasil update karyawan",
                                icon: "success"
                            }).then(function () {
                                location.reload();
                                get_data_karyawan();
                            });
                        } else {
                            swal({
                                title: "Gagal",
                                text: "Gagal update karyawan",
                                icon: "error"
                            })
                        }
                    }
                })
            });
        });
    </script>

    <script>
        function get_data_cabang() {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('user/get_cabang'); ?>",
                beforeSend: function () {
                    $('#data-cabang').html('<div class="d-flex justify-content-center"><div class="fa-3x"><i class="fas fa-spinner fa-pulse"></i></div></div>');
                },
                success: function (result) {
                    $('#data-cabang').html(result);
                    $('#data-table-default4').DataTable({
                        responsive: true
                    });
                }
            });
        }
        function get_data_cabang() {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('user/get_cabang'); ?>",
                beforeSend: function () {
                    $('#data-cabang').html('<div class="d-flex justify-content-center"><div class="fa-3x"><i class="fas fa-spinner fa-pulse"></i></div></div>');
                },
                success: function (result) {
                    $('#data-cabang').html(result);
                    $('#data-table-default4').DataTable({
                        responsive: true
                    });
                }
            });
        }

        function get_data_departemen() {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('user/get_departemen'); ?>",
                beforeSend: function () {
                    $('#data-departemen').html('<div class="d-flex justify-content-center"><div class="fa-3x"><i class="fas fa-spinner fa-pulse"></i></div></div>');
                },
                success: function (result) {
                    $('#data-departemen').html(result);
                    $('#data-table-default').DataTable({
                        responsive: true
                    });
                }
            });
        }

        function get_data_jabatan() {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('user/get_jabatan'); ?>",
                beforeSend: function () {
                    $('#data-jabatan').html('<div class="d-flex justify-content-center"><div class="fa-3x"><i class="fas fa-spinner fa-pulse"></i></div></div>');
                },
                success: function (result) {
                    $('#data-jabatan').html(result);
                    $('#data-table-default2').DataTable({
                        responsive: true
                    });
                }
            });
        }

        function get_data_karyawan() {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('user/get_karyawan'); ?>",
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

        function hapus_cabang(id) {
            swal({
                title: "Peringatan Hapus",
                text: "Apakah anda yakin menghapus data cabang ini?",
                icon: "warning",
                buttons: {
                    cancel: "Batal",
                    confirm: "Hapus"
                }
                //dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var data_hapus = {
                        'id_hapus_cabang': id,
                    };
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('user/hapus_cabang'); ?>",
                        data: data_hapus,
                        success: function (result) {
                            if (result != 0) {
                                // On success redirect.  
                                swal({
                                    title: "Sukses",
                                    text: "Berhasil hapus cabang",
                                    icon: "success"
                                }).then(function () {
                                    get_data_cabang();
                                    location.reload();
                                });

                            } else
                                swal({
                                    title: "Gagal!",
                                    text: "Gagal hapus cabang",
                                    icon: "error",
                                })
                        }
                    })
                } else {
                    //                            swal("Your imaginary file is safe!");
                }
            });
        }

        function hapus_departemen(id) {
            swal({
                title: "Peringatan Hapus",
                text: "Apakah anda yakin menghapus data departemen ini?",
                icon: "warning",
                buttons: {
                    cancel: "Batal",
                    confirm: "Hapus"
                }
                //dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var data_hapus = {
                        'id_hapus_departemen': id,
                    };
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('user/hapus_departemen'); ?>",
                        data: data_hapus,
                        success: function (result) {
                            if (result != 0) {
                                // On success redirect.  
                                swal({
                                    title: "Sukses",
                                    text: "Berhasil hapus departemen",
                                    icon: "success"
                                }).then(function () {
                                    get_data_departemen();
                                    location.reload();
                                });

                            } else
                                swal({
                                    title: "Gagal!",
                                    text: "Gagal hapus departemen",
                                    icon: "error",
                                })
                        }
                    })
                } else {
                    //                            swal("Your imaginary file is safe!");
                }
            });
        }

        function hapus_jabatan(id) {
            swal({
                title: "Peringatan Hapus",
                text: "Apakah anda yakin menghapus data jabatan ini?",
                icon: "warning",
                buttons: {
                    cancel: "Batal",
                    confirm: "Hapus"
                }
                //dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var data_hapus = {
                        'id_hapus_jabatan': id,
                    };
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('user/hapus_jabatan'); ?>",
                        data: data_hapus,
                        success: function (result) {
                            if (result != 0) {
                                // On success redirect.  
                                swal({
                                    title: "Sukses",
                                    text: "Berhasil hapus jabatan",
                                    icon: "success"
                                }).then(function () {
                                    get_data_jabatan();
                                    location.reload();
                                });

                            } else
                                swal({
                                    title: "Gagal!",
                                    text: "Gagal hapus jabatan",
                                    icon: "error",
                                })
                        }
                    })
                } else {
                    //                            swal("Your imaginary file is safe!");
                }
            });
        }

        function hapus_karyawan(id) {
            swal({
                title: "Peringatan Hapus",
                text: "Apakah anda yakin menghapus data karyawan ini?",
                icon: "warning",
                buttons: {
                    cancel: "Batal",
                    confirm: "Hapus"
                }
                //dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var data_hapus = {
                        'id_hapus_karyawan': id,
                    };
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('user/hapus_karyawan'); ?>",
                        data: data_hapus,
                        success: function (result) {
                            if (result != 0) {
                                // On success redirect.  
                                swal({
                                    title: "Sukses",
                                    text: "Berhasil hapus karyawan",
                                    icon: "success"
                                }).then(function () {
                                    get_data_karyawan();
                                });

                            } else
                                swal({
                                    title: "Gagal!",
                                    text: "Gagal hapus karyawan",
                                    icon: "error",
                                })
                        }
                    })
                } else {
                    //                            swal("Your imaginary file is safe!");
                }
            });
        }

        function detail_karyawan(par) {
            var data = {
                'id_karyawan': par,
            };
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('user/get_detail_karyawan'); ?>",
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
