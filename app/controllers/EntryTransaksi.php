<?php 

class EntryTransaksi extends Controller {

    public function __construct()
    {
        $this->middleware('AdminPetugasMiddleware');
    }

    public function index()
    {
        $this->viewWithLayout('pages/transaksi/index', [
            'page_title' => 'Entry Transaksi',
            'siswa' => SiswaModel::get()
        ]);
    }

}