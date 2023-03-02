<?php 

class Dashboard extends Controller {

    public function __construct()
    {
        $this->middleware('AuthMiddleware');
    }

    public function index()
    {
        $data = [
            'page_title' => 'Dashboard',
            'petugasCount' => count(PetugasModel::get()),
            'siswaCount' => count(SiswaModel::get()),
            'transaksiCount' => count(TransaksiModel::get()),
            'kelasCount' => count(KelasModel::get())
        ];

        $this->viewWithLayout('/pages/dashboard/index', $data);
    }

}