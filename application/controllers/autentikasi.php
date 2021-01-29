<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends CI_Controller {

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
        $data_user = array();
        $data_user['warning_login'] = "warning";
        $this->load->view('login/login', $data_user);
    }

    public function login() {
        $username = $this->input->post('data_username');
        $password = $this->input->post('data_password');
        $cek = $this->database->login($username, $password);
 
        if ($cek->num_rows() == 1) {
            $sess_data['password'] = $password;
            foreach ($cek->result() as $data_log) {
                $sess_data['id_user'] = $data_log->id_user;
                $sess_data['username'] = $data_log->username;
                $sess_data['nama'] = $data_log->nama;
                $sess_data['level'] = $data_log->level;
                $sess_data['foto'] = $data_log->foto;
                $this->session->set_userdata($sess_data);
            }

            if ($this->session->userdata('level') == 'Admin') {
                echo base_url() . "admin/beranda";
            } elseif ($this->session->userdata('level') == 'User') {
                echo base_url() . "user/beranda";
            }
        } else {
            echo 0;
//            $this->load->view('login/login', $data_user);
        }
    }

    public function logout() {
        $id_user = $this->session->userdata('id_user');
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function update_pengguna() {
        $last_url = $this->input->post('url');
        $path = './assets/img/pengguna/';
        $foto_lama = $this->session->userdata('foto');
        $namafile = "file_" . time();
        $config['upload_path'] = './assets/img/pengguna/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '4048';

        $config['file_name'] = $namafile;
        $this->upload->initialize($config);

        $data = array();
        $id_user = $this->input->post('id_user');
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $data['nama'] = $this->input->post('nama_pengguna');
        $data['foto'] = $this->session->userdata('foto');

        if ($_FILES['foto']['name']) {
            @unlink($path . $foto_lama);
            if ($this->upload->do_upload('foto')) {

                $file = $this->upload->data();
                $data['foto'] = $file['file_name'];
                $res = $this->database->update_pengguna($id_user, $data);
                if ($res) {
                    $sess_data['username'] = $data['username'];
                    $sess_data['nama'] = $data['nama'];
                    $sess_data['password'] = $data['password'];
                    $sess_data['foto'] = $data['foto'];
                    $this->session->set_userdata($sess_data);

                    echo 1;
                }
            } else {
                echo 0;
            }
        } else {
            $res = $this->database->update_pengguna($id_user, $data);
            if ($res) {
                $sess_data['username'] = $data['username'];
                $sess_data['nama'] = $data['nama'];
                $sess_data['password'] = $data['password'];
                $sess_data['foto'] = $data['foto'];
                $this->session->set_userdata($sess_data);

                echo 1;
            } else {
                echo 0;
            }
        }
    }


    public function cetak_laporan() {
        $parameter = $_GET['id_periode_seleksi'];

        $data_seleksi = $this->database->get_periode_spesifik($parameter)->row();
        $hasil_seleksi = $this->database->get_hasil_seleksi($parameter)->result();
//        $this->load->view("laporan", $data);

        $tanggal = tgl_indo(date("Y-m-d"));
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Image(base_url() . "assets/img/logo/upn.png", 20, 12, 20, 0, 'PNG');
        $pdf->Cell(27);
        $pdf->Cell(20, 5, 'KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI', 'C');
        $pdf->Ln();
        $pdf->Cell(65);
        $pdf->Cell(20, 5, 'UPN VETERAN YOGYAKARTA', 'C');
        $pdf->Ln();
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(50);
        $pdf->Cell(20, 5, 'Jl. SWK 104 (Lingkar Utara), Condongcatur, Yogyakarta 55283', 'C');
        $pdf->Line(20, 33, 210 - 20, 33);
        $pdf->Ln();
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(47);
        $pdf->Cell(20, 5, 'Telepon/Faksimile: (0274) 486733 laman: http://www.upnyk.ac.id/', 'C');
        $pdf->Line(20, 33, 210 - 20, 33);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Times', 'BU', 14);
        $pdf->Cell(0, 5, 'HASIL SELEKSI PEMILIHAN KARYAWAN', 0, 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Times', 'I', 14);
        $pdf->Cell(0, 5, "Periode: $data_seleksi->periode_bulan /Sesi: $data_seleksi->sesi", 0, 0, 'C');
//$pdf->Cell(20,5,"Jenis Penawaran:                 /Periode:                  /$tahun",'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Times', 'I', 12);
        $pdf->Cell(0, 5, "Tabel Rangking Hasil Seleksi", 0, 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(8);
        $pdf->Cell(10, 10, 'No', 1, 0, 'C');
        $pdf->Cell(100, 10, 'Nama Karyawan', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Rangking', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Nilai Optimasi', 1, 0, 'C');
        $pdf->Ln();

        $pdf->SetFont('Times', '', 12);
        $no = 1;
        foreach ($hasil_seleksi as $row) {
            $pdf->Cell(8);
            $pdf->Cell(10, 7, $no, 1, 0, 'C');
            $pdf->Cell(100, 7, $row->nama_karyawan, 1, 0, 'C');
            $pdf->Cell(30, 7, $row->rangking, 1, 0, 'C');
            $pdf->Cell(30, 7, $row->nilai_optimasi, 1, 0, 'C');
            $pdf->Ln();
            $no++;
        }


        $pdf->Ln();
        $pdf->Cell(120);
        $pdf->Cell(20, 15, "Yogyakarta,  $tanggal", 'C');
        $pdf->Ln();
        $pdf->Cell(130);
        $pdf->Cell(20, 5, 'Pejabat UPN V YK', 'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(120);
        $pdf->Cell(20, 5, '...............................................', 'C');
        $pdf->Output();


// Centered text in a framed 20*10 mm cell and line break


        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */
    }

}
