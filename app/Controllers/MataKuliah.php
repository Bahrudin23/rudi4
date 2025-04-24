<?php

namespace App\Controllers;
use App\Models\MataKuliahModel;

class MataKuliah extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new MataKuliahModel();
    }

    public function profil()
    {
        $data['mata_kuliah'] = $this->model->getAll();
        return view('profil', $data);
    }

    public function detail($kode)
    {
        $data['matkul'] = $this->model->getByKode($kode);
        return view('detail_matkul', $data);
    }
    
    public function contact()
    {
        return view('contact');
    }
}
