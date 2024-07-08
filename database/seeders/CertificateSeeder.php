<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $certificates = [
            'Certified Special Education Teacher (CSET)',
            'Child Development Associate (CDA)',
            'National Certified School Counselor (NCSC)',
            'Google for Education Certified Trainer',
            'TESOL Core Certificate Program'
        ];
        foreach($certificates as $certificate){
            DB::table('certificates')->insert([
                'certificates_name' =>$certificate,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
