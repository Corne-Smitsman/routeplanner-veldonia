<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $account = config('veldonia.admin');

        if (blank($account['password'])) {
            $this->command->warn('ADMIN_PASSWORD ontbreekt in .env — gebruiker niet aangemaakt.');

            return;
        }

        User::updateOrCreate(
            ['email' => $account['email']],
            [
                'name' => $account['name'],
                'password' => Hash::make($account['password']),
                'email_verified_at' => now(),
            ]
        );
    }
}
