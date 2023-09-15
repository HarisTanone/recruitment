<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class exportJobExcel implements FromCollection, WithHeadings
{
    protected $applicants;

    public function __construct($applicants)
    {
        $this->applicants = $applicants;
    }

    public function collection()
    {
        // Mengambil data dari koleksi (dalam hal ini, $applicants)
        return collect($this->applicants)->map(function ($applicant) {
            return [
                $applicant->id_cart,
                $applicant->nama,
                $applicant->usia,
                $applicant->kelamin,
                $applicant->phone_number,
                $applicant->email,
                $applicant->alamat,
                $applicant->agama,
                $applicant->bahasa,
                $applicant->extra_skill,
                $applicant->universitas,
                $applicant->jurusan,
                $applicant->ipk,
                $applicant->lama_kuliah,
                $applicant->nama_perusahaan,
                $applicant->posisi,
                $applicant->lama_bekerja,
            ];
        });
    }

    public function headings(): array
    {
        // Menentukan header kolom
        return [
            'ID Cart',
            'Nama',
            'Usia',
            'Jenis Kelamin',
            'Telepon',
            'Email',
            'Alamat',
            'Agama',
            'Bahasa',
            'Skill',
            'Universitas',
            'Jurusan',
            'Ipk',
            'Lama Kuliah',
            'Nama Perusahaan',
            'Posisi',
            'Lama Bekerja',
        ];
    }
}
