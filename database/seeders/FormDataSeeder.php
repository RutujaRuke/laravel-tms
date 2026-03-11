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
        $formData = [
            [
                'name' => 'Rutuja',
                'email' => 'rutujaruke24@gmail.com',
                'contact' => '1234567890',
                'address' => 'pune'
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'contact' => '0987654321',
                'address' => 'mumbai'
            ]
        ];

        foreach ($formData as $data) {
            FormData::create($data);
        }

    
    }
}
