<?php

use Illuminate\Database\Seeder;
use App\Center;
class CentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Center::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'P001',
        'name' => 'West Boston',
        'parent_id' => 0,
        'center_type_id' => 1,
        ]);

        Center::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'P002',
        'name' => 'East Boston',
        'parent_id' => 0,
        'center_type_id' => 1,
        ]);

        Center::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'P003',
        'name' => 'South Boston',
        'parent_id' => 0,
        'center_type_id' => 1,
        ]);

        Center::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'P004',
        'name' => 'North Boston',
        'parent_id' => 0,
        'center_type_id' => 1,
        ]);

        Center::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'C001',
        'name' => 'Boston Operations',
        'parent_id' => 0,
        'center_type_id' => 2,
        ]);

    }
}
