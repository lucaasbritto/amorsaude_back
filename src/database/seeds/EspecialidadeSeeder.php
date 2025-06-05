<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especialidades = [
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'Cardiologia'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'Dermatologia'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'Endocrinologia'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'Gastroenterologia'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'Neurologia'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'Oncologia'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'Pediatria'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'Psiquiatria'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'Ortopedia'],            
        ];

        DB::table('especialidades')->insert($especialidades);
    }
}
