<?php 

class HistoryTransaksi extends Controller {

    public function __construct()
    {
        $this->middleware('AuthMiddleware');
    }

    public function index()
    {   
        $this->viewWithLayout('pages/history/index', [
            'page_title' => 'History Transaksi',
            'transaksi' => TransaksiModel::get(),
            'pembayaran' => PembayaranModel::get()
        ]);
    }

}