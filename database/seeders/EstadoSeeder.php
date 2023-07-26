<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            ['estado' => 'Bahia', 'UF' => 'BA'],
            ['estado' => 'Paraíba', 'UF' => 'PB'],
            ['estado' => 'São Paulo', 'UF' => 'SP'],
        ];

        DB::table('estados')->insert($estados);
    }
}
