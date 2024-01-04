<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//THIS IS THE NEW IMPORT
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dummy = FakerFactory::create();
        for($i=0; $i<10; $i++){
            // THIS IS FOR THE PROFILES
            $profileId = DB::table('registers')->insertGetId([
                'name' => Str::upper($dummy->name),
                'email' => Str::upper($dummy->email),
                'password' => Str::upper($dummy->password),
                'image'=> $dummy->imageUrl($width = 640, $height = 480),
                'created_at' => $dummy->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $dummy->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
