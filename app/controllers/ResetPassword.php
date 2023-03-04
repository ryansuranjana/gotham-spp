<?php 

class ResetPassword extends Controller {

    public function __construct()
    {
        $this->middleware('AuthMiddleware');
    }

    public function index()
    {
        $this->viewWithLayout('pages/resetpassword/index', [
            'page_title' => 'Reset Password'
        ]);
    }

    public function update()
    {
        $data = $_POST;
        $passwordPengguna = PenggunaModel::find($_SESSION['user']['id'])['password'];

        if(md5($data['old_password']) !== $passwordPengguna) {
            return redirect('/resetpassword', [
                'status' => 'fail',
                'message' => 'Password lama salah!'
            ]);
        }

        try {
            DB()->beginTransaction();

            PenggunaModel::updatePassword($_SESSION['user']['id'], $data['password']);

            DB()->commit();
            return redirect('/resetpassword', [
                'status' => 'success',
                'message' => 'Reset password berhasil!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/resetpassword', [
                'status' => 'fail',
                'message' => 'Reset password gagal!'
            ]);
        }
    }

}