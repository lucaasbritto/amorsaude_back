<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class RegionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $regionais = [
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'Alto tietê'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'Interior'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'ES'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'SP Interior'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'SP'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'SP2'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'MG'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'Nacional'],
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'SP CAV'],            
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'RJ'],            
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'SP2'],            
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'SP1'],            
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'NE1'],            
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'NE2'],            
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'SUL'],            
            ['id' => Uuid::uuid4()->toString(), 'nome' => 'Norte'],            
        ];

        DB::table('regionais')->insert($regionais);
    }
}
