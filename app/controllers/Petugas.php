<?php 

class Petugas extends Controller {

    public function __construct()
    {
        $this->middleware('AdminMiddleware');
    }

    public function index()
    {
        $this->viewWithLayout('pages/petugas/index', [
            'page_title' => 'Petugas',
            'petugas' => PetugasModel::get()
        ]);
    }

    public function create()
    {
        $this->viewWithLayout('pages/petugas/form', [
            'page_title' => 'Petugas',
        ]);
    }

    public function store()
    {
        try {
            DB()->beginTransaction();

            $data = $_POST;

            PenggunaModel::create([
                'username' => $data['nama'],
                'password' => $data['password'],
                'role' => isset($data['role']) ? 'admin' : 'petugas'
            ]);
            $penggunaId = DB()->lastInsertId();

            $data['pengguna_id'] = $penggunaId;
            PetugasModel::create($data);

            DB()->commit();
            return redirect('/petugas', [
                'status' => 'success',
                'message' => 'Petugas berhasil ditambahkan!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/petugas/create', [
                'status' => 'fail',
                'message' => 'Petugas gagal ditambahkan!'
            ]);
        }
    }

    public function edit($id)
    {
        $this->viewWithLayout('pages/petugas/form', [
            'page_title' => 'Petugas',
            'petugas' => PetugasModel::find($id)
        ]);
    }

    public function update($id)
    {
        try {
            DB()->beginTransaction();

            $data = $_POST;

            $penggunaId = PetugasModel::find($id)['pengguna_id'];

            if(empty($data['password'])) {
                PenggunaModel::updateWithoutPassword($penggunaId, [
                    'username' => $data['nama'],
                    'role' => isset($data['role']) ? 'admin' : 'petugas'
                ]);
            } else {
                PenggunaModel::update($penggunaId, [
                    'username' => $data['nama'],
                    'password' => $data['password'],
                    'role' => isset($data['role']) ? 'admin' : 'petugas'
                ]);
            }

            PetugasModel::update($id, $data);

            DB()->commit();
            return redirect('/petugas', [
                'status' => 'success',
                'message' => 'Petugas berhasil diedit!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/petugas/edit/' . $id, [
                'status' => 'fail',
                'message' => 'Petugas gagal diedit!'
            ]);
        }
    }

    public function delete($id)
    {
        try {
            DB()->beginTransaction();

            PetugasModel::delete($id);

            DB()->commit();
            return redirect('/petugas', [
                'status' => 'success',
                'message' => 'Petugas berhasil dihapus!'
            ]); 
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/petugas', [
                'status' => 'fail',
                'message' => 'Petugas gagal dihapus!'
            ]); 
        }
    }

}