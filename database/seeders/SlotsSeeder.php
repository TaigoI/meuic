<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeders de todos os blocos de horario
        DB::table('slots')->insert([
            'id_slots' => 1,
            'display_name' => "7:30 - 9:10",
            'start_slot' => "7:30",
            'end_slot' => "9:10",

        ]);

        DB::table('slots')->insert([
            'id_slots' => 2,
            'display_name' => "9:20 - 11:00",
            'start_slot' => "9:20",
            'end_slot' => "11:00",

        ]);
        DB::table('slots')->insert([
            'id_slots' => 3,
            'display_name' => "11:10 - 12:50",
            'start_slot' => "11:10",
            'end_slot' => "12:50",

        ]);
        DB::table('slots')->insert([
            'id_slots' => 4,
            'display_name' => "13:30 - 15:10",
            'start_slot' => "13:30",
            'end_slot' => "15:10",

        ]);
        DB::table('slots')->insert([
            'id_slots' => 5,
            'display_name' => "15:20 - 17:00",
            'start_slot' => "15:20",
            'end_slot' => "17:00",

        ]);
        DB::table('slots')->insert([
            'id_slots' => 6,
            'display_name' => "17:10 - 18:50",
            'start_slot' => "17:10",
            'end_slot' => "18:50",

        ]);
        DB::table('slots')->insert([
            'id_slots' => 7,
            'display_name' => "19:00 - 20:40",
            'start_slot' => "19:00",
            'end_slot' => "20:40",

        ]);
        DB::table('slots')->insert([
            'id_slots' => 8,
            'display_name' => "20:50 - 22:30",
            'start_slot' => "20:50",
            'end_slot' => "22:30",

        ]);
    }
}
