<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SumberInformasi;

class SumberInformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Website',
            'Teman',
            'Brosur',
            'Spanduk',
            'Sosialisasi',
            'WA',
        ];

        for ($i=0; $i < count($data); $i++) { 
            SumberInformasi::create([
                'sumber_informasi' => $data[$i]
            ]);
        }


    }
}
