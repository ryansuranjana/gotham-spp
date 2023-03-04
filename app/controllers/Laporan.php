<?php 

class Laporan extends Controller {

    public function __construct()
    {
        $this->middleware('AdminMiddleware');
    }

    public function index($pembayaranId = null) 
    {
        $this->view('pages/report/index', [
            'transaksi' => TransaksiModel::findByPembayaran($pembayaranId)
        ]);
    }

}