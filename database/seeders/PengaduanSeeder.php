<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengaduan::create([
            // 'no_pengaduan'  => 'A-' . date('ymdhis') . mt_rand(2, 100),
            'no_pengaduan'  => 'A-22062511372469',
            'judul'         => 'lantai retak',
            'user_id'       => 2,
            'gedung_id'   => 1,
            'isi'           => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, veniam debitis voluptatem error commodi atque dolorum cum magni. Quod ab dolor itaque delectus eveniet suscipit rerum, voluptas, sed iusto reprehenderit odit, quae praesentium accusamus sequi. Illo, iusto? Eos aut velit natus unde necessitatibus ab odit, ipsam numquam vero, soluta quos dolorem quaerat?</p>

                  <p>Eaque atque iste explicabo assumenda dignissimos! Quisquam modi ipsum delectus tenetur. Temporibus veniam incidunt in perferendis omnis nobis minus ex repudiandae magnam tenetur, sunt facere, iste itaque at, hic quod expedita repellat sapiente laboriosam a veritatis aperiam consequatur. Similique magni odio maxime sequi voluptate consequuntur illum nisi cum!</p>',
            'gambar'        => NULL,
          ]);
    }
}
