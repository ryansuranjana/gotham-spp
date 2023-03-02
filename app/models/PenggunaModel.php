<?php 

class PenggunaModel extends Model {

    public function login($data)
    {
        $this->db->query("SELECT * FROM pengguna WHERE username=:username AND password=:password");
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password']));
        $pengguna = $this->db->resultSingle();

        if($pengguna) {
            $_SESSION['login'] = true;
            unset($pengguna['password']);
            $_SESSION['user'] = $pengguna;
            if($pengguna['role'] == 'siswa') {
                $this->db->query("SELECT * FROM siswa WHERE pengguna_id=:pengguna_id");
                $this->db->bind('pengguna_id', $pengguna['id']);
                $_SESSION['user']['nama'] = $this->db->resultSingle()['nama'];
            }
            return true;
        } else {
            return false;
        }
    }

}