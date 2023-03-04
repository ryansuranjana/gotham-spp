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

    public function show($id)
    {
        $this->viewWithLayout('pages/transaksi/form', [
            'page_title' => 'Entry Transaksi',
            'siswa' => SiswaModel::find($id),
            'transaksi' => SiswaModel::transaksi($id)
        ]);
    }

    public function store($siswaId, $id)
    {
        try {
            DB()->beginTransaction();

            TransaksiModel::update($id, [
                'tanggal_bayar' => date('Y-m-d H:i:s'),
                'petugas_id' => $_SESSION['user']['petugas_id']
            ]);

            DB()->commit();
            return redirect('/entrytransaksi/show/' . $siswaId, [
                'status' => 'success',
                'message' => 'Transaksi berhasil!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/entrytransaksi/show/' . $siswaId, [
                'status' => 'fail',
                'message' => 'Transaksi gagal!'
            ]);
        }
    }

    public function edit($siswaId, $id)
    {
        try {
            DB()->beginTransaction();

            TransaksiModel::update($id, [
                'tanggal_bayar' => NULL,
                'petugas_id' => NULL
            ]);

            DB()->commit();
            return redirect('/entrytransaksi/show/' . $siswaId, [
                'status' => 'success',
                'message' => 'Transaksi berhasil dibatalkan!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/entrytransaksi/show/' . $siswaId, [
                'status' => 'fail',
                'message' => 'Transaksi gagal dibatalkan!'
            ]);
        }
    }

    public function delete($siswaId, $id)
    {
        try {
            DB()->beginTransaction();

            TransaksiModel::delete($id);

            DB()->commit();
            return redirect('/entrytransaksi/show/' . $siswaId, [
                'status' => 'success',
                'message' => 'Transaksi berhasil dihapus!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/entrytransaksi/show/' . $siswaId, [
                'status' => 'fail',
                'message' => 'Transaksi gagal dihapus!'
            ]);
        }
    }

}