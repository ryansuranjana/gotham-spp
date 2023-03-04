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

    public function create($id)
    {
        $this->viewWithLayout('pages/transaksi/form', [
            'page_title' => 'Entry Transaksi',
            'siswa' => SiswaModel::find($id),
            'transaksi' => SiswaModel::transaksi($id)
        ]);
    }

}