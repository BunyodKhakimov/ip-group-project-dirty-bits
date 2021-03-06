<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(UserTableSeeder::class);
    	$this->call(HotelTableSeeder::class);
    	$this->call(ReservationTableSeeder::class);
    	$this->call(FacilityTableSeeder::class);
        $this->call(RoomTableSeeder::class);
    }
}
