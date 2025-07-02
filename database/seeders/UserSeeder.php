<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Renal Eki Riyanto',
            'email' => 'ekysr99@gmail.com',
            'password' => Hash::make('renaleki123')
        ];

        User::create($data);
    }
}
