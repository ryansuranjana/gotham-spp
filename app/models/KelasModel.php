<?php 

class KelasModel extends Model {

    public static function get()
    {
        $db = DB();

        $db->query("SELECT * FROM kelas");
        return $db->resultAll();
    }

}