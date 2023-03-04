<?php 

class TransaksiModel {

    public static function get()
    {
        DB()->query("SELECT * FROM transaksi_view");
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

}