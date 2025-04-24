<?php

namespace App\Models;
use CodeIgniter\Model;

class MataKuliahModel extends Model
{
    private $matkul = [
        [
            'kode' => 'RPL',
            'nama' => 'REKAYASA PERANGKAT LUNAK',
            'hari' => 'Senin',
            'jam' => '10:15-12:29',
            'sks' => 3,
            'dosen' => 'Muhkamad Masrur, S.Kom.',
            'link_gc' => '-'
        ],
        [
            'kode' => 'SIM',
            'nama' => 'SISTEM INFORMASI MANAJEMEN',
            'hari' => 'Selasa',
            'jam' => '08:00-10:14',
            'sks' => 3,
            'dosen' => 'Eddy Kurniawan, S.Kom, MM',
            'link_gc' => 'https://classroom.google.com/u/0/c/NzU0NTY3MzAzODMw'
        ],
        [
            'kode' => 'MB',
            'nama' => 'MANAJEMEN BASIS DATA',
            'hari' => 'Selasa',
            'jam' => '10:15-12:29',
            'sks' => 3,
            'dosen' => 'Nufan Balafit, S.Kom., M.',
            'link_gc' => 'https://classroom.google.com/u/0/c/NzYwMzY1OTkzMDQ5'
        ],
        [
            'kode' => 'METOPEN',
            'nama' => 'METODOLOGI PENELITIAN SI',
            'hari' => 'Rabu',
            'jam' => '08:00-10:14',
            'sks' => 3,
            'dosen' => 'Yosi Agustiawan., ST., M.T.',
            'link_gc' => 'https://classroom.google.com/u/0/c/NzM4NDk3MTY0NzA5'
        ],
        [
            'kode' => 'PEMWEB',
            'nama' => 'PEMROGRAMAN WEB 2',
            'hari' => 'Rabu',
            'jam' => '10:15-13:15',
            'sks' => 3,
            'dosen' => 'Muhammad Miftakhul Syaikh',
            'link_gc' => 'https://classroom.google.com/u/0/c/NzU2OTUwNDk1Mzgz'
        ],
        [
            'kode' => 'VISUAL',
            'nama' => 'VISUALISASI DATA DAN INFO',
            'hari' => 'Sabtu',
            'jam' => '08:15-10:45',
            'sks' => 3,
            'dosen' => 'Teguh Priyo Utomo. S.Kom',
            'link_gc' => 'https://classroom.google.com/u/0/c/NzUzODk2OTAzNjc1'
        ],
        [
            'kode' => 'JARINGAN',
            'nama' => 'MANAJEMEN JARINGAN KOMPUTER',
            'hari' => 'Sabtu',
            'jam' => '11:00-13:59',
            'sks' => 3,
            'dosen' => 'Mohamad Ail Murahdo, S.K',
            'link_gc' => '-'
        ],
    ];

    public function getAll()
    {
        return $this->matkul;
    }

    public function getByKode($kode)
    {
        foreach ($this->matkul as $mk) {
            if (strtolower($mk['kode']) === strtolower($kode)) {
                return $mk;
            }
        }
        return null;
    }
}
