<?php 

class PenggunaModel {

    public function login($data)
    {
        DB()->query("SELECT * FROM pengguna WHERE username=:username AND password=:password");
        DB()->bind('username', $data['username']);
        DB()->bind('password', md5($data['password']));
        $pengguna = DB()->resultSingle();

        if($pengguna) {
            $_SESSION['login'] = true;
            unset($pengguna['password']);
            $_SESSION['user'] = $pengguna;
            if($pengguna['role'] == 'siswa') {
                DB()->query("SELECT * FROM siswa WHERE pengguna_id=:pengguna_id");
                DB()->bind('pengguna_id', $pengguna['id']);
                $_SESSION['user']['nama'] = DB()->resultSingle()['nama'];
            } else {
                DB()->query("SELECT * FROM petugas WHERE pengguna_id=:pengguna_id");
                DB()->bind('pengguna_id', $pengguna['id']);
                $_SESSION['user']['petugas_id'] = DB()->resultSingle()['id'];
            }
            return true;
        } else {
            return false;
        }
    }

    public static function create($data)
    {
        DB()->query("INSERT INTO pengguna (`username`, `password`, `role`) VALUES (:username, :password, :role)");
        DB()->bind('username', $data['username']);
        DB()->bind('password', md5($data['password']));
        DB()->bind('role', $data['role']);
        DB()->execute();
    }

    public static function find($id)
    {
        DB()->query("SELECT * FROM pengguna WHERE id=:id");
        DB()->bind('id', $id);
        return DB()->resultSingle();
    }

    public static function update($id, $data)
    {
        DB()->query("UPDATE pengguna SET username=:username, password=:password, role=:role WHERE id=:id");
        DB()->bind('username', $data['username']);
        DB()->bind('password', md5($data['password']));
        DB()->bind('role', $data['role']);
        DB()->bind('id', $id);
        DB()->execute();
    }

    public static function updateWithoutPassword($id, $data)
    {
        DB()->query("UPDATE pengguna SET username=:username, role=:role WHERE id=:id");
        DB()->bind('username', $data['username']);
        DB()->bind('role', $data['role']);
        DB()->bind('id', $id);
        DB()->execute();
    }

    public static function delete($id)
    {
        DB()->query("DELETE FROM pengguna WHERE id=:id");
        DB()->bind('id', $id);
        DB()->execute();
    }

}