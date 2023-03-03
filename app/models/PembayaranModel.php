<?php 

class PembayaranModel {

    public static function get()
    {
        DB()->query("SELECT * FROM pembayaran");
        return DB()->resultAll();
    }

    public static function create($data)
    {
        DB()->query("INSERT INTO pembayaran (`tahun_ajaran`, `nominal`) VALUES (:tahun_ajaran, :nominal)");
        DB()->bind('tahun_ajaran', $data['tahun_ajaran']);
        DB()->bind('nominal', $data['nominal']);
        DB()->execute();
    }

    public static function find($id)
    {
        DB()->query("SELECT * FROM pembayaran WHERE id=:id");
        DB()->bind('id', $id);
        return DB()->resultSingle();
    }

    public static function update($id, $data)
    {
        DB()->query("UPDATE pembayaran SET tahun_ajaran=:tahun_ajaran, nominal=:nominal WHERE id=:id");
        DB()->bind('tahun_ajaran', $data['tahun_ajaran']);
        DB()->bind('nominal', $data['nominal']);
        DB()->bind('id', $id);
        DB()->execute();
    }

    public static function delete($id)
    {
        DB()->query("DELETE FROM pembayaran WHERE id=:id");
        DB()->bind('id', $id);
        DB()->execute();
    }

}