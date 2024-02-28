<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create([
            'nome' => 'Vinicius C Amorim',
            'valor' => '20.00',
        ]);
        Produto::create([
            'nome' => 'Joao C Amorim',
            'valor' => '20.00',
        ]);
    }
}
