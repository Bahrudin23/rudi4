<?php

namespace App\Controllers;

use App\Models\PenulisModel;

class Penulis extends BaseController
{
    protected $penulisModel;

    public function __construct()
    {
        $this->penulisModel = new PenulisModel();
    }

    public function index()
    {
        $kataKunci = $this->request->getVar('keyword');
        $pageSekarang = $this->request->getVar('page_penulis') ?? 1;

        if ($kataKunci) {
            $penulis = $this->penulisModel->like('name', $kataKunci)->orLike('address', $kataKunci);
        } else {
            $penulis = $this->penulisModel;
        }

        $data = [
            'title'        => 'Daftar Penulis',
            'penulis'      => $penulis->paginate(10, 'penulis'),
            'pager'        => $this->penulisModel->pager,
            'pageSekarang' => $pageSekarang,
            'keyword'      => $kataKunci
        ];

        return view('penulis/index', $data);
    }

    public function detail($id)
    {
        $penulis = $this->penulisModel->find($id);

        if (!$penulis) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Penulis dengan ID $id tidak ditemukan.");
        }

        return view('penulis/detail', [
            'title' => 'Detail Penulis',
            'penulis' => $penulis
        ]);
    }
    
}