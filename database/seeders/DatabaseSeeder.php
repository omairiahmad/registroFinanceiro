<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Database\Factories\TransactionFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use App\Models\Transaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Client::factory(10)->create();
        Transaction::factory(20)->create();     
    }
}
