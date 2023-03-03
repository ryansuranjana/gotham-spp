<?php 

class Spp extends Controller {

    public function __construct()
    {
        $this->middleware('AdminMiddleware');
    }

    public function index()
    {
        $this->viewWithLayout('pages/spp/index', [
            'page_title' => 'SPP Pembayaran',
            'pembayaran' => PembayaranModel::get()
        ]);
    }

    public function create()
    {
        $this->viewWithLayout('pages/spp/form', [
            'page_title' => 'Tambah SPP Pembayaran'
        ]);
    }

    public function store()
    {
        try {
            DB()->beginTransaction();

            PembayaranModel::create($_POST);

            DB()->commit();
            return redirect('/spp', [
                'status' => 'success',
                'message' => 'SPP Pembayaran berhasil ditambahkan!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/spp/create', [
                'status' => 'fail',
                'message' => 'SPP Pembayaran gagal ditambahkan!'
            ]);
        }
    }

    public function edit($id)
    {
        $this->viewWithLayout('pages/spp/form', [
            'page_title' => 'Edit SPP Pembayaran',
            'pembayaran' => PembayaranModel::find($id)
        ]);
    }

    public function update($id)
    {
        try {
            DB()->beginTransaction();

            PembayaranModel::update($id, $_POST);

            DB()->commit();
            return redirect('/spp', [
                'status' => 'success',
                'message' => 'SPP Pembayaran berhasil diedit!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/spp/edit/' . $id, [
                'status' => 'fail',
                'message' => 'SPP Pembayaran gagal diedit!'
            ]);
        }
    }

    public function delete($id)
    {
        try {
            DB()->beginTransaction();

            PembayaranModel::delete($id);

            DB()->commit();
            return redirect('/spp', [
                'status' => 'success',
                'message' => 'SPP Pembayaran berhasil dihapus!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/spp', [
                'status' => 'fail',
                'message' => 'SPP Pembayaran gagal dihapus!'
            ]);
        }
    }

}