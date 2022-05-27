<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        (User::factory(['email' => 'admin@admin.com'])->create());
        (User::factory(['email' => 'vendor1@test.com'])->create());
        (User::factory(['email' => 'vendor2@test.com'])->create());
        (User::factory(['email' => 'vendor3@test.com'])->create());
        (User::factory(['email' => 'vendor4@test.com'])->create());
        (User::factory(['email' => 'vendor5@test.com'])->create());
        (User::factory(['email' => 'vendor6@test.com'])->create());

        (User::factory(['email' => 'client1@test.com'])->create());
        (User::factory(['email' => 'client2@test.com'])->create());
        (User::factory(['email' => 'client3@test.com'])->create());
        (User::factory(['email' => 'client4@test.com'])->create());
        (User::factory(['email' => 'client5@test.com'])->create());

        (User::factory(['email' => 'driver1@test.com'])->create());
        (User::factory(['email' => 'driver2@test.com'])->create());
        (User::factory(['email' => 'driver3@test.com'])->create());
        (User::factory(['email' => 'driver4@test.com'])->create());
        (User::factory(['email' => 'driver5@test.com'])->create());
    }
}
