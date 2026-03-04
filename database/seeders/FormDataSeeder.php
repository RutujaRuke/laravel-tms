<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormData;

class FormDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $data = [
            ['name' => 'Rutuja'],
            ['email' => 'rutujaruke24@gmail.com'],
            ['contact' => '1234567890'],
            ['address' => 'pune']
        ];
        
        foreach ($data as $d){
            FormData::create($d);
        }
    }
}
