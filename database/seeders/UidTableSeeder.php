<?php

namespace Database\Seeders;

use App\Models\Uid_reader;
use Illuminate\Database\Seeder;

class UidTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Uid_reader::create([
            'UIDresult' => '12SD13AS'
        ]);
    }
}
