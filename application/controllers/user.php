<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('database');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->view('user/beranda');
    }

    public function beranda() {
        $data = array();
        $data['laki'] = $this->database->statistik_jenkel('laki-laki');
        $data['perempuan'] = $this->database->statistik_jenkel('perempuan');
        $data['lajang'] = $this->database->statistik_nikah('lajang');
        $data['menikah'] = $this->database->statistik_nikah('menikah');
        $this->load->view('user/beranda', $data);
    }

    public function karyawan() {
        $data['data_departemen'] = $this->database->get_departemen();
        $data['data_jabatan'] = $this->database->get_jabatan();
        $data['data_cabang'] = $this->database->get_cabang();
        $this->load->view('user/karyawan', $data);
    }

    public function kriteria() {
        $this->load->view('user/kriteria');
    }

    public function periode_alternatif() {
        $this->load->view('user/periode');
    }

    public function nilai_alternatif() {
        $this->load->view('user/nilai_alternatif');
    }

    public function hasil_pemilihan() {
        $this->load->view('user/hasil');
    }

    public function get_cabang() {
        $data_cabang = $this->database->get_cabang();
        $html = '           <table id="data-table-default4" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th class="text-nowrap">Nama Kantor Cabang</th>
                                    <th data-orderable="false" class="text-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>';
        $no = 0;
        foreach ($data_cabang->result() as $row) {
            $no++;
            $html .= '                       <tr class="">
                                            <td width="1%" class="f-s-600 text-inverse">' . $no . '</td>
                                            <td>' . $row->nama_cabang . '</td>';
            $html .= '                       <td><a href="javascript:;" class="btn btn-success btn-icon btn-circle btn-sm" 
                                                   data-id_cabang="' . $row->id_cabang . '"
                                                   data-nama_cabang="' . $row->nama_cabang . '"
                                                   data-toggle="modal" data-target="#modal-edit-cabang">
                                                    <i class="fa fa-wrench"></i> 
                                                </a>
                                                <a href="javascript:;" class="btn btn-danger btn-icon btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="hapus_cabang(' . "'$row->id_cabang'" . ')">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>';
        }
        $html .= '                        </tbody></table>';
        echo $html;
        die;
    }

    public function get_departemen() {
        $data_departemen = $this->database->get_departemen();
        $html = '           <table id="data-table-default" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th class="text-nowrap">Nama Departemen</th>
                                    <th data-orderable="false" class="text-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>';
        $no = 0;
        foreach ($data_departemen->result() as $row) {
            $no++;
            $html .= '                       <tr class="">
                                            <td width="1%" class="f-s-600 text-inverse">' . $no . '</td>
                                            <td>' . $row->nama_departemen . '</td>';
            $html .= '                       <td><a href="javascript:;" class="btn btn-success btn-icon btn-circle btn-sm" 
                                                   data-id_departemen="' . $row->id_departemen . '"
                                                   data-nama_departemen="' . $row->nama_departemen . '"
                                                   data-toggle="modal" data-target="#modal-edit-departemen">
                                                    <i class="fa fa-wrench"></i> 
                                                </a>
                                                <a href="javascript:;" class="btn btn-danger btn-icon btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="hapus_departemen(' . "'$row->id_departemen'" . ')">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>';
        }
        $html .= '                        </tbody></table>';
        echo $html;
        die;
    }

    public function get_jabatan() {
        $data_jabatan = $this->database->get_jabatan();
        $html = '           <table id="data-table-default2" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th class="text-nowrap">Nama Jabatan</th>
                                    <th data-orderable="false" class="text-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>';
        $no = 0;
        foreach ($data_jabatan->result() as $row) {
            $no++;
            $html .= '                       <tr class="">
                                            <td width="1%" class="f-s-600 text-inverse">' . $no . '</td>
                                            <td>' . $row->nama_jabatan . '</td>';
            $html .= '                       <td><a href="javascript:;" class="btn btn-success btn-icon btn-circle btn-sm" 
                                                   data-id_jabatan="' . $row->id_jabatan . '"
                                                   data-nama_jabatan="' . $row->nama_jabatan . '"
                                                   data-toggle="modal" data-target="#modal-edit-jabatan">
                                                    <i class="fa fa-wrench"></i> 
                                                </a>
                                                <a href="javascript:;" class="btn btn-danger btn-icon btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="hapus_jabatan(' . "'$row->id_jabatan'" . ')">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>';
        }
        $html .= '                        </tbody></table>';
        echo $html;
        die;
    }

    public function get_karyawan() {
        $data_karyawan = $this->database->get_karyawan();
        $html = '           <table id="data-table-default3" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th class="text-nowrap">Nama Karyawan</th>
                                    <th data-orderable="false" class="text-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>';
        $no = 0;
        foreach ($data_karyawan->result() as $row) {
            $no++;
            $html .= '                       <tr class="">
                                            <td width="1%" class="f-s-600 text-inverse">' . $no . '</td>
                                            <td>' . $row->nama_karyawan . '</td>'
                                            ;

            $html .= '                       <td>
                                                <a href="javascript:;" class="btn btn-primary btn-icon btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="detail_karyawan(' . "'$row->id_karyawan'" . ')">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                                <a href="javascript:;" class="btn btn-success btn-icon btn-circle btn-sm" 
                                                   data-id_karyawan="' . $row->id_karyawan . '"
                                                   data-id_nama_karyawan="' . $row->nama_karyawan . '"
                                                   data-id_nik_karyawan="' . $row->nik_karyawan . '"
                                                   data-id_jenis_kelamin="' . $row->jenis_kelamin . '"
                                                   data-id_cabang="' . $row->cabang . '"
                                                   data-id_departemen="' . $row->departemen . '"
                                                   data-id_jabatan="' . $row->jabatan . '"
                                                   data-id_status_perkawinan="' . $row->status_perkawinan . '"
                                                   data-id_foto="' . $row->foto . '"
                                                   data-toggle="modal" data-target="#modal-edit-karyawan">
                                                    <i class="fa fa-wrench"></i> 
                                                </a>
                                                <a href="javascript:;" class="btn btn-danger btn-icon btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="hapus_karyawan(' . "'$row->id_karyawan'" . ')">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>';
        }
        $html .= '                        </tbody></table>';
        echo $html;
        die;
    }

    public function get_detail_karyawan() {
        $detail_karyawan = $this->database->get_detail_karyawan($this->input->post('id_karyawan'));
        $html = '<div class="row">
                <div class="col-lg-4"><img src="' . base_url() . 'assets/img/karyawan/' . $detail_karyawan->row()->foto . '" class="rounded" alt="Cinque Terre" width="250" height="230"></div>
                <div class="col-lg-8">
                <table class="table table-striped">
                <col width="30%">
                <col width="10%">
                <col width="60%">
                <tbody>
                <tr>
                <td><strong>Nama </strong></td>
                <td>:</td>
                <td>' . $detail_karyawan->row()->nama_karyawan . '</td>
                </tr>
                <tr>
                <td><strong>NIK </strong></td>
                 <td>:</td>
                <td>' . $detail_karyawan->row()->nik_karyawan . '</td>
                </tr>
                <tr>
                <td><strong>Jenis Kelamin </strong></td>
                 <td>:</td>
                <td>' . $detail_karyawan->row()->jenis_kelamin . '</td>
                </tr>
                <tr>
                <td><strong>Kantor Cabang </strong></td>
                 <td>:</td>
                <td>' . $detail_karyawan->row()->n_cabang . '</td>
                </tr>
                <tr>
                <td><strong>Departemen </strong></td>
                 <td>:</td>
                <td>' . $detail_karyawan->row()->n_departemen . '</td>
                </tr>
                <tr>
                <td><strong>Jabatan </strong></td>
                 <td>:</td>
                <td>' . $detail_karyawan->row()->n_jabatan . '</td>
                </tr>
                <tr>
                <td><strong>Status Perkawinan </strong></td>
                 <td>:</td>
                <td>' . $detail_karyawan->row()->status_perkawinan . '</td>
                </tr>
                </tbody>
                </table>
                </div>
                </div>';
        echo $html;
    }

    public function get_kriteria() {
        $data_kriteria = $this->database->get_kriteria();
        $html = '           <table id="data-table-default" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th class="text-nowrap">Nama kriteria</th>
                                    <th class="text-nowrap">Tipe kriteria</th>
                                    <th class="text-nowrap">Bobot kriteria</th>
                                    <th data-orderable="false" class="text-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>';
        $no = 0;
        foreach ($data_kriteria->result() as $row) {
            $no++;
            $html .= '                       <tr class="">
                                            <td width="1%" class="f-s-600 text-inverse">' . $no . '</td>
                                            <td>' . $row->nama_kriteria . '</td>
                                            <td>' . $row->tipe_kriteria . '</td>
                                            <td>' . $row->bobot . '</td>';
            $html .= '                       <td><a href="javascript:;" class="btn btn-success btn-icon btn-circle btn-sm" 
                                                   data-id_kriteria="' . $row->id_kriteria . '"
                                                   data-nama_kriteria="' . $row->nama_kriteria . '"
                                                   data-tipe_kriteria="' . $row->tipe_kriteria . '"
                                                   data-toggle="modal" data-target="#modal-edit-kriteria">
                                                    <i class="fa fa-wrench"></i> 
                                                </a>
                                                <a href="javascript:;" class="btn btn-danger btn-icon btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="hapus_kriteria(' . "'$row->id_kriteria'" . ')">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <a href="#" class="btn btn-primary btn-xs" onclick="get_data_normalisasi(' . "'$row->id_kriteria','$row->nama_kriteria'" . ')">Normalisasi</a>
                                            </td>
                                        </tr>';
        }
        $html .= '                        </tbody></table>';
        echo $html;
        die;
    }

    public function get_bobot() {

        $data_kriteria = $this->database->get_kriteria();

        if ($data_kriteria == NULL) {
            echo 0;
        } else {
            $html = '  <div class="modal-header">
                            <h4 class="modal-title">Kelola Bobot Kriteria</h4>
                            <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                                <i class="fa fa-times"></i> 
                            </a>
                        </div>
                        <form  role="form" enctype="multipart/form-data" id="form_kelola_bobot" class="margin-bottom-0">
                            <div style="background-color: #fff"class="modal-body">
                            <div style="display: none" id="peringatan_bobot" class="alert alert-danger"><center>Total bobot harus sejumlah 100!</center></div>';
            $bobot = 0;
            foreach ($data_kriteria->result() as $row) {
                $bobot = $bobot + $row->bobot;
                $html .= '          <div class="form-group m-b-15">
                                    <label class="col-form-label">Kriteria : <strong>' . $row->nama_kriteria . '</strong></label>
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" name="bobot_kriteria[]" id="id_bobot_kriteria" placeholder="Bobot kriteria" value="' . $row->bobot . '" onkeyup="cek_jumlah_bobot()" />
                                        <input type="hidden" name="id_bobot_kriteria[]" value="' . $row->id_kriteria . '"/>
                                    </div>
                                </div>';
            }
            $html .= '      <hr>
                                <div class="progress" style="height: 25px;">
                                    <div id="progress_bobot" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="' . $bobot . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $bobot . '%">' . $bobot . '%</div>
                                </div>
                            </div>';
            $html .= '      <div style="background-color: #fff" class="modal-footer">
                                <button href="javascript:;" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                <button type="submit" id="bt_simpan_bobot" class="btn btn-success">Simpan</button>
                            </div>
                        </form>';
            echo $html;
            die;
        }
    }

    public function get_normalisasi() {
        $id_kriteria = $this->input->post("id_kriteria");
        $nama_kriteria = $this->input->post("nama_kriteria");
        if ($id_kriteria == NULL && $nama_kriteria == NULL) {
            $kriteria = 'Data Normalisasi Kriteria';
            $disable = 'disabled';
        } else {
            $kriteria = 'Data Normalisasi Kriteria : ' . $nama_kriteria;
            $disable = '';
        }
        $data_normalisasi = $this->database->get_normalisasi($id_kriteria);
        $html = '<div class="row">
                                        <div class="col-lg-6"><h4>' . $kriteria . '</h4></div>
                                        <div class="col-lg-6"><button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah-normalisasi" ' . $disable . '>Tambah</button></div>
                                    </div>
                                    <hr>';

        $html .= '<table id="data-table-default1" class="table table-striped table-bordered" >
                                                <thead>
                                                    <tr>
                                                        <th width="1%">No</th>
                                                        <th class="text-nowrap">Nama Kriteria</th>
                                                        <th class="text-nowrap">Keterangan Normalisasi</th>
                                                        <th class="text-nowrap">Nilai</th>
                                                        <th data-orderable="false" class="text-nowrap">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
        $no = 0;
        foreach ($data_normalisasi->result() as $row) {
            $no++;
            $html .= '<tr>';
            $html .= '<td>' . $no . '</td>';
            $html .= '<td>' . $row->nama_kriteria . '</td>';
            $html .= '<td>' . $row->keterangan . '</td>';
            $html .= '<td>' . floatval($row->nilai) . '</td>';
            $html .= '<td>
                            <a href="javascript:;" class="btn btn-success btn-icon btn-circle btn-sm" 
                                                   data-id_kriteria="' . $row->id_kriteria . '"
                                                   data-nama_kriteria="' . $row->nama_kriteria . '"
                                                   data-id_normalisasi="' . $row->id_normalisasi . '"
                                                   data-keterangan="' . $row->keterangan . '"
                                                   data-nilai="' . $row->nilai . '"
                                                   data-toggle="modal" data-target="#modal-kelola-normalisasi">
                                                    <i class="fa fa-wrench"></i> 
                            </a>
                            <a href="javascript:;" class="btn btn-danger btn-icon btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="hapus_normalisasi(' . "'$row->id_normalisasi'" . ')">
                                <i class="fa fa-times"></i>
                            </a>
                      </td>';
            $html .= '</tr>';
        }
        $html .= '</tbody>';
        $html .= '</table>';
        echo $html;
        die;
    }

    public function get_periode() {
        $data_periode = $this->database->get_periode();
        $html = '           <table id="data-table-default" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th class="text-nowrap">Periode</th>
                                    <th class="text-nowrap">Sesi</th>
                                    <th class="text-nowrap">Status</th>
                                    <th data-orderable="false" class="text-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>';
        $no = 0;
        foreach ($data_periode->result() as $row) {
            $no++;
            $html .= '                       <tr class="">
                                            <td width="1%" class="f-s-600 text-inverse">' . $no . '</td>
                                            <td>' . $row->periode_bulan . '</td>
                                            <td>' . $row->sesi . '</td>
                                            <td>' . $row->status . '</td>';
            $html .= '                       <td>';
            $html .= '                       <a href="#" class="btn btn-success btn-xs" onclick="get_alternatif_karyawan(' . "'$row->id_periode_seleksi','$row->periode_bulan','$row->sesi'" . ')">Lihat Alternatif</a>';
            if ($row->status == "Proses") {
                $html .= '                      <a href="javascript:;" class="btn btn-danger btn-icon btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="hapus_periode(' . "'$row->id_periode_seleksi'" . ')">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>';
            }
            $html .= '                               </tr>';
        }
        $html .= '                        </tbody></table>';
        echo $html;
        die;
    }

    public function get_alternatif_karyawan() {
        $id_periode = $this->input->post("id_periode");
        $periode_bulan = $this->input->post("periode_bulan");
        $sesi = $this->input->post("sesi");

        if ($id_periode == NULL && $periode_bulan == NULL) {
            $periode = 'Data Alternatif karyawan';
        } else {
            $periode = 'Periode ' . $periode_bulan . ' [Sesi ' . $sesi . ']';
        }
        $data_alternatif_karyawan = $this->database->get_alternatif_karyawan($id_periode);
        $html = '<div class="row">
                                        <div class="col-lg-6"><h4>' . $periode . '</h4></div>
                                    </div>
                                    <hr>';

        $html .= '<table id="data-table-default1" class="table table-striped table-bordered" >
                                                <thead>
                                                    <tr>
                                                        <th width="1%">No</th>
                                                        <th class="text-nowrap">Periode</th>
                                                        <th class="text-nowrap">Sesi</th>
                                                        <th class="text-nowrap">Nik</th>
                                                        <th class="text-nowrap">Nama</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
        $no = 0;
        foreach ($data_alternatif_karyawan->result() as $row) {
            $no++;
            $html .= '<tr>';
            $html .= '<td>' . $no . '</td>';
            $html .= '<td>' . $row->pb . '</td>';
            $html .= '<td>' . $row->ses . '</td>';
            $html .= '<td>' . $row->nik_karyawan . '</td>';
            $html .= '<td>' . $row->nama_karyawan . '</td>';
            $html .= '</tr>';
        }
        $html .= '</tbody>';
        $html .= '</table>';
        echo $html;
        die;
    }

    public function get_periode_aktif() {
        $data_periode = $this->database->get_periode_proses();

        $html = '<option value="" >- Pilih Periode Seleksi dan Sesi -</option>';
        foreach ($data_periode->result() as $row) {
            $html .= '<option value="' . $row->id_periode_seleksi . '" >' . 'Periode ' . $row->periode_bulan . ' Sesi ' . $row->sesi . '</option>';
        }

        echo $html;
        die;
    }

    public function get_alternatif_aktif() {
        $periode = $this->input->post("id_periode_seleksi");

        $data_alternatif = $this->database->get_alternatif_aktif($periode);

        $html = '';

        $html .= '<table id="data-table-default" class="table table-striped table-bordered" >
                                                <thead>
                                                    <tr>
                                                        <th width="1%">No</th>
                                                        <th class="text-nowrap">Nik Karyawan</th>
                                                        <th class="text-nowrap">Nama Karyawan</th>
                                                        <th class="text-nowrap">Status</th>
                                                        <th data-orderable="false" class="text-nowrap">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
        $no = 0;
        $status_dinilai = 0;
        $status_belum_dinilai = 0;
        foreach ($data_alternatif->result() as $row) {
            $no++;
            $html .= '<tr>';
            $html .= '<td>' . $no . '</td>';
            $html .= '<td>' . $row->nik_karyawan . '</td>';
            $html .= '<td>' . $row->nama_karyawan . '</td>';
            $html .= '<td>' . $row->status . '</td>';
            if ($row->status == 'Belum dinilai') {
                $html .= '<td> <button href="javascript:;" type="button" class="btn btn-success btn-xs" data-id_alternatif="' . $row->id_alternatif_karyawan . '" data-toggle="modal" data-target="#modal-nilai-alternatif">Nilai Karyawan</button></td>';
                $status_belum_dinilai++;
            } else {
                $html .= '<td> <button href="javascript:;" type="button" class="btn btn-yellow btn-xs" data-toggle="modal" data-target="#modal-edit-alternatif" onclick="get_data_edit(' . "'$periode','$row->id_alternatif_karyawan'" . ')">Edit Nilai</button></td>';
                $status_dinilai++;
            }

            $html .= '</tr>';
        }
        $html .= '</tbody>';
        if ($status_dinilai == $no && $no != 0) {
            $html .= '<tfoot>';
            $html .= '<tr class="bg-black">';
            $html .= '<th colspan="4"></th>';
            $html .= '<th ><button href="javascript:;" type="button" class="btn btn-primary btn-xs" onclick="simpan_penilaian_final(' . $periode . ')">Lakukan Seleksi</button></th>';
            $html .= '</tr>';
            $html .= '</tfoot>';
        }
        $html .= '</table>';
        echo $html;
        die;
    }

    public function get_kriteria_penilaian() {
        $id_periode_seleksi = $this->input->post('id_periode_seleksi');
        $data_kriteria = $this->database->get_kriteria();

        $bobot = 0;
        foreach ($data_kriteria->result() as $row) {
            $bobot = $bobot + $row->bobot;
        }

        if ($data_kriteria->num_rows() == 0) {
            $html = '<div style="background-color: #fff"class="modal-body">'
                    . '<div class="alert alert-danger"><center><strong>Tidak ada kriteria penilaian!</strong><br> Silahkan perbarui pada halaman kriteria</center></div></div>';
            echo $html;
            die;
        } elseif ($bobot != 100) {
            $html = '<div style="background-color: #fff"class="modal-body">'
                    . '<div class="alert alert-danger"><center><strong>Total bobot harus sejumlah 100!</strong><br> Silahkan perbarui pada halaman kriteria</center></div></div>';
            echo $html;
            die;
        } else {

            $html = '            <form role="form"  id="form_nilai_alternatif" class="margin-bottom-0">
                                <div style="background-color: #fff"class="modal-body">
                                <input type="hidden" name="id_periode_seleksi" id="id_periode_seleksi" value="' . $id_periode_seleksi . '"/>
                                <input type="hidden" name="id_alternatif" id="id_alternatif"/>';
            foreach ($data_kriteria->result() as $row) {
                $html .= '<div class="form-group row m-b-15">';
                $html .= '<label class="col-form-label col-md-3">' . $row->nama_kriteria . '</label>';
                $html .= '<div class="col-md-9">';
                $html .= '<div class="input-group">';
                $html .= '<input type="hidden" name="id_kriteria[]" value="' . $row->id_kriteria . '"/>';
                $data_normalisasi = $this->database->get_normalisasi_spesifik($row->id_kriteria);
                $html .= '<select id="id_nilai" name="nilai[]" class="form-control form-control-sm">';
                $html .= '<option value="" >- Nilai Kriteria -</option>';
                foreach ($data_normalisasi->result() as $key) {
                    $html .= '<option value="' . $key->nilai . '" > ' . $key->keterangan . ' </option>';
                }
                $html .= '</select>';
                $html .= '</div></div></div>';
            }
            $html .= '              </div>
                                <div style="background-color: #fff" class="modal-footer">
                                    <button href="javascript:;" class="btn btn-warning" data-dismiss="modal">Batal</button>>
                                    <button type="submit" class="btn btn-primary">Input Nilai</button>>
                                </div>
                            </form>';
            echo $html;
            die;
        }
    }

    public function get_data_edit_alternatif() {
        $id_periode_seleksi = $this->input->post('id_periode_seleksi');
        $id_alternatif = $this->input->post('id_alternatif');

        $data_edit_alternatif = $this->database->get_edit_nilai_alternatif($id_periode_seleksi, $id_alternatif);
//        $data_status_alternatif = $this->database->get_status_alternatif($id_periode_seleksi, $id_dm, $id_alternatif)->row();

        $html = '            <form role="form"  id="form_edit_nilai_alternatif" class="margin-bottom-0">
                                <div style="background-color: #fff"class="modal-body">';
        foreach ($data_edit_alternatif->result() as $row) {
            $html .= '<div class="form-group row m-b-15">';
            $html .= '<label class="col-form-label col-md-3">' . $row->namkri . '</label>';
            $html .= '<div class="col-md-9">';
            $html .= '<div class="input-group">';
            $html .= '<input type="hidden" name="id_nilai[]" value="' . $row->id_nilai . '"/>';
            $data_normalisasi = $this->database->get_normalisasi_spesifik($row->id_kriteria);
//            $data_nilai_alternatif = $this->database->get_data_normalisasi_spesifik($row->id_kriteria, $row->nilai);
            $html .= '<select id="id_nilai" name="nilai[]" class="form-control form-control-sm">';
            $html .= '<option value="" >- Nilai Kriteria -</option>';
            foreach ($data_normalisasi->result() as $key) {
                $selected = '';
                if ($key->nilai == floatval($row->nilai)) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                $html .= '<option value="' . $key->nilai . '" ' . $selected . '> ' . $key->keterangan . ' </option>';
            }
            $html .= '</select>';
            $html .= '</div></div></div>';
        }
        $html .= '              </div>
                                <div style="background-color: #fff" class="modal-footer">
                                    <button href="javascript:;" class="btn btn-warning" data-dismiss="modal">Batal</button>>
                                    <button type="submit" class="btn btn-primary">Perbarui Nilai</button>>
                                </div>
                            </form>';
        echo $html;
        die;
    }

    public function get_periode_selesai() {
        $data_periode = $this->database->get_periode_selesai();

        $html = '<option value="0" >- Pilih Periode Seleksi dan Sesi -</option>';
        foreach ($data_periode->result() as $row) {
            $html .= '<option value="' . $row->id_periode_seleksi . '" >' . 'Periode ' . $row->periode_bulan . ' Sesi ' . $row->sesi . '</option>';
        }

        echo $html;
        die;
    }

    public function get_hasil_seleksi() {
        $rangking_moora = array();
        $id_dm_array = array();
        $id_periode_seleksi = $this->input->post('id_periode_seleksi');
        $data_hasil_seleksi = $this->database->get_hasil_seleksi($id_periode_seleksi);
        $periode = $this->input->post('label');

//        foreach ($dm_total->result() as $key) {
//            array_push($label_array, '"' . $this->database->get_dm_spesific($key->id_dm)->row()->tipe_dm . '"');
//            array_push($id_dm_array, $key->id_dm);
//        }
//        array_push($label_array, '"Rangking Final"');
//        $label = implode(",", $label_array);

        $html = '                   <div class="row">
                                        <div class="col-lg-6">
                                        <h6><center>Hasil pemilihan karyawan terbaik <strong>' . $periode . '</strong></center></h6><hr>
                                            <table id="tabel_hasil_seleksi" class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Nama Karyawan</th>
                                                    <th>Nilai Optimasi</th>
                                                    <th>Rangking</th>
                                                </tr>
                                                </thead>
                                                <tbody>';
        foreach ($data_hasil_seleksi->result() as $row) {
            array_push($rangking_moora, $row->rangking);
            $html .= '                              <tr>
                                                        <td class="text-nowrap">' . $row->nama_karyawan . '</td>
                                                        <td class="text-nowrap">' . $row->nilai_optimasi . '</td>
                                                        <td class="text-nowrap">' . $row->rangking . '</td>
                                                    </tr>';
        }
        $nilai_max = max($rangking_moora) + 1;
        $nilai_min = min($rangking_moora) - 1;
        $html .= '                              </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="3" >
                                                            <center>
                                                                <button type="button" href="javascript:;" class="btn btn-primary btn-sm" onclick="perangkingan_moora(' . $id_periode_seleksi . ')">Proses Perangkingan</button>
                                                                <a href="' . site_url('autentikasi/cetak_laporan?id_periode_seleksi=' . $id_periode_seleksi . '') . '" target="_blank" class="btn btn-lime btn-sm" >Cetak Laporan</a>
                                                            </center>
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="col-lg-6">
                                        <h6><center>Statistik hasil seleksi karyawan</center></h6><hr>
                                <canvas id="line-chart" data-render="chart-js" height="206px"></canvas>
                                                <script>
                                                var ctx = document.getElementById("line-chart");
                                                var statuss = new Chart(ctx, {
                                                    type: "bar",
                                                    data: {
                                                        datasets: [';
        $data_alternatif = $this->database->get_hasil_seleksi($id_periode_seleksi);
        foreach ($data_alternatif->result() as $al) {

            $color_generator = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);

            $hex = $color_generator;
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

            $warna_transparan = "rgba($r, $g, $b, 0.2)";
            $warna_solid = "rgba($r, $g, $b, 1)";

//            $rangking = array();
//            foreach ($id_dm_array as $idm) {
//                array_push($rangking, $this->database->get_rangking_alternatif($id_periode_seleksi, $idm, $al->id_alternatif)->row()->rangking);
//            }
//            array_push($rangking, $this->database->get_rangking_final($id_periode_seleksi, $al->id_alternatif)->row()->rangking);
//            $data_rangking = implode(",", $rangking);

            $html .= '                                      {
                                                            label: "' . $al->nama_karyawan . '",
                                                            borderColor: "' . $warna_solid . '",
		                                            pointBackgroundColor: "' . $warna_solid . '",
                                                            pointRadius: 5,
		                                            borderWidth: 2,
		                                            backgroundColor: "' . $warna_transparan . '",
                                                            data: [' . $al->nilai_optimasi . '],
                                                        },';
        }

        $html .= '                                      ],
                                                        
                                                    },
                                                    options: {                                                 
                                                        plugins: {
                                                            // Change options for ALL labels of THIS CHART
                                                            datalabels: {
                                                                color: "red"
                                                            }
                                                        },
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    suggestedMin: ' . $nilai_min . ',
                                                                    suggestedMax: ' . $nilai_max . '
                                                                },
                                                                display: true,
                                                                scaleLabel: {
                                                                    display: true,
                                                                    labelString: "Nilai Optimasi Setiap Karyawan"
                                                                }
                                                            }]
                                                        }
                                                    }
                                                });
                                                </script>
                                        </div>
                                    </div>
                                    <hr>';
        echo $html;
        die;
    }

    public function tambah_cabang() {
        $data = array();
        $data['nama_cabang'] = $this->input->post('nama_cabang');
        $data['status_aktif'] = "Aktif";

        $query = $this->database->add_cabang($data);

        if ($query) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function tambah_departemen() {
        $data = array();
        $data['nama_departemen'] = $this->input->post('nama_departemen');
        $data['status_aktif'] = "Aktif";

        $query = $this->database->add_departemen($data);

        if ($query) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function tambah_jabatan() {
        $data = array();
        $data['nama_jabatan'] = $this->input->post('nama_jabatan');
        $data['status_aktif'] = "Aktif";

        $query = $this->database->add_jabatan($data);

        if ($query) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function tambah_karyawan() {
        $namafile = "file_" . time();
        $config['upload_path'] = './assets/img/karyawan/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '4048';
        $config['file_name'] = $namafile;

        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto')) {
            $file = $this->upload->data();


            $data = array();
            $data['nama_karyawan'] = $this->input->post('nama_karyawan');
            $data['nik_karyawan'] = $this->input->post('nik');
            $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
            $data['cabang'] = $this->input->post('cabang');
            $data['departemen'] = $this->input->post('departemen');
            $data['jabatan'] = $this->input->post('jabatan');
            $data['status_perkawinan'] = $this->input->post('status_perkawinan');
            $data['foto'] = $file['file_name'];
            $data['status_aktif'] = "Aktif";

            $query = $this->database->add_karyawan($data);

            if ($query) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }

    public function tambah_kriteria() {
        $data = array();
        $data['nama_kriteria'] = $this->input->post('nama_kriteria');
        $data['tipe_kriteria'] = $this->input->post('tipe_kriteria');
        $data['bobot'] = '0';
        $data['status_aktif'] = "Aktif";

        $query = $this->database->add_kriteria($data);

        if ($query) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function tambah_normalisasi() {
        $data = array();
        $data['id_kriteria'] = $this->input->post('id_kriteria');
        $data['keterangan'] = $this->input->post('keterangan');
        $data['nilai'] = $this->input->post('nilai');
        ;
        $data['status_aktif'] = "Aktif";

        $query = $this->database->add_normalisasi($data);

        if ($query) {
            echo $data['id_kriteria'];
        } else {
            echo 0;
        }
    }

    public function tambah_periode() {
        $date_explode = explode(' ', tgl_indo(date('Y-m-d')));
        $bulan = $date_explode[1];
        $tahun = $date_explode[2];
        $bulan_tahun = $bulan . " " . $tahun;

        $jumlah_periode = $this->database->cek_periode_jumlah($bulan_tahun);
        $max_periode = $this->database->cek_periode_max($bulan_tahun)->row()->sesi_max;

        if ($jumlah_periode->num_rows() == 2) {
            echo $bulan_tahun;
        } else {
            $data['periode_bulan'] = $bulan_tahun;
            $data['sesi'] = $max_periode + 1;
            $data['status'] = "Proses";
            $data['status_aktif'] = "Aktif";

            $tambah_periode = $this->database->add_periode($data);

            $data_karyawan = $this->database->get_karyawan_belum_menang_setahun();
            $data_alternatif = array();

            foreach ($data_karyawan->result() as $row) {
                $data_alternatif['id_periode_seleksi'] = $tambah_periode;
                $data_alternatif['id_karyawan'] = $row->id_karyawan;
                $data_alternatif['nik_karyawan'] = $row->nik_karyawan;
                $data_alternatif['nama_karyawan'] = $row->nama_karyawan;
                $data_alternatif['status'] = "Belum dinilai";
                $data_alternatif['status_aktif'] = "Aktif";

                $this->database->add_alternatif_karyawan($data_alternatif);
            }

            echo 1;
        }
//        if ($tambah_periode) {
//            echo 1;
//        } else {
//            echo 0;
//        }
    }

    public function input_nilai_alternatif() {
        $jumlah = count($this->input->post('id_kriteria'));

        if ($jumlah > 0) {
            for ($i = 0; $i < $jumlah; $i++) {
                $data['id_alternatif_karyawan'] = $this->input->post('id_alternatif');
                $data['nilai'] = $this->input->post('nilai')[$i];
                $data['id_kriteria'] = $this->input->post('id_kriteria')[$i];
                $data['id_periode_seleksi'] = $this->input->post('id_periode_seleksi');
                $this->database->add_nilai_alternatif($data);
            }
        }

        $data_status_alternatif['status'] = 'Sudah dinilai';
        $query = $this->database->update_status_alternatif($this->input->post('id_alternatif'), $data_status_alternatif);
        if ($query) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function update_cabang() {
        $id_cabang = $this->input->post('id_cabang');

        $data = array();
        $data["nama_cabang"] = $this->input->post('nama_cabang');

        $update_cabang = $this->database->update_cabang($id_cabang, $data);

        if ($update_cabang) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function update_departemen() {
        $id_departemen = $this->input->post('id_departemen');

        $data = array();
        $data["nama_departemen"] = $this->input->post('nama_departemen');

        $update_departemen = $this->database->update_departemen($id_departemen, $data);

        if ($update_departemen) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function update_jabatan() {
        $id_jabatan = $this->input->post('id_jabatan');

        $data = array();
        $data["nama_jabatan"] = $this->input->post('nama_jabatan');

        $update_jabatan = $this->database->update_jabatan($id_jabatan, $data);

        if ($update_jabatan) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function update_karyawan() {
//        $status = $this->input->post('status');
        $path = './assets/img/karyawan/';
        $foto_lama = $this->input->post('foto');
        $namafile = "file_" . time();
        $config['upload_path'] = './assets/img/karyawan/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '4048';

        $config['file_name'] = $namafile;
        $this->upload->initialize($config);

        $data = array();
        $id_karyawan = $this->input->post('id_karyawan');
        $data['nama_karyawan'] = $this->input->post('nama_karyawan');
        $data['nik_karyawan'] = $this->input->post('nik');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['cabang'] = $this->input->post('cabang');
        $data['departemen'] = $this->input->post('departemen');
        $data['jabatan'] = $this->input->post('jabatan');
        $data['status_perkawinan'] = $this->input->post('status_perkawinan');
        $data['foto'] = $this->input->post('foto');


        if ($_FILES['foto']['name']) {
            @unlink($path . $foto_lama);
            if ($this->upload->do_upload('foto')) {

                $file = $this->upload->data();
                $data['foto'] = $file['file_name'];
                $query = $this->database->update_karyawan($id_karyawan, $data);
                if ($query) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        } else {
            $query = $this->database->update_karyawan($id_karyawan, $data);
            if ($query) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function update_kriteria() {
        $id_kriteria = $this->input->post('id_kriteria');

        $data = array();
        $data["nama_kriteria"] = $this->input->post('nama_kriteria');
        $data["tipe_kriteria"] = $this->input->post('tipe_kriteria');

        $update_kriteria = $this->database->update_kriteria($id_kriteria, $data);

        if ($update_kriteria) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function update_bobot() {
        $jumlah = count($this->input->post('bobot_kriteria'));

        if ($jumlah > 0) {
            for ($i = 0; $i < $jumlah; $i++) {
                $this->database->update_bobot($this->input->post('id_bobot_kriteria')[$i], $this->input->post('bobot_kriteria')[$i]);
            }
        }
    }

    public function update_normalisasi() {
        $id_normalisasi = $this->input->post('id_normalisasi');

        $data = array();
        $data["keterangan"] = $this->input->post('keterangan');
        $data["nilai"] = $this->input->post('nilai');

        $update_normalisasi = $this->database->update_normalisasi($id_normalisasi, $data);

        if ($update_normalisasi) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function update_nilai_alternatif() {
        $jumlah = count($this->input->post('nilai'));

        if ($jumlah > 0) {
            for ($i = 0; $i < $jumlah; $i++) {
                $data['nilai'] = $this->input->post('nilai')[$i];
                $this->database->update_nilai_alternatif($this->input->post('id_nilai')[$i], $data);
            }
        }
    }

    public function hapus_cabang() {
        $id_cabang = $this->input->post('id_hapus_cabang');

        $data = array();
        $data["status_aktif"] = "Non-Aktif";

        $hapus_cabang = $this->database->hapus_cabang($id_cabang, $data);

        if ($hapus_cabang) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function hapus_departemen() {
        $id_departemen = $this->input->post('id_hapus_departemen');

        $data = array();
        $data["status_aktif"] = "Non-Aktif";

        $hapus_departemen = $this->database->hapus_departemen($id_departemen, $data);

        if ($hapus_departemen) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function hapus_jabatan() {
        $id_jabatan = $this->input->post('id_hapus_jabatan');

        $data = array();
        $data["status_aktif"] = "Non-Aktif";

        $hapus_jabatan = $this->database->hapus_jabatan($id_jabatan, $data);

        if ($hapus_jabatan) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function hapus_karyawan() {
        $id_karyawan = $this->input->post('id_hapus_karyawan');

        $data = array();
        $data["status_aktif"] = "Non-Aktif";

        $hapus_karyawan = $this->database->hapus_karyawan($id_karyawan, $data);

        if ($hapus_karyawan) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function hapus_kriteria() {
        $id_kriteria = $this->input->post('id_hapus_kriteria');

        $data = array();
        $data["status_aktif"] = "Non-Aktif";

        $hapus_kriteria = $this->database->hapus_kriteria($id_kriteria, $data);

        if ($hapus_kriteria) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function hapus_normalisasi() {
        $id_normalisasi = $this->input->post('id_hapus_normalisasi');

        $data = array();
        $data["status_aktif"] = "Non-Aktif";

        $hapus_normalisasi = $this->database->hapus_normalisasi($id_normalisasi, $data);

        if ($hapus_normalisasi) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function hapus_periode() {
        $id_periode = $this->input->post('id_hapus_periode');

        $data = array();
        $data["status_aktif"] = "Non-Aktif";

        $hapus_periode = $this->database->hapus_periode($id_periode, $data);
        $hapus_alternatif = $this->database->hapus_alternatif($id_periode, $data);

        if ($hapus_periode) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function cek_keterangan() {
        $keterangan = $this->input->post('keterangan');
        $id_kriteria = $this->input->post('id_kriteria');

        $check = $this->database->check_keterangan($id_kriteria, $keterangan);

        if ($check->num_rows() == 0) {
            echo json_encode(array(
                'valid' => TRUE,
            ));
        } else {
            echo json_encode(array(
                'valid' => FALSE,
            ));
        }
    }

    function cek_nilai() {
        $nilai = $this->input->post('nilai');
        $id_kriteria = $this->input->post('id_kriteria');

        $check = $this->database->check_nilai($id_kriteria, $nilai);

        if ($check->num_rows() == 0) {
            echo json_encode(array(
                'valid' => TRUE,
            ));
        } else {
            echo json_encode(array(
                'valid' => FALSE,
            ));
        }
    }

    function cek_jumlah_karyawan() {
        $date_explode = explode(' ', tgl_indo(date('Y-m-d')));
        $bulan = $date_explode[1];
        $tahun = $date_explode[2];
        $bulan_tahun = $bulan . " " . $tahun;

        $periode_proses = $this->database->cek_periode_proses($bulan_tahun);

        if ($periode_proses->num_rows() != 0) {
            echo 'proses';
        } else {
            $query = $this->database->get_karyawan_belum_menang_setahun();
            $jumlah = $query->num_rows();
            echo $jumlah;
        }
    }

    public function metode_moora() {
        $id_periode_seleksi = $this->input->post('id_periode_seleksi');
        $data_nilai_alternatif = $this->database->get_nilai_alternatif($id_periode_seleksi);
        $nilai = array();
        $baris = array();
        $kriteria = array();
        $divider = array();

        //decision matrix
        foreach ($data_nilai_alternatif->result() as $row) {
            $data_nilai = $this->database->get_nilai($id_periode_seleksi, $row->id_alternatif_karyawan);
            foreach ($data_nilai->result() as $key) {
                if (count($nilai) == 0) {
                    if (empty($baris[0])) {
                        array_push($kriteria, "Alternatif/Kriteria", $key->id_kriteria);
                        array_push($baris, $row->id_alternatif_karyawan, $key->nilai);
                    } else {
                        array_push($kriteria, $key->id_kriteria);
                        array_push($baris, $key->nilai);
                    }
                } else {
                    if (empty($baris[0])) {
                        array_push($baris, $row->id_alternatif_karyawan, $key->nilai);
                    } else {
                        array_push($baris, $key->nilai);
                    }
                }
            }
            if (count($nilai) == 0) {
                array_push($nilai, $kriteria, $baris);
                $baris = array();
            } else {
                array_push($nilai, $baris);
                $baris = array();
            }
        }

        //Tabel Decision Matrix
//        echo '<table><tbody>';
//        for ($c = 0; $c < count($nilai); $c++) {
//            echo '<tr>';
//            for ($d = 0; $d < count($kriteria); $d++) {
//                echo '<td>' . $nilai[$c][$d] . '</td>';
//            }
//            echo '</tr>';
//        }
//        echo '</tbody></table>';
        //Normalized Matrix
        $sum = 0;
        for ($i = 1; $i < count($kriteria); $i++) {
            for ($j = 1; $j < count($nilai); $j++) {
                $sum = $sum + pow($nilai[$j][$i], 2);
            }
            array_push($divider, sqrt($sum));
            $sum = 0;
        }


        for ($k = 1; $k < count($nilai); $k++) {
            for ($l = 1; $l < count($kriteria); $l++) {
                $nilai[$k][$l] = $nilai[$k][$l] / $divider[$l - 1];
            }
        }

        //Tabel Normalized Matrix
//        echo '<table><tbody>';
//        for ($f = 0; $f < count($nilai); $f++) {
//            echo '<tr>';
//            for ($g = 0; $g < count($kriteria); $g++) {
//                echo '<td>' . $nilai[$f][$g] . '</td>';
//            }
//            echo '</tr>';
//        }
//        echo '</tbody></table>';
        //Nilai Optimasi
        $benefit = 0;
        $cost = 0;
        $nilai_optimasi = array();
        for ($m = 1; $m < count($nilai); $m++) {
            for ($n = 1; $n < count($kriteria); $n++) {
                $data_kriteria = $this->database->get_data_kriteria($nilai[0][$n]);
                if ($data_kriteria->row()->tipe_kriteria == 'benefit') {
                    $benefit = $benefit + ($nilai[$m][$n] * $data_kriteria->row()->bobot);
                }
                if ($data_kriteria->row()->tipe_kriteria == 'cost') {
                    $cost = $cost + ($nilai[$m][$n] * $data_kriteria->row()->bobot);
                }
            }
            array_push($nilai_optimasi, array($nilai[$m][0], $benefit - $cost));
            $benefit = 0;
            $cost = 0;
        }

        //Tabel Nilai Optimasi
//        echo '<table><tbody>';
//        for ($x = 0; $x < count($nilai_optimasi); $x++) {
//            echo '<tr>';
//            for ($z = 0; $z < 2; $z++) {
//                echo '<td>' . $nilai_optimasi[$x][$z] . '</td>';
//            }
//            echo '</tr>';
//        }
//        echo '</tbody></table>';
        //Rangking
        $rangking = array();
        $swap = array();
//        array_push($rangking, $nilai_optimasi[0]);
        for ($v = 0; $v < count($nilai_optimasi); $v++) {
            for ($s = 0; $s < $v; $s++) {
                if ($nilai_optimasi[$v][1] > $nilai_optimasi[$s][1]) {
                    array_push($swap, $nilai_optimasi[$v]);
                    $nilai_optimasi[$v] = $nilai_optimasi[$s];
                    $nilai_optimasi[$s] = $swap[0];
                    $swap = array();
                }
            }
        }

        for ($o = 0; $o < count($nilai_optimasi); $o++) {
            array_push($nilai_optimasi[$o], $o + 1);
        }


        //Tabel Rangking
//        echo '<table><tbody>';
//        for ($p = 0; $p < count($nilai_optimasi); $p++) {
//            echo '<tr>';
//            for ($q = 0; $q < 2; $q++) {
//                echo '<td>' . $nilai_optimasi[$p][$q] . '</td>';
//            }
//            echo '</tr>';
//        }
//        echo '</tbody></table>';

        foreach ($nilai_optimasi as $hasil) {
            $data_rangking['id_periode_seleksi'] = $id_periode_seleksi;
            $data_rangking['id_alternatif_karyawan'] = $hasil[0];
            $data_rangking['nilai_optimasi'] = $hasil[1];
            $data_rangking['rangking'] = $hasil[2];
            $this->database->add_rangking_moora($data_rangking);
        }

        $data_periode = array();
        $data_periode['status'] = "Selesai";
        $data_update_periode = $this->database->update_periode($id_periode_seleksi, $data_periode);

        if ($data_update_periode) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function get_perangkingan_moora() {
        $id_periode_seleksi = $this->input->post('id_periode_seleksi');
        $data_nilai_alternatif = $this->database->get_nilai_alternatif($id_periode_seleksi);
        $nilai = array();
        $baris = array();
        $kriteria = array();
        $divider = array();

        //decision matrix
        foreach ($data_nilai_alternatif->result() as $row) {
            $data_nilai = $this->database->get_nilai($id_periode_seleksi, $row->id_alternatif_karyawan);
            foreach ($data_nilai->result() as $key) {
                if (count($nilai) == 0) {
                    if (empty($baris[0])) {
                        array_push($kriteria, "Alternatif/Kriteria", $key->id_kriteria);
                        array_push($baris, $row->id_alternatif_karyawan, $key->nilai);
                    } else {
                        array_push($kriteria, $key->id_kriteria);
                        array_push($baris, $key->nilai);
                    }
                } else {
                    if (empty($baris[0])) {
                        array_push($baris, $row->id_alternatif_karyawan, $key->nilai);
                    } else {
                        array_push($baris, $key->nilai);
                    }
                }
            }
            if (count($nilai) == 0) {
                array_push($nilai, $kriteria, $baris);
                $baris = array();
            } else {
                array_push($nilai, $baris);
                $baris = array();
            }
        }

//        $id_penawaran = $this->database->get_id_penawaran($id_periode_seleksi)->row()->id_penawaran;
        //Tabel Decision Matrix

        $html = '<h6>Tabel Decision Matrix</h6>
            <table class="table table-striped">
                    <thead><tr>
                    <th>Alternatif/Kriteria</th>';
        for ($z = 1; $z < count($kriteria); $z++) {
            $db_kriteria = $this->database->get_kriteria_spesifik($nilai[0][$z])->row();
            $html .= '<th>' . $db_kriteria->nama_kriteria . ' <i style="color:red;">(bobot : ' . $db_kriteria->bobot . ')</i></th>';
        }
        $html .= '  </tr></thead>
                    <tbody>';
        for ($c = 1; $c < count($nilai); $c++) {
            $html .= '<tr>';
            for ($d = 0; $d < count($kriteria); $d++) {
                if ($d == 0) {
                    $html .= '<td>' . $this->database->get_alternatif_spesifik($id_periode_seleksi, $nilai[$c][$d])->row()->nama_karyawan . '</td>';
                } else {
                    $html .= '<td>' . floatval($nilai[$c][$d]) . '</td>';
                }
            }
            $html .= '</tr>';
        }
        $html .= '  </tbody></table>';

        //Normalized Matrix
        $sum = 0;
        for ($i = 1; $i < count($kriteria); $i++) {
            for ($j = 1; $j < count($nilai); $j++) {
                $sum = $sum + pow($nilai[$j][$i], 2);
            }
            array_push($divider, sqrt($sum));
            $sum = 0;
        }


        for ($k = 1; $k < count($nilai); $k++) {
            for ($l = 1; $l < count($kriteria); $l++) {
                $nilai[$k][$l] = $nilai[$k][$l] / $divider[$l - 1];
            }
        }

        //Tabel Normalized Matrix
        $html .= '<h6>Tabel Normalized Matrix</h6>
                <table class="table table-striped">
                    <thead><tr>
                        <th>Alternatif/Kriteria</th>';
        for ($z = 1; $z < count($kriteria); $z++) {
            $html .= '<th>' . $this->database->get_kriteria_spesifik($nilai[0][$z])->row()->nama_kriteria . '</th>';
        }
        $html .= '  </tr></thead>
                <tbody>';
        for ($f = 1; $f < count($nilai); $f++) {
            $html .= '<tr>';
            for ($g = 0; $g < count($kriteria); $g++) {
                if ($g == 0) {
                    $html .= '<td>' . $this->database->get_alternatif_spesifik($id_periode_seleksi, $nilai[$f][$g])->row()->nama_karyawan . '</td>';
                } else {
                    $html .= '<td>' . $nilai[$f][$g] . '</td>';
                }
            }
            $html .= '</tr>';
        }
        $html .= '</tbody></table>';

        //Nilai Optimasi
        $benefit = 0;
        $cost = 0;
        $nilai_optimasi = array();
        for ($m = 1; $m < count($nilai); $m++) {
            for ($n = 1; $n < count($kriteria); $n++) {
                $data_kriteria = $this->database->get_kriteria_spesifik($nilai[0][$n]);
                if ($data_kriteria->row()->tipe_kriteria == 'benefit') {
                    $benefit = $benefit + ($nilai[$m][$n] * $data_kriteria->row()->bobot);
                }
                if ($data_kriteria->row()->tipe_kriteria == 'cost') {
                    $cost = $cost + ($nilai[$m][$n] * $data_kriteria->row()->bobot);
                }
            }
            array_push($nilai_optimasi, array($nilai[$m][0], $benefit - $cost));
            $benefit = 0;
            $cost = 0;
        }

        //Tabel Nilai Optimasi
        $html .= '<h6>Tabel Nilai Optimasi</h6>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Karyawan</th>
                            <th>Nilai Optimasi</th>
                        </tr>
                    </thead>
                    <tbody>';
        for ($x = 0; $x < count($nilai_optimasi); $x++) {
            $html .= '<tr>';
            for ($z = 0; $z < 2; $z++) {
                if ($z == 0) {
                    $html .= '<td>' . $this->database->get_alternatif_spesifik($id_periode_seleksi, $nilai_optimasi[$x][$z])->row()->nama_karyawan . '</td>';
                } else {
                    $html .= '<td>' . $nilai_optimasi[$x][$z] . '</td>';
                }
            }
            $html .= '</tr>';
        }
        $html .= '</tbody></table>';

        //Rangking
        $rangking = array();
        $swap = array();
//        array_push($rangking, $nilai_optimasi[0]);
        for ($v = 0; $v < count($nilai_optimasi); $v++) {
            for ($s = 0; $s < $v; $s++) {
                if ($nilai_optimasi[$v][1] > $nilai_optimasi[$s][1]) {
                    array_push($swap, $nilai_optimasi[$v]);
                    $nilai_optimasi[$v] = $nilai_optimasi[$s];
                    $nilai_optimasi[$s] = $swap[0];
                    $swap = array();
                }
            }
        }

        for ($o = 0; $o < count($nilai_optimasi); $o++) {
            array_push($nilai_optimasi[$o], $o + 1);
        }


        //Tabel Rangking
        $html .= '<h6>Tabel Rangking Akhir</h6>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Karyawan</th>
                            <th>Nilai Optimasi</th>
                            <th>Rangking</th>
                        </tr>
                    </thead>
                <tbody>';
        for ($p = 0; $p < count($nilai_optimasi); $p++) {
            $html .= '<tr>';
            for ($q = 0; $q < 2; $q++) {
                if ($q == 0) {
                    $html .= '<td>' . $this->database->get_alternatif_spesifik($id_periode_seleksi, $nilai_optimasi[$p][$q])->row()->nama_karyawan . '</td>';
                } else {
                    $html .= '<td>' . $nilai_optimasi[$p][$q] . '</td>';
                }
            }
            $rank = $p + 1;
            $html .= '<td>' . $rank . '</td>';
            $html .= '</tr>';
        }
        $html .= '</tbody></table>';

        echo $html;
        die;
    }

    function cek_cabang() {
        $cabang = $this->input->post('nama_cabang');

        $check = $this->database->check_cabang($cabang);

        if ($check->num_rows() == 0) {
            echo json_encode(array(
                'valid' => TRUE,
            ));
        } else {
            echo json_encode(array(
                'valid' => FALSE,
            ));
        }
    }

    function cek_departemen() {
        $departemen = $this->input->post('nama_departemen');

        $check = $this->database->check_departemen($departemen);

        if ($check->num_rows() == 0) {
            echo json_encode(array(
                'valid' => TRUE,
            ));
        } else {
            echo json_encode(array(
                'valid' => FALSE,
            ));
        }
    }

    function cek_jabatan() {
        $jabatan = $this->input->post('nama_jabatan');

        $check = $this->database->check_jabatan($jabatan);

        if ($check->num_rows() == 0) {
            echo json_encode(array(
                'valid' => TRUE,
            ));
        } else {
            echo json_encode(array(
                'valid' => FALSE,
            ));
        }
    }

    function cek_nik() {
        $nik = $this->input->post('nik');

        $check = $this->database->check_nik($nik);

        if ($check->num_rows() == 0) {
            echo json_encode(array(
                'valid' => TRUE,
            ));
        } else {
            echo json_encode(array(
                'valid' => FALSE,
            ));
        }
    }

}
