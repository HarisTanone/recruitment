<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KandidatController extends Controller
{
    public function insertKandidat(Request $request)
    {
        $data = $request->validate([
            'id_cart' => 'required',
            'nama' => 'required',
            'usia' => 'required|integer',
            'kelamin' => 'required|in:pria,wanita',
            'phone_number' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'agama' => 'required',
            'bahasa_inggris' => 'required|in:Pemula,Menengah,Mahir',
            'extra_skill' => 'nullable',
        ]);

        DB::table('kandidat')->insert($data);

        return response()->json(['message' => 'Data kandidat berhasil disimpan'], 201);
    }

    public function insertEducation(Request $request)
    {
        $data = $request->validate([
            'kandidat_id' => 'required|integer',
            'universitas' => 'required',
            'jurusan' => 'required',
            'ipk' => 'required|numeric|min:0|max:4',
            'lama_kuliah' => 'required|integer|min:0',
        ]);

        DB::table('education')->insert($data);

        return response()->json(['message' => 'Data pendidikan berhasil disimpan'], 201);
    }

    public function insertWorkExperience(Request $request)
    {
        $data = $request->validate([
            'kandidat_id' => 'required|integer',
            'nama_perusahaan' => 'required',
            'posisi' => 'required',
            'lama_bekerja' => 'required|integer|min:0',
        ]);

        DB::table('work_experience')->insert($data);

        return response()->json(['message' => 'Data pengalaman kerja berhasil disimpan'], 201);
    }

    public function insert_job_applications(Request $request)
    {
        // Validasi input
        $request->validate([
            'job_id' => 'required|integer',
            'kandidat_id' => 'required|integer',
        ]);

        // Simpan data ke tabel job_applications
        DB::table('job_applications')->insert([
            'job_id' => $request->job_id,
            'kandidat_id' => $request->kandidat_id,
            'application_date' => now(), // Atau sesuaikan dengan data input yang sesuai
        ]);

        return response()->json(['message' => 'Job application added successfully']);
    }

}
