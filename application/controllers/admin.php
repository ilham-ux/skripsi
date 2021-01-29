<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        $this->load->view('admin/beranda');
    }

    public function beranda() {
        $data = array();
        $data['laki'] = $this->database->statistik_jenkel('laki-laki');
        $data['perempuan'] = $this->database->statistik_jenkel('perempuan');
        $data['lajang'] = $this->database->statistik_nikah('lajang');
        $data['menikah'] = $this->database->statistik_nikah('menikah');
        $this->load->view('admin/beranda', $data);
    }

    public function pengguna() {
        $this->load->view('admin/pengguna');
    }

    public function karyawan() {
        $this->load->view('admin/karyawan');
    }

    public function get_pengguna() {
        $data_pengguna = $this->database->get_pengguna();
        $html = '           <table id="data-table-default" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th width="1%" data-orderable="false">Foto</th>
                                    <th class="text-nowrap">Nama</th>
                                    <th class="text-nowrap">Username</th>
                                    <th data-orderable="false" class="text-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>';
        $no = 0;
        foreach ($data_pengguna->result() as $row) {
            $no++;
            $html .= '                       <tr class="">
                                            <td width="1%" class="f-s-600 text-inverse">' . $no . '</td>
                                            <td width="1%" class="with-img"><img src="' . base_url() . 'assets/img/pengguna/' . $row->foto . '" class="img-rounded height-30" /></td>
                                            <td>' . $row->nama . '</td>
                                            <td>' . $row->username . '</td>';
            $html .= '                       <td><a href="javascript:;" class="btn btn-success btn-icon btn-circle btn-sm" 
                                                   data-id_user="' . $row->id_user . '"
                                                   data-nama="' . $row->nama . '"
                                                   data-username="' . $row->username . '"
                                                   data-password="' . $row->password . '"
                                                   data-foto="' . $row->foto . '"
                                                   data-toggle="modal" data-target="#modal-edit-pengguna">
                                                    <i class="fa fa-wrench"></i> 
                                                </a>
                                                <a href="javascript:;" class="btn btn-danger btn-icon btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="hapus_pengguna(' . "'$row->id_user','$row->foto'" . ')">
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
        $data_karyawan = $this->database->get_karyawan_lengkap();
        $html = '           <table id="data-table-default3" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th class="text-nowrap">Nik Karyawan</th>
                                    <th class="text-nowrap">Nama Karyawan</th>
                                    <th class="text-nowrap">Departemen</th>
                                    <th class="text-nowrap">Jabatan</th>
                                    <th data-orderable="false" class="text-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>';
        $no = 0;
        foreach ($data_karyawan->result() as $row) {
            $no++;
            $html .= '                       <tr class="">
                                            <td width="1%" class="f-s-600 text-inverse">' . $no . '</td>
                                            <td>' . $row->nik_karyawan . '</td>
                                            <td>' . $row->nama_karyawan . '</td>
                                            <td>' . $row->nama_departemen . '</td>
                                            <td>' . $row->nama_jabatan . '</td>';
            $html .= '                       <td>
                                                <a href="javascript:;" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="detail_karyawan(' . "'$row->id_karyawan'" . ')">
                                                    Detail Karyawan
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

    public function tambah_pengguna() {
        $namafile = "file_" . time();
        $config['upload_path'] = './assets/img/pengguna/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '4048';
        $config['file_name'] = $namafile;

        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto')) {
            $file = $this->upload->data();


            $data = array();
            $data['nama'] = $this->input->post('nama_pengguna');
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            $data['foto'] = $file['file_name'];
            $data['level'] = "User";
            $data['status_aktif'] = "Aktif";

            $query = $this->database->add_pengguna($data);

            if ($query) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }

    function update_pengguna() {
        $status = $this->input->post('status');
        $path = './assets/img/pengguna/';
        $foto_lama = $this->input->post('foto');
        $namafile = "file_" . time();
        $config['upload_path'] = './assets/img/pengguna/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '4048';

        $config['file_name'] = $namafile;
        $this->upload->initialize($config);

        $data = array();
        $data_chat = array();
        $id_user = $this->input->post('id_user');
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $data['nama'] = $this->input->post('nama_pengguna');
        $data['foto'] = $this->input->post('foto');


        if ($_FILES['foto']['name']) {
            @unlink($path . $foto_lama);
            if ($this->upload->do_upload('foto')) {

                $file = $this->upload->data();
                $data['foto'] = $file['file_name'];
                $data_chat['foto'] = $file['file_name'];
                $query = $this->database->update_pengguna($id_user, $data);
                if ($query) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        } else {
            $query = $this->database->update_pengguna($id_user, $data);
            if ($query) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    function hapus_pengguna() {
        $path = './assets/img/pengguna/';
        $foto_hapus = $this->input->post('foto_pengguna');
        $id_hapus = $this->input->post('id_hapus_pengguna');

        $data = array();
        $data["status_aktif"] = "Non-Aktif";

        $hapus_pengguna = $this->database->hapus_pengguna($id_hapus, $data);

        if (file_exists($path . $foto_hapus)) {
            unlink($path . $foto_hapus);
        }

        if ($hapus_pengguna) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function cek_username() {
        $username = $this->input->post('username');

        $check = $this->database->check_username($username);

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
