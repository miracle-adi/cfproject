<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        $user = factory(User::class)->create([
            'name' => 'Surenraj Gopal',
            'userlevel' => '1',
            'gender' => 'Male',
            'birth_date' => '1995/01/01',
            'user_address' => 'Angkasa HQ',
            'state' => 'Kuala Lumpur',
            'email' => 'adminCoopFinder@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret123'),
            'remember_token' => Str::random(10),
        ]);

        Create 5 users
        $coops = factory('App\User', 5)->create();
    }
}

// class StopsTableSeeder extends CsvSeeder {

// 	public function __construct()
// 	{
// 		$this->table = 'users';
// 		$this->filename = base_path().'/database/seeds/csvs/users.csv';
// 	}

// 	public function run()
// 	{
// 		// Recommended when importing larger CSVs
// 		DB::disableQueryLog();

// 		// Uncomment the below to wipe the table clean before populating
// 		DB::table($this->table)->truncate();

// 		parent::run();
// 	}
// }
