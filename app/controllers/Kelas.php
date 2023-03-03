<?php 

class Kelas extends Controller {

    public function __construct()
    {
        $this->middleware('AdminPetugasMiddleware');
    }

    public function index()
    {
        $this->viewWithLayout('pages/kelas/index', [
            'page_title' => 'Kelas',
            'kelas' => KelasModel::get()
        ]);
    }

    public function create()
    {
        $this->viewWithLayout('pages/kelas/form', [
            'page_title' => 'Tambah Kelas',
        ]);
    }

    public function store()
    {
        try {   
            DB()->beginTransaction();

            KelasModel::create($_POST);

            DB()->commit();
            return redirect('/kelas', [
                'status' => 'success',
                'message' => 'Kelas berhasil ditambahkan!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/kelas/create', [
                'status' => 'fail',
                'message' => 'Kelas gagal ditambahkan!'
            ]);
        }
    }

    public function edit($id)
    {
        $this->viewWithLayout('pages/kelas/form', [
            'page_title' => 'Edit Kelas',
            'kelas' => KelasModel::find($id)
        ]);
    }

    public function update($id)
    {
        try {   
            DB()->beginTransaction();

            KelasModel::update($id, $_POST);

            DB()->commit();
            return redirect('/kelas', [
                'status' => 'success',
                'message' => 'Kelas berhasil diedit!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/kelas/edit/' . $id, [
                'status' => 'fail',
                'message' => 'Kelas gagal diedit!'
            ]);
        }
    }

    public function delete($id)
    {
        try {   
            DB()->beginTransaction();

            KelasModel::delete($id);

            DB()->commit();
            return redirect('/kelas', [
                'status' => 'success',
                'message' => 'Kelas berhasil dihapus!'
            ]);
        } catch (PDOException $e) {
            DB()->rollBack();
            return redirect('/kelas', [
                'status' => 'fail', 
                'message' => 'Kelas gagal dihapus!'
            ]);
        }
    }

}