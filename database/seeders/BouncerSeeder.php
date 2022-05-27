<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Bouncer;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::allow('admin')->everything();
        Bouncer::role()->create([
            'name' => 'vendor',
            'title' => 'Vendor',
        ]);
        Bouncer::role()->create([
            'name' => 'client',
            'title' => 'Client',
        ]);
        Bouncer::role()->create([
            'name' => 'driver',
            'title' => 'Driver',
        ]);
        User::where('email', 'admin@admin.com')->first()->assign('admin');
        User::where('email', 'vendor1@test.com')->first()->assign('vendor');
        User::where('email', 'vendor2@test.com')->first()->assign('vendor');
        User::where('email', 'vendor3@test.com')->first()->assign('vendor');
        User::where('email', 'vendor4@test.com')->first()->assign('vendor');
        User::where('email', 'vendor5@test.com')->first()->assign('vendor');
        User::where('email', 'vendor6@test.com')->first()->assign('vendor');

        User::where('email', 'client1@test.com')->first()->assign('client');
        User::where('email', 'client2@test.com')->first()->assign('client');
        User::where('email', 'client3@test.com')->first()->assign('client');
        User::where('email', 'client4@test.com')->first()->assign('client');
        User::where('email', 'client5@test.com')->first()->assign('client');

        User::where('email', 'driver1@test.com')->first()->assign('driver');
        User::where('email', 'driver2@test.com')->first()->assign('driver');
        User::where('email', 'driver3@test.com')->first()->assign('driver');
        User::where('email', 'driver4@test.com')->first()->assign('driver');
        User::where('email', 'driver5@test.com')->first()->assign('driver');
    }
}
