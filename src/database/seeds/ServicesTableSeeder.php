<?php

use Illuminate\Database\Seeder;
use App\Model\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ID Divisions
        // 1 = Produksi
        // 2 = Keuangan
        // 3 = Logistik

        // STATE
        // wait = Menunggu Antrian
        // process = Dalam Proses Perbaikan
        // done = Selesai Diperbaiki

        // Laptop Rusak, Divisi Produksi, Menunggu 
        $service = Service::create([
            'title' => 'Laptop Rusak',
            'owner' => 'Dion',
            'division_id' => 1,
            'description' => 'Rusak Ngga jelas, tombol pencet-pencet sendiri',
            'state' => 'wait',
            'wait_at' => date("Y-m-d H:i:s")
        ]);

        // Printer Bermasalah, Divisi Keuangan, Perbaikan 
        $service = Service::create([
            'title' => 'Printer Bermasalah',
            'owner' => 'Anglovina',
            'division_id' => 2,
            'description' => 'Printer nya kadang-kadang ngga mau nge print',
            'state' => 'process',
            'wait_at' => date("Y-m-04 H:i:s"),
            'process_at' => date("Y-m-08 H:i:s")
        ]);
        $service->users()->attach([1, 2]);

        // Monitor Mati, Divisi Logistik, Selesai 
        $service = Service::create([
            'title' => 'Monitor Mati',
            'owner' => 'Reyno',
            'division_id' => 3,
            'description' => 'Monitor hidup setengah doang',
            'state' => 'done',
            'wait_at' => date("Y-m-10 H:i:s"),
            'process_at' => date("Y-m-15 H:i:s"),
            'done_at' => date("Y-m-d H:i:s")
        ]);
        $service->users()->attach([2]);
    }
}
