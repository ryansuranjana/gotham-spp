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
            }
            return true;
        } else {
            return false;
        }
    }

}