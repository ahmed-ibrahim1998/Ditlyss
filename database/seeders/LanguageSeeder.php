<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LanguageSeeder extends Seeder
{

    public function run()
    {
        $data = [
            [
                'prefix' => 'ar',
                'name' => 'العربية',
                'direction' => 'rtl',
                'is_default' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'prefix' => 'en',
                'name' => 'English',
                'direction' => 'ltr',
                'is_default' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($data as $key => $item) {
            DB::table('languages')->insert([
                $key => $item
            ]);
        }
    }
}
