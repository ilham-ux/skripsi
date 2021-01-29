<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class database extends CI_Model {

    function login($username, $password) {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $this->db->where("status_aktif", "Aktif");
        return $this->db->get("user");
    }

    function get_pengguna() {
        $this->db->where('level', "User");
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('user');
    }

    function get_cabang() {
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('cabang');
    }

    function get_departemen() {
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('departemen');
    }

    function get_jabatan() {
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('jabatan');
    }

    function get_karyawan() {
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('karyawan');
    }

    function get_karyawan_belum_menang_setahun() {
        $tahun = date("Y");
        return $this->db->query("select * from karyawan where id_karyawan not in (select ak.id_karyawan FROM rangking_moora rm inner join alternatif_karyawan ak on rm.id_alternatif_karyawan=ak.id_alternatif_karyawan inner join periode_seleksi ps on rm.id_periode_seleksi=ps.id_periode_seleksi where rm.rangking=1 and ps.periode_bulan like '%$tahun%') and status_aktif = 'Aktif'");
    }

    function get_karyawan_lengkap() {
        return $this->db->query("select a.*, b.nama_departemen, c.nama_jabatan from karyawan a inner join departemen b on a.departemen=b.id_departemen inner join jabatan c on a.jabatan=c.id_jabatan where a.status_aktif='Aktif'");
    }

    function get_detail_karyawan($id_karyawan) {
        return $this->db->query("select a.*,b.nama_departemen as n_departemen,c.nama_jabatan as n_jabatan,d.nama_cabang as n_cabang FROM karyawan a inner join departemen b on a.departemen=b.id_departemen inner join jabatan c on a.jabatan=c.id_jabatan inner join cabang d on a.cabang=d.id_cabang where a.id_karyawan='$id_karyawan' and a.status_aktif='Aktif'");
    }

    function get_kriteria() {
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('kriteria');
    }

    function get_kriteria_spesifik($id_kriteria) {
        $this->db->where("id_kriteria", $id_kriteria);
        return $this->db->get("kriteria");
    }

    function get_normalisasi($id_kriteria) {
        return $this->db->query("select a.*,b.nama_kriteria FROM normalisasi_kriteria a inner join kriteria b on a.id_kriteria=b.id_kriteria where a.id_kriteria='$id_kriteria' and a.status_aktif='Aktif'");
    }

    function get_normalisasi_spesifik($id_kriteria) {
        $this->db->where('status_aktif', "Aktif");
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->get('normalisasi_kriteria');
    }

    function get_periode() {
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('periode_seleksi');
    }

    function get_periode_proses() {
        $this->db->where('status_aktif', "Aktif");
        $this->db->where('status', "Proses");
        return $this->db->get('periode_seleksi');
    }

    function get_periode_spesifik($id_periode_seleksi) {
        $this->db->where('id_periode_seleksi', $id_periode_seleksi);
        return $this->db->get('periode_seleksi');
    }

    function get_alternatif_karyawan($id_periode) {
        return $this->db->query("select a.*, b.periode_bulan as pb, b. sesi as ses from alternatif_karyawan a inner join periode_seleksi b on a.id_periode_seleksi=b.id_periode_seleksi where a.id_periode_seleksi = '$id_periode'");
    }

    function get_alternatif_aktif($id_periode) {
        $this->db->where('status_aktif', "Aktif");
        $this->db->where('id_periode_seleksi', $id_periode);
        return $this->db->get('alternatif_karyawan');
    }

    function get_alternatif_spesifik($id_periode_seleksi, $id_alternatif) {
        $this->db->where("id_periode_seleksi", $id_periode_seleksi);
        $this->db->where("id_alternatif_karyawan", $id_alternatif);
        return $this->db->get("alternatif_karyawan");
    }

    function get_edit_nilai_alternatif($id_periode_seleksi, $id_alternatif) {
        return $this->db->query("select a.*, b.nama_kriteria as namkri from nilai_alternatif_karyawan a inner join kriteria b on a.id_kriteria=b.id_kriteria where a.id_periode_seleksi='$id_periode_seleksi' and a.id_alternatif_karyawan='$id_alternatif'");
    }

    function get_nilai_alternatif($id_periode_seleksi) {
        return $this->db->query("select id_alternatif_karyawan from nilai_alternatif_karyawan where id_periode_seleksi='$id_periode_seleksi' group by id_alternatif_karyawan");
    }

    function get_nilai($id_periode_seleksi, $id_alternatif) {
        $this->db->where('id_periode_seleksi', $id_periode_seleksi);
        $this->db->where('id_alternatif_karyawan', $id_alternatif);
        return $this->db->get("nilai_alternatif_karyawan");
    }

    function get_data_kriteria($id_kriteria) {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get("kriteria");
    }

    function get_periode_selesai() {
        $this->db->where('status_aktif', "Aktif");
        $this->db->where('status', "Selesai");
        return $this->db->get('periode_seleksi');
    }

    function get_hasil_seleksi($id_periode_seleksi) {
        return $this->db->query("select b.nama_karyawan, a.* from rangking_moora a inner join alternatif_karyawan b on a.id_alternatif_karyawan=b.id_alternatif_karyawan where a.id_periode_seleksi='$id_periode_seleksi' order by a.rangking");
    }

    function add_pengguna($data) {
        return $this->db->insert('user', $data);
    }

    function add_cabang($data) {
        return $this->db->insert('cabang', $data);
    }

    function add_departemen($data) {
        return $this->db->insert('departemen', $data);
    }

    function add_jabatan($data) {
        return $this->db->insert('jabatan', $data);
    }

    function add_karyawan($data) {
        return $this->db->insert('karyawan', $data);
    }

    function add_kriteria($data) {
        return $this->db->insert('kriteria', $data);
    }

    function add_normalisasi($data) {
        return $this->db->insert('normalisasi_kriteria', $data);
    }

    function add_periode($data) {
        $this->db->insert('periode_seleksi', $data);
        return $this->db->insert_id();
    }

    function add_alternatif_karyawan($data) {
        return $this->db->insert('alternatif_karyawan', $data);
    }

    function add_nilai_alternatif($data) {
        return $this->db->insert('nilai_alternatif_karyawan', $data);
    }

    function add_rangking_moora($data) {
        return $r = $this->db->insert('rangking_moora', $data);
    }

    function update_pengguna($id_user, $data) {
        $this->db->where('id_user', $id_user);
        return $this->db->update('user', $data);
    }

    function update_cabang($id_cabang, $data) {
        $this->db->where('id_cabang', $id_cabang);
        return $this->db->update('cabang', $data);
    }

    function update_departemen($id_departemen, $data) {
        $this->db->where('id_departemen', $id_departemen);
        return $this->db->update('departemen', $data);
    }

    function update_jabatan($id_jabatan, $data) {
        $this->db->where('id_jabatan', $id_jabatan);
        return $this->db->update('jabatan', $data);
    }

    function update_karyawan($id_karyawan, $data) {
        $this->db->where('id_karyawan', $id_karyawan);
        return $this->db->update('karyawan', $data);
    }

    function update_kriteria($id_kriteria, $data) {
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->update('kriteria', $data);
    }

    function update_bobot($id_kriteria, $bobot) {
        $this->db->set('bobot', "$bobot");
        $this->db->where('id_kriteria', "$id_kriteria");
        return $this->db->update('kriteria');
    }

    function update_normalisasi($id_normalisasi, $data) {
        $this->db->where('id_normalisasi', $id_normalisasi);
        return $this->db->update('normalisasi_kriteria', $data);
    }

    function update_status_alternatif($id_alternatif, $data) {
        $this->db->where('id_alternatif_karyawan', "$id_alternatif");
        return $this->db->update('alternatif_karyawan', $data);
    }

    function update_nilai_alternatif($id_nilai_alternatif, $data) {
        $this->db->where('id_nilai', $id_nilai_alternatif);
        return $this->db->update('nilai_alternatif_karyawan', $data);
    }

    function update_periode($id_periode_seleksi, $data) {
        $this->db->where('id_periode_seleksi', $id_periode_seleksi);
        return $this->db->update('periode_seleksi', $data);
    }

    function hapus_pengguna($id_hapus, $data) {
        $this->db->where('id_user', $id_hapus);
        return $this->db->update('user', $data);
    }

    function hapus_cabang($id_hapus, $data) {
        $this->db->where('id_cabang', $id_hapus);
        return $this->db->update('cabang', $data);
    }

    function hapus_departemen($id_hapus, $data) {
        $this->db->where('id_departemen', $id_hapus);
        return $this->db->update('departemen', $data);
    }

    function hapus_jabatan($id_hapus, $data) {
        $this->db->where('id_jabatan', $id_hapus);
        return $this->db->update('jabatan', $data);
    }

    function hapus_karyawan($id_hapus, $data) {
        $this->db->where('id_karyawan', $id_hapus);
        return $this->db->update('karyawan', $data);
    }

    function hapus_kriteria($id_hapus, $data) {
        $this->db->where('id_kriteria', $id_hapus);
        return $this->db->update('kriteria', $data);
    }

    function hapus_normalisasi($id_hapus, $data) {
        $this->db->where('id_normalisasi', $id_hapus);
        return $this->db->update('normalisasi_kriteria', $data);
    }

    function hapus_periode($id_hapus, $data) {
        $this->db->where('id_periode_seleksi', $id_hapus);
        return $this->db->update('periode_seleksi', $data);
    }

    function hapus_alternatif($id_hapus, $data) {
        $this->db->where('id_periode_seleksi', $id_hapus);
        return $this->db->update('alternatif_karyawan', $data);
    }

    function check_username($username) {
        $this->db->where('username', $username);
        $this->db->where('level', "User");
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('user');
    }

    function check_cabang($cabang) {
        $this->db->where('nama_cabang', $cabang);
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('cabang');
    }

    function check_departemen($departemen) {
        $this->db->where('nama_departemen', $departemen);
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('departemen');
    }

    function check_jabatan($jabatan) {
        $this->db->where('nama_jabatan', $jabatan);
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('jabatan');
    }

    function check_nik($nik) {
        $this->db->where('nik_karyawan', $nik);
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('karyawan');
    }

    function check_keterangan($id_kriteria, $keterangan) {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->where('keterangan', $keterangan);
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('normalisasi_kriteria');
    }

    function check_nilai($id_kriteria, $nilai) {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->where('nilai', $nilai);
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('normalisasi_kriteria');
    }

    function cek_periode_jumlah($bulan_tahun) {
        $this->db->where('periode_bulan', $bulan_tahun);
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('periode_seleksi');
    }

    function cek_periode_proses($bulan_tahun) {
        $this->db->where('periode_bulan', $bulan_tahun);
        $this->db->where('status', "Proses");
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('periode_seleksi');
    }

    function cek_periode_max($bulan_tahun) {
        $this->db->select('max(sesi) as sesi_max');
        $this->db->where('periode_bulan', $bulan_tahun);
        $this->db->where('status_aktif', "Aktif");
        return $this->db->get('periode_seleksi');
    }

    function statistik_jenkel($jenkel) {
        $this->db->where('jenis_kelamin =', "$jenkel");
        $this->db->where('status_aktif =', 'Aktif');
        $r = $this->db->get('karyawan');
        $q = $r->num_rows();
        return $q;
    }

    function statistik_nikah($nikah) {
        $this->db->where('status_perkawinan =', "$nikah");
        $this->db->where('status_aktif =', 'Aktif');
        $r = $this->db->get('karyawan');
        $q = $r->num_rows();
        return $q;
    }

}
