<?php 

class TransaksiModel {

    public static function get()
    {
        DB()->query("SELECT * FROM transaksi_view WHERE tanggal_bayar IS NOT NULL");
        return DB()->resultAll();
    }

    public static function findByPembayaran($pembayaranId)
    {
        DB()->query("SELECT * FROM transaksi_view WHERE pembayaran_id=:pembayaran_id AND tanggal_bayar IS NOT NULL ORDER BY id");
        DB()->bind('pembayaran_id', $pembayaranId);
        return DB()->resultAll();
    }

    public static function create($siswa_id, $pembayaran) 
    {
        $tahun_dibayar = $pembayaran['tahun_dibayar'];
        $tahun_dibayar1 = explode('/', $tahun_dibayar)[0];
        $tahun_dibayar2 = explode('/', $tahun_dibayar)[1];

        for ($i=7; $i <= 12; $i++) { 
            DB()->query("INSERT INTO transaksi (`bulan_dibayar`, `tahun_dibayar`, `siswa_id`, `pembayaran_id`) VALUES (:bulan_dibayar, :tahun_dibayar, :siswa_id, :pembayaran_id)");
            DB()->bind('bulan_dibayar', $i);
            DB()->bind('tahun_dibayar', $tahun_dibayar1);
            DB()->bind('siswa_id', $siswa_id);
            DB()->bind('pembayaran_id', $pembayaran['pembayaran_id']);
            DB()->execute();
        }

        for ($i=1; $i <= 6; $i++) { 
            DB()->query("INSERT INTO transaksi (`bulan_dibayar`, `tahun_dibayar`, `siswa_id`, `pembayaran_id`) VALUES (:bulan_dibayar, :tahun_dibayar, :siswa_id, :pembayaran_id)");
            DB()->bind('bulan_dibayar', $i);
            DB()->bind('tahun_dibayar', $tahun_dibayar2);
            DB()->bind('siswa_id', $siswa_id);
            DB()->bind('pembayaran_id', $pembayaran['pembayaran_id']);
            DB()->execute();
        }
    }

    public static function update($id, $data)
    {
        DB()->query("UPDATE transaksi SET tanggal_bayar=:tanggal_bayar, petugas_id=:petugas_id WHERE id=:id");
        DB()->bind('tanggal_bayar', $data['tanggal_bayar']);
        DB()->bind('petugas_id', $data['petugas_id']);
        DB()->bind('id', $id);
        DB()->execute();
    }

    public static function checkTransaksiexists($siswa_id, $pembayaran_id)
    {
        DB()->query("SELECT * FROM transaksi WHERE siswa_id=:siswa_id AND pembayaran_id=:pembayaran_id");
        DB()->bind('siswa_id', $siswa_id);
        DB()->bind('pembayaran_id', $pembayaran_id);
        $transaksi = DB()->resultAll();

        if(!empty($transaksi)) {
            return true;
        } else {
            return false;
        }
    }

    public static function delete($id)
    {
        DB()->query("DELETE FROM transaksi WHERE id=:id");
        DB()->bind('id', $id);
        DB()->execute();
    }   

}