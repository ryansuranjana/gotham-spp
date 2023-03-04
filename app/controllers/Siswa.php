<?php 

class Siswa extends Controller {
    
    public function __construct()
    {
        $this->middleware('AdminMiddleware');
    }

    public function index()
    {
        $this->viewWithLayout('pages/siswa/index', [
            'page_title' => 'Siswa',
            'siswa' => SiswaModel::get(),
            'kelas' => KelasModel::get(),
            'spp' => PembayaranModel::get()
        ]);
    }

    public function create()
    {
        $this->viewWithLayout('pages/siswa/form', [
            'page_title' => 'Tambah Siswa',
            'kelas' => KelasModel::get(),
            'spp' => PembayaranModel::get()
        ]);
    }

    public function store()
    {
        try {
            DB()->beginTransaction();

            $data = $_POST;

            PenggunaModel::create([
                'username' => $data['nis'],
                'password' => 'potato',
                'role' => 'siswa',
            ]);
            $penggunaId = DB()->lastInsertId();

            $data['pengguna_id'] = $penggunaId;
            SiswaModel::create($data);
            $siswaId = DB()->lastInsertId();

            if(!TransaksiModel::checkTransaksiexists($siswaId, $data['pembayaran_id'])) {
                $pembayaran = PembayaranModel::find($data['pembayaran_id']);
                TransaksiModel::create($siswaId, [
                    'tahun_dibayar' => $pembayaran['tahun_ajaran'],
                    'pembayaran_id' => $pembayaran['id']
                ]);
            } 

            DB()->commit();
            return redirect('/siswa', [
                'status' => 'success',
                'message' => 'Siswa berhasil ditambahkan!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/siswa/create', [
                'status' => 'fail',
                'message' => 'Siswa gagal ditambahkan!'
            ]);
        }
    }

    public function show($id)
    {   
        $this->viewWithLayout('pages/siswa/show', [
            'page_title' => 'Detail Siswa',
            'siswa' => SiswaModel::find($id)
        ]);
    }

    public function edit($id)
    {
        $this->viewWithLayout('pages/siswa/form', [
            'page_title' => 'Edit Siswa',
            'siswa' => SiswaModel::find($id),
            'kelas' => KelasModel::get(),
            'spp' => PembayaranModel::get()
        ]);
    }

    public function update($id)
    {
        try {
            DB()->beginTransaction();

            $data = $_POST;
            $penggunaId = SiswaModel::find($id)['pengguna_id'];

            PenggunaModel::updateWithoutPassword($penggunaId, [
                'username' => $data['nis'],
                'role' => 'siswa',
            ]);

            SiswaModel::update($id, $data);

            if(!TransaksiModel::checkTransaksiexists($id, $data['pembayaran_id'])) {
                $pembayaran = PembayaranModel::find($data['pembayaran_id']);
                TransaksiModel::create($id, [
                    'tahun_dibayar' => $pembayaran['tahun_ajaran'],
                    'pembayaran_id' => $pembayaran['id']
                ]);
            }

            DB()->commit();
            return redirect('/siswa', [
                'status' => 'success',
                'message' => 'Siswa berhasil diedit!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/siswa/edit/' . $id, [
                'status' => 'fail',
                'message' => 'Siswa gagal diedit!'
            ]);
        }
    }

    public function delete($id)
    {
        try {
            DB()->beginTransaction();

            $penggunaId = SiswaModel::find($id)['pengguna_id'];

            PenggunaModel::delete($penggunaId);

            SiswaModel::delete($id);

            DB()->commit();
            return redirect('/siswa', [
                'status' => 'success',
                'message' => 'Siswa berhasil dihapus!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/siswa', [
                'status' => 'fail',
                'message' => 'Siswa gagal dihapus!'
            ]);
        }
    }

}