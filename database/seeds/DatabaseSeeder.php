<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RanksTableSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(TimelineSeeder::class);
        $this->call(DemoRibbonSeeder::class);
    }
}
