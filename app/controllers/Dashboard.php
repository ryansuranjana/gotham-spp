<?php 

class Dashboard extends Controller {

    public function __construct()
    {
        $this->middleware('AuthMiddleware');
    }

    public function index()
    {   
        if($_SESSION['user']['role'] == 'siswa') {
            $this->viewWithLayout('pages/dashboard/siswa', [
                'page_title' => 'Dashboard',
                'siswa' => SiswaModel::find($_SESSION['user']['siswa_id'])
            ]);
        } else {
            $this->viewWithLayout('pages/dashboard/index', [
                'page_title' => 'Dashboard',
                'petugasCount' => count(PetugasModel::get()),
                'siswaCount' => count(SiswaModel::get()),
                'transaksiCount' => count(TransaksiModel::get()),
                'kelasCount' => count(KelasModel::get())
            ]);
        }
    }

}