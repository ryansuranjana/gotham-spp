<?php 

class SiswaModel {

    public static function get()
    {
        DB()->query("SELECT siswa.*, kelas.nama as kelas_nama, kelas.kompetensi_keahlian as kelas_kompetensi_keahlian, pembayaran.tahun_ajaran as pembayaran_tahun_ajaran, pembayaran.nominal as pembayaran_nominal FROM siswa INNER JOIN kelas ON kelas.id=siswa.kelas_id INNER JOIN pembayaran ON pembayaran.id=siswa.pembayaran_id");
        return DB()->resultAll();
    }

    public static function create($data)
    {
        DB()->query("INSERT INTO siswa (`nisn`, `nis`, `nama`, `alamat`, `telepon`, `kelas_id`, `pengguna_id`, `pembayaran_id`) VALUES (:nisn, :nis, :nama, :alamat, :telepon, :kelas_id,
        :pengguna_id, :pembayaran_id)");
        DB()->bind('nisn', $data['nisn']);
        DB()->bind('nis', $data['nis']);
        DB()->bind('nama', $data['nama']);
        DB()->bind('alamat', $data['alamat']);
        DB()->bind('telepon', $data['telepon']);
        DB()->bind('kelas_id', $data['kelas_id']);
        DB()->bind('pengguna_id', $data['pengguna_id']);
        DB()->bind('pembayaran_id', $data['pembayaran_id']);
        DB()->execute();
    }

    public static function find($id)    
    {
        DB()->query("SELECT siswa.*, kelas.nama as kelas_nama, kelas.kompetensi_keahlian as kelas_kompetensi_keahlian, pembayaran.tahun_ajaran as pembayaran_tahun_ajaran, pembayaran.nominal as pembayaran_nominal FROM siswa INNER JOIN kelas ON kelas.id=siswa.kelas_id INNER JOIN pembayaran ON pembayaran.id=siswa.pembayaran_id WHERE siswa.id=:id");
        DB()->bind('id', $id);
        return DB()->resultSingle();
    }

    public static function update($id, $data)
    {
        DB()->query("UPDATE siswa SET nisn=:nisn, nis=:nis, nama=:nama, alamat=:alamat, telepon=:telepon, kelas_id=:kelas_id, pembayaran_id=:pembayaran_id WHERE id=:id");
        DB()->bind('nisn', $data['nisn']);
        DB()->bind('nis', $data['nis']);
        DB()->bind('nama', $data['nama']);
        DB()->bind('alamat', $data['alamat']);
        DB()->bind('telepon', $data['telepon']);
        DB()->bind('kelas_id', $data['kelas_id']);
        DB()->bind('pembayaran_id', $data['pembayaran_id']);
        DB()->bind('id', $id);
        DB()->execute();
    }

    public static function delete($id)
    {
        DB()->query("DELETE FROM siswa WHERE id=:id");
        DB()->bind('id', $id);
        DB()->execute();
    }

    public static function transaksi($id)
    {
        DB()->query("SELECT * FROM transaksi_view WHERE siswa_id=:id");
        DB()->bind('id', $id);
        return DB()->resultAll();
    }

}