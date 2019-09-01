<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InventoriesTableSeeder::class);
        $this->call(RoomsTableSeeder::class);

        \App\Models\Internship::create([
            'email' => 'internship',
            'username' => 'internship',
            'name'  => 'internship',
            'password' => bcrypt('yangyang' . '1c4o')
        ]);

        \App\Models\Staff::create([
            'email' => 'staff',
            'username' => 'staff',
            'name'  => 'staff',
            'password' => bcrypt('yangyang' . '1c4o')
        ]);

        \App\Models\Lecturer::create([
            'code' => 'L1',
            'nip' => '1',
            'email' => 'lecturer',
            'username' => 'lecturer',
            'name'  => 'lecturer',
            'password' => bcrypt('yangyang' . '1c4o')
        ]);

        \App\Models\Student::create([
            'batch_year'  => '2013',
            'nim'  => '123',
            'name'  => 'student',
            'school_id'  => 4,
            'major_id'  => 5,
            'phone_number' => '081234567890',
            'email' => 'riyaniannisa@gmail.com',
            'username' => 'student',
            'password' => bcrypt('yangyang' . '1c4o')
        ]);

        \App\Models\Prodi::create([
            'email' => 'prodi',
            'username' => 'prodi',
            'name'  => 'prodi',
            'password' => bcrypt('yangyang' . '1c4o')
        ]);

        \App\Models\ProdiPi::create([
            'email' => 'prodi_pi',
            'username' => 'prodi_pi',
            'name'  => 'prodi_pi',
            'password' => bcrypt('yangyang' . '1c4o')
        ]);
    }
}
