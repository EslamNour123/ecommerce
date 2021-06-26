<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;


class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'title_ar' => 'طلباتي',
            'title_en' => 'talabatey',
            'tax'      => '3',
            'email'    => 'talabatey@gmail.com',
            'phone'    => '011236213',
        ]);
    }
}
