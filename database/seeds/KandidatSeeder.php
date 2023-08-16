<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KandidatSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            $kandidatId = DB::table('kandidat')->insertGetId([
                'id_cart' => $faker->numerify('################'),
                'nama' => $faker->name,
                'usia' => $faker->numberBetween(20, 60),
                'kelamin' => $faker->randomElement(['pria', 'wanita']),
                'phone_number' => substr($faker->phoneNumber, 0, 15),
                'email' => $faker->safeEmail,
                'alamat' => $faker->address,
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
                'bahasa_inggris' => $faker->randomElement(['Pemula', 'Menengah', 'Mahir']),
                'extra_skill' => $faker->text,
            ]);

            // Add education data
            DB::table('education')->insert([
                'kandidat_id' => $kandidatId,
                'universitas' => $faker->word,
                'jurusan' => $faker->word,
                'ipk' => $faker->randomFloat(2, 2, 4),
                'lama_kuliah' => $faker->numberBetween(3, 6),
            ]);

            // Add work experience data
            foreach (range(1, $faker->numberBetween(1, 3)) as $experienceIndex) {
                DB::table('work_experience')->insert([
                    'kandidat_id' => $kandidatId,
                    'nama_perusahaan' => $faker->company,
                    'posisi' => $faker->jobTitle,
                    'lama_bekerja' => $faker->numberBetween(1, 10),
                ]);
            }
        }
    }
}
