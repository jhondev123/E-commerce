<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PaymentsSeeder::class,
            DriverSeeder::class,
            PaymentStatusSeeder::class,
            UserAdminSeeder::class,
            GroupSeeder::class,
            ProductSeeder::class,
            ToppingsSeeder::class,
            OrderSeeder::class,
            // CustomerSeeder::class,
        ]);
    }
}
