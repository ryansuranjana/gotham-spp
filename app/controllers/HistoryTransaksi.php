<?php 

class HistoryTransaksi extends Controller {

    public function __construct()
    {
        $this->middleware('AuthMiddleware');
    }

    public function index()
    {   
        $transaksi = $_SESSION['user']['role'] == 'siswa' ? TransaksiModel::findBySiswa($_SESSION['user']['siswa_id']) : TransaksiModel::get();
        $this->viewWithLayout('pages/history/index', [
            'page_title' => 'History Transaksi',
            'transaksi' => $transaksi,
            'pembayaran' => PembayaranModel::get()
        ]);
    }

}