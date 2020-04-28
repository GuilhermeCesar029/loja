<?php

use Illuminate\Database\Seeder;
use App\LoginProduct;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        BD::table('loginproduct')->insert([
            'email'    => 'ggadmin@br.com',
            'password' => HASH::make('123456'),
        ]);
    }
}
