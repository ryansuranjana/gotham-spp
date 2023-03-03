<?php 

class PetugasModel {

    public static function get()
    {   
        DB()->query("SELECT petugas.*, pengguna.role as pengguna_role FROM petugas INNER JOIN pengguna ON pengguna.id=petugas.pengguna_id");
        return DB()->resultAll();
    }

    public static function create($data)
    {
        DB()->query("INSERT INTO petugas (`nama`, `pengguna_id`) VALUES (:nama, :pengguna_id)");
        DB()->bind('nama', $data['nama']);
        DB()->bind('pengguna_id', $data['pengguna_id']);
        DB()->execute();
    }

    public static function find($id)
    {
        DB()->query("SELECT petugas.*, pengguna.role as pengguna_role FROM petugas INNER JOIN pengguna ON pengguna.id=petugas.pengguna_id WHERE petugas.id=:id");
        DB()->bind('id', $id);
        return DB()->resultSingle();
    }

    public static function update($id, $data)
    {
        DB()->query("UPDATE petugas SET nama=:nama WHERE id=:id");
        DB()->bind('nama', $data['nama']);
        DB()->bind('id', $id);
        DB()->execute();
    }

    public static function delete($id)
    {
        DB()->query("DELETE FROM petugas WHERE id=:id");
        DB()->bind('id', $id);
        DB()->execute();
    }

}