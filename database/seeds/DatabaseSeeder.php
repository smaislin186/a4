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
        // $this->call(UsersTableSeeder::class);
        $this->call(CenterTypesTableSeeder::class);
        $this->call(CentersTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(CenterProductTableSeeder::class);
    }
}
