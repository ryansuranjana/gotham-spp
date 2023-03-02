<?php 

class Kelas extends Controller {

    public function __construct()
    {
        $this->middleware('AdminPetugasMiddleware');
    }

    public function index()
    {
        $data = [
            'page_title' => 'Kelas',
            'kelas' => KelasModel::get()
        ];

        $this->viewWithLayout('pages/kelas/index', $data);
    }

    public function create()
    {
        $data = [
            'page_title' => 'Kelas',
        ];

        $this->viewWithLayout('pages/kelas/form', $data);
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
        $data = [
            'page_title' => 'Kelas',
            'kelas' => KelasModel::find($id)
        ];

        $this->viewWithLayout('pages/kelas/form', $data);
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