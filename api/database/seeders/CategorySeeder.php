<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Pessoal', 'created_at' => now()],
            ['name' => 'Trabalho', 'created_at' => now()],
            ['name' => 'Estudos', 'created_at' => now()],
            ['name' => 'Saúde', 'created_at' => now()],
            ['name' => 'Compras', 'created_at' => now()],
            ['name' => 'Projetos', 'created_at' => now()],
            ['name' => 'Finanças', 'created_at' => now()],
            ['name' => 'Casa', 'created_at' => now()],
            ['name' => 'Entretenimento', 'created_at' => now()],
            ['name' => 'Social', 'created_at' => now()],
            ['name' => 'Viajar', 'created_at' => now()],
            ['name' => 'Administração', 'created_at' => now()],
            ['name' => 'Voluntariado', 'created_at' => now()],
        ]);
    }
}
