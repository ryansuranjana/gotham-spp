<?php 

class KelasModel {

    public static function get()
    {
        DB()->query("SELECT * FROM kelas");
        return DB()->resultAll();
    }

    public static function create($data)
    {   
        DB()->query("INSERT INTO kelas (`nama`, `kompetensi_keahlian`) VALUES (:nama, :kompetensi_keahlian)");
        DB()->bind('nama', $data['nama']);
        DB()->bind('kompetensi_keahlian', $data['kompetensi_keahlian']);
        DB()->execute();
    }

    public static function find($id)
    {
        DB()->query("SELECT * FROM kelas WHERE id=:id");
        DB()->bind('id', $id);
        return DB()->resultSingle();
    }

    public static function update($id, $data)
    {
        DB()->query("UPDATE kelas SET nama=:nama, kompetensi_keahlian=:kompetensi_keahlian WHERE id=:id");
        DB()->bind('nama', $data['nama']);
        DB()->bind('kompetensi_keahlian', $data['kompetensi_keahlian']);
        DB()->bind('id', $id);
        DB()->execute();
    }

    public static function delete($id)
    {
        DB()->query("DELETE FROM kelas WHERE id=:id");
        DB()->bind('id', $id);
        DB()->execute();
    }

}