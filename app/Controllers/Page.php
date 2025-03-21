<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        echo "about page";
    }

        public function contact()
    {
        echo "contact page";
    }
        public function faqs()
    {
        echo "Faqs page";
    }

        public function tos()
    {
        echo "Halaman Term of Service";
    }
    
        public function biodata()
    {
        $data = [
            'nama' => 'Bahrudin Rizky R',
            'umur' => 20,
            'alamat' => 'Jombang, Indonesia',
            'status' => 'Mahasiswa Unipdu'
        ];

        return view('biodata', $data);
    }
}