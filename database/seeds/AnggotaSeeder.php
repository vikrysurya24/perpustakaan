<?php

use App\Anggota;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $faker = Faker\Factory::create();
            $sex = 'LP';
            $anggota = new Anggota;
            $anggota->name = $faker->name;
            $anggota->sex = 'P';
            $anggota->telp = $faker->e164PhoneNumber;
            $anggota->alamat = $faker->streetAddress;
            $anggota->email = $faker->freeEmail;

            $anggota->save();
        }
    }
}
