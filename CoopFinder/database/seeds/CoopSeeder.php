<?php

use Illuminate\Database\Seeder;

class CoopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coops = factory('App\Coop', 10)->create();
    }
}
