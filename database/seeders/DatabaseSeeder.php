<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Teacher;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //$this->call(ClassesSeeder::class);//Already Inserted
       //factory(App\Models\Role::class,3)->create();//another syntax
       //Role::factory()->count(3)->create();//Already Inserted
       //Teacher::factory()->count(1)->create();//Already Inserted
       $this->call(CertificateSeeder::class);

    }
}
