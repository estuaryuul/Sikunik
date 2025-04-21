<?php

// namespace Database\Seeders;

// // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

// class DatabaseSeeder extends Seeder
// {
//     /**
//      * Seed the application's database.
//      */
//     public function run(): void
//     {
//         // \App\Models\User::factory(10)->create();

//         \App\Models\User::factory()->create([
//             'name' => 'Admin',
//             'email' => 'admin@gmail.com',
//             'jenisInstansi' => 'admin',
//             'password' => bcrypt('admin'),
//             'role' => 'admin',
//         ]);
//     }
// }

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

use PhpOffice\PhpSpreadsheet\IOFactory;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Path ke file Excel yang kamu upload (pindahkan ke folder database/data/)
        $path = database_path('data/daftar instansi.xlsx');

        // Load file Excel
        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Lewati baris pertama (header)
        foreach (array_slice($rows, 1) as $row) {
            $instansi = $row[0] ?? null; // Kolom A
            $tingkat = $row[1] ?? null;  // Kolom B
            $defaultPassword = $row[4] ?? 'password'; // Kolom C (optional)

            if ($instansi && $tingkat) {
                User::create([
                    'name' => $instansi,
                    'jenisInstansi' => $tingkat,
                    'email' => null,
                    'password' => bcrypt($defaultPassword),
                    'role' => 'user',
                    'remember_token' => Str::random(60),
                ]);
            }
        }

        // Tambahkan admin secara manual
        User::create([
            'name' => 'admin',
            'jenisInstansi' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'remember_token' => Str::random(60),
        ]);
    }
}
