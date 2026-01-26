<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serviceTypeIds = DB::table('service_types')->pluck('id')->toArray();
        $faker = \Faker\Factory::create('fr_FR');

        $appointments = [];
        for ($i = 0; $i < 100; $i++) {
            $appointments[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'vehicle' => $faker->company . ' ' . $faker->word,
                'appointment_time' => $faker->dateTimeBetween('+1 days', '+2 months'),
                'status' => $faker->randomElement(['pending', 'confirmed', 'cancelled']),
                'service_type_id' => $faker->randomElement($serviceTypeIds),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('appointments')->insert($appointments);
    }
} 