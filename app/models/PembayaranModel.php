<?php 

class PembayaranModel {

    public static function get()
    {
        DB()->query("SELECT * FROM pembayaran");
        return DB()->resultAll();
    }

}