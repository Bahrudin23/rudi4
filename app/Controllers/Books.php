<?php namespace App\Controllers;

use App\Models\BooksModel;

class Books extends BaseController
{
    protected $booksModel;

    public function __construct()
    {
        $this->booksModel = new BooksModel();
        helper('form');
        session();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'books' => $this->booksModel->findAll()
        ];

        return view('books/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Buku',
            'validation' => \Config\Services::validation()
        ];
        return view('books/create', $data);
    }

    public function save()
    {
        // Validasi input lengkap
        $rules = [
            'judul' => 'required|is_unique[books.judul]',
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' => [
                'uploaded[sampul]',
                'mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'max_size[sampul,2048]',
            ],
        ];

        if(!$this->validate($rules)) {
            return redirect()->to('/books/create')->withInput()->with('validation', $this->validator);
        }

        // Cek kombinasi penulis dan penerbit unik
        $penulis = $this->request->getVar('penulis');
        $penerbit = $this->request->getVar('penerbit');
        $cekDuplikat = $this->booksModel->where('penulis', $penulis)->where('penerbit', $penerbit)->first();
        if($cekDuplikat){
            session()->setFlashdata('error', 'Kombinasi Penulis dan Penerbit sudah ada.');
            return redirect()->to('/books/create')->withInput();
        }

        // Upload file gambar sampul
        $fileSampul = $this->request->getFile('sampul');
        $namaSampul = $fileSampul->getRandomName();
        $fileSampul->move('uploads', $namaSampul);

        // Generate slug
        $slug = url_title($this->request->getVar('judul'), '-', true);

        // Simpan data
        $this->booksModel->save([
            'judul' => $this->request->getVar('judul'),
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'sampul' => $namaSampul,
            'slug' => $slug
        ]);

        session()->setFlashdata('pesan', 'Data buku berhasil disimpan.');
        return redirect()->to('/books');
    }

    public function detail($slug)
    {
        $book = $this->booksModel->where('slug', $slug)->first();

        if(!$book) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Buku',
            'book' => $book
        ];

        return view('books/detail', $data);
    }

    public function delete($id)
    {
        $book = $this->booksModel->find($id);
        if($book && $book['sampul'] && file_exists('uploads/'.$book['sampul'])){
            unlink('uploads/'.$book['sampul']); // hapus file gambar lama
        }
        $this->booksModel->delete($id);

        session()->setFlashdata('pesan', 'Data buku berhasil dihapus.');
        return redirect()->to('/books');
    }

    public function edit($slug)
    {
        $book = $this->booksModel->where('slug', $slug)->first();

        if(!$book) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Buku',
            'validation' => \Config\Services::validation(),
            'book' => $book
        ];

        return view('books/edit', $data);
    }

    public function update($id)
    {
        $oldBook = $this->booksModel->find($id);
        $judulLama = $oldBook['judul'];
        $judulBaru = $this->request->getVar('judul');

        if($judulLama == $judulBaru) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[books.judul]';
        }

        // Validasi
        $rules = [
            'judul' => $rule_judul,
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' => [
                'mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'max_size[sampul,2048]'
            ],
        ];

        if(!$this->validate($rules)) {
            return redirect()->to('/books/edit/'.$this->request->getVar('slug'))->withInput()->with('validation', $this->validator);
        }

        // Validasi kombinasi penulis dan penerbit unik kecuali data ini sendiri
        $penulis = $this->request->getVar('penulis');
        $penerbit = $this->request->getVar('penerbit');
        $cekDuplikat = $this->booksModel
            ->where('penulis', $penulis)
            ->where('penerbit', $penerbit)
            ->where('id !=', $id)
            ->first();
        if($cekDuplikat){
            session()->setFlashdata('error', 'Kombinasi Penulis dan Penerbit sudah ada.');
            return redirect()->to('/books/edit/'.$this->request->getVar('slug'))->withInput();
        }

        // Upload gambar baru jika ada
        $fileSampul = $this->request->getFile('sampul');
        if($fileSampul && $fileSampul->isValid() && !$fileSampul->hasMoved()){
            // hapus file lama
            if($oldBook['sampul'] && file_exists('uploads/'.$oldBook['sampul'])){
                unlink('uploads/'.$oldBook['sampul']);
            }
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('uploads', $namaSampul);
        } else {
            $namaSampul = $oldBook['sampul'];
        }

        $slug = url_title($judulBaru, '-', true);

        $this->booksModel->save([
            'id' => $id,
            'judul' => $judulBaru,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'sampul' => $namaSampul,
            'slug' => $slug
        ]);

        session()->setFlashdata('pesan', 'Data buku berhasil diupdate.');
        return redirect()->to('/books');
    }
}