<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class landingController extends Controller
{
    public function faq_view()
    {
        return view('user/pages/faq-pages');
    }
    public function contact_view()
    {
        return view('user/pages/contact-pages');
    }
    public function about_view()
    {
        return view('user/pages/about-pages');
    }
    public function apply()
    {
        return view('user/pages/apply-pages');
    }

    public function applyView($id)
    {
        $jobData = DB::table('jobs')->where('jobID', $id)->first();
        return view('user/pages/apply-job', ['data' => $jobData]);
    }

    public function faq_index()
    {
        $faqs = DB::table('faq')->where(['status' => 1])->get();
        return response()->json($faqs);
    }

    public function store_contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $contactUs = DB::table('contact_us')->insertGetId([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return response()->json(['message' => 'Contact message created successfully', 'data' => $contactUs]);
    }

    public function storeData(Request $request)
    {
        $personalInfo = $request->input('personalInfo');
        $lastEducation = $request->input('lastEducation');
        $workExperiences = $request->input('workExperience');
        $existingKandidat = DB::table('kandidat')->where('id_cart', $personalInfo['id_cart'])->first();

        if (!$existingKandidat) {
            // Simpan data personal info ke tabel kandidat
            $kandidatId = DB::table('kandidat')->insertGetId([
                'id_cart' => $personalInfo['id_cart'],
                'nama' => $personalInfo['nama'],
                'usia' => $personalInfo['usia'],
                'agama' => $personalInfo['agama'],
                'kelamin' => $personalInfo['kelamin'],
                'phone_number' => $personalInfo['phone_number'],
                'email' => $personalInfo['email'],
                'alamat' => $personalInfo['alamat'],
                'bahasa' => $personalInfo['bahasa'],
                'extra_skill' => $personalInfo['extra_skill'],
            ]);

            // Simpan data pendidikan ke tabel education
            DB::table('education')->insert([
                'kandidat_id' => $kandidatId,
                'universitas' => $lastEducation['universitas'],
                'jurusan' => $lastEducation['jurusan'],
                'ipk' => $lastEducation['ipk'],
                'lama_kuliah' => (int) $lastEducation['tahunLulus'] - (int) $lastEducation['tahunMasuk'],
            ]);

            // Simpan data pengalaman kerja ke tabel work_experience
            foreach ($workExperiences as $workExperience) {
                $tanggalMulai = Carbon::parse($workExperience['tanggal_mulai']);
                $tanggalSelesai = Carbon::parse($workExperience['tanggal_selesai']);
                $tahunLamaBekerja = $tanggalMulai->diffInYears($tanggalSelesai);

                DB::table('work_experience')->insert([
                    'kandidat_id' => $kandidatId,
                    'nama_perusahaan' => $workExperience['nama_perusahaan'],
                    'posisi' => $workExperience['posisi'],
                    'lama_bekerja' => $tahunLamaBekerja,
                ]);
            }
            // $jobId = 123;
            // DB::table('job_applications')->insert([
            //     'job_id' => $jobId,
            //     'kandidat_id' => $kandidatId,
            //     'application_date' => now(),
            // ]);

            return response()->json(['message' => 'Data successfully saved', 'kandidat_id' => $kandidatId]);
        } else {
            return response()->json(['message' => 'ID already exists']);
        }
    }

    public function cekIDCart($id)
    {
        $cekID = DB::table('kandidat')->where('id_cart', $id)->first();
        if (isset($cekID)) {
            $cek_education = DB::table('education')->where('kandidat_id', $cekID->id)->first();
            $cek_work = DB::table('work_experience')->where('kandidat_id', $cekID->id)->get();
            $arr = [
                'education' => json_encode($cek_education),
                'work' => json_encode($cek_work),
                'kandidat_id' => $cekID->id,
                'kandidat' => json_encode($cekID),
            ];
            return response()->json(['message' => 'Data Found ', $arr, 'status' => 200]);
        } else {
            return response()->json(['message' => 'Data Not Found', 'status' => 400]);
        }
    }
}
