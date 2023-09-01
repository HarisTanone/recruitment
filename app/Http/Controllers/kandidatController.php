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
            'bahasa' => 'required',
            'extra_skill' => 'nullable',
        ]);

        DB::table('kandidat')->insert($data);

        return response()->json(['message' => 'Data kandidat berhasil disimpan', 'uid' => base64_encode($request->id_cart)], 201);
    }

    public function checkIdCart($idCart)
    {
        $data = DB::table('kandidat')
            ->select(
                'kandidat.id_cart', 'kandidat.nama', 'kandidat.usia', 'kandidat.kelamin',
                'kandidat.phone_number', 'kandidat.email', 'kandidat.alamat', 'kandidat.agama',
                'kandidat.bahasa', 'kandidat.extra_skill',
                'education.universitas', 'education.jurusan', 'education.ipk', 'education.lama_kuliah',
                'work_experience.nama_perusahaan', 'work_experience.posisi', 'work_experience.lama_bekerja'
            )
            ->leftJoin('education', 'kandidat.id', '=', 'education.kandidat_id')
            ->leftJoin('work_experience', 'kandidat.id', '=', 'work_experience.kandidat_id')
            ->where('kandidat.id_cart', $idCart)
            ->first();

        // dd($data);
        if (empty($idCart)) {
            return response()->json(['message' => false], 200);
        } else {
            $existingKandidat = DB::table('kandidat')->where('id_cart', $idCart)->first();
            if (isset($existingKandidat)) {
                $existingEducation = DB::table('education')->where('kandidat_id', $existingKandidat->id)->first();
                $existingExperience = DB::table('work_experience')->where('kandidat_id', $existingKandidat->id)->first();
            }
            return response()->json(['message' => !is_null($existingKandidat) ? true : false], 200);
        }
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
        try {
            // Validasi input
            $request->validate([
                'job_id' => 'required|integer',
                'kandidat_id' => 'required|integer|unique:job_applications,kandidat_id,NULL,id,job_id,' . $request->job_id,
            ], [
                'kandidat_id.unique' => 'You has already applied for this job.',
            ]);

            // Cek apakah sudah ada entri dengan kombinasi job_id dan kandidat_id
            $existingApplication = DB::table('job_applications')
                ->where('job_id', $request->job_id)
                ->where('kandidat_id', $request->kandidat_id)
                ->first();

            if ($existingApplication) {
                return response()->json(['success' => false, 'message' => 'You has already applied for this job.']);
            }

            // Simpan data ke tabel job_applications
            DB::table('job_applications')->insert([
                'job_id' => $request->job_id,
                'kandidat_id' => $request->kandidat_id,
                'application_date' => now(),
            ]);

            return response()->json(['success' => true, 'message' => 'Job application added successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while processing the application']);
        }
    }

}
