<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ElRaisonlogementdemande;
class logmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ElRaisonlogementdemande::create([
            'intitule' => 'لشراء مسكن',
        ]);

        ElRaisonlogementdemande::create([
            'intitule' => 'لشراء أرض',
        ]);

        ElRaisonlogementdemande::create([
            'intitule' => 'لبناء مسكن',
        ]);

        ElRaisonlogementdemande::create([
            'intitule' => 'لترميم أو توسع مسكن',
        ]);
    }
}
