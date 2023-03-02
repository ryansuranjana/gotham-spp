<?php 

class PetugasModel extends Model {

    public static function get()
    {   
        $db = DB();
        $db->query("SELECT * FROM petugas");
        return $db->resultAll();
    }

}