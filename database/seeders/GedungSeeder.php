<?php

namespace Database\Seeders;

use App\Models\Gedung;
use Illuminate\Database\Seeder;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gedung::create([
            'slug' => 'gedung-a',
            'nama_gedung' => 'Gedung A',
        ]);
    }
}
