<?php 

class SiswaModel extends Model {

    public static function get()
    {
        $db = DB();
        $db->query("SELECT * FROM siswa");
        return $db->resultAll();
    }

}