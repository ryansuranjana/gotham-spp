<?php 

class TransaksiModel extends Model {

    public static function get()
    {
        $db = DB();
        $db->query("SELECT * FROM transaksi_view");
        return $db->resultAll();
    }

}