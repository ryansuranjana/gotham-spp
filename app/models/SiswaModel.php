<?php 

class SiswaModel {

    public static function get()
    {
        DB()->query("SELECT * FROM siswa");
        return DB()->resultAll();
    }

}