<?php 

class PetugasModel {

    public static function get()
    {   
        DB()->query("SELECT * FROM petugas");
        return DB()->resultAll();
    }

}