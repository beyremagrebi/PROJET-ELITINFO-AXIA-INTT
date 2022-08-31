<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\rasionDeceDemandes;
class demandedceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        rasionDeceDemandes::create([
            'intitule' => 'القرين أو أحد الفروع',
        ]);
        rasionDeceDemandes::create([
            'intitule' => 'أحد الأصول من الدرجة الأولى',
        ]);
    }
}
