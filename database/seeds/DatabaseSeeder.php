<?php

use Illuminate\Database\Seeder;
use App\User;
use AddedSettingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddedSettingSeeder::class);
    }
}
