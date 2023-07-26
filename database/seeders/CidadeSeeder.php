<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cidades = [
            ['cidade' => 'Salvador', 'id_estado' => 1],
            ['cidade' => 'Feira de Santana', 'id_estado' => 1],
            ['cidade' => 'Ilheus', 'id_estado' => 1],
            ['cidade' => 'João Pessoa', 'id_estado' => 2],
            ['cidade' => 'Campina Grande', 'id_estado' => 2],
            ['cidade' => 'Patos', 'id_estado' => 2],
            ['cidade' => 'São Paulo', 'id_estado' => 3],
            ['cidade' => 'Santos', 'id_estado' => 3],
            ['cidade' => 'Santo André', 'id_estado' => 3],
        ];

        DB::table('cidades')->insert($cidades);
    }
}
