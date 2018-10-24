<?php

use Illuminate\Database\Seeder;
use App\Model\Division;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Produksi
        Division::create([
            'name' => 'Produksi'
        ]);
        // Keuangan
        Division::create([
            'name' => 'Keuangan'
        ]);
        // Logistik
        Division::create([
            'name' => 'Logistik'
        ]);
    }
}
