<?php 

class TransaksiModel {

    public static function get()
    {
        DB()->query("SELECT * FROM transaksi_view");
        return DB()->resultAll();
    }

}