<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Slot;

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
        Slot::updateOrCreate(['id_slot' => 0],[
            'display_name' => "07:30 - 09:10",
            'start_slot' => "07:30",
            'end_slot' => "09:10",
        ]);

        Slot::updateOrCreate(['id_slot' => 1],[
            'display_name' => "09:20 - 11:00",
            'start_slot' => "09:20",
            'end_slot' => "11:00",
        ]);
        Slot::updateOrCreate(['id_slot' => 2],[
            'display_name' => "11:10 - 12:50",
            'start_slot' => "11:10",
            'end_slot' => "12:50",
        ]);
        Slot::updateOrCreate(['id_slot' => 3],[
            'display_name' => "13:30 - 15:10",
            'start_slot' => "13:30",
            'end_slot' => "15:10",
        ]);
        Slot::updateOrCreate(['id_slot' => 4],[
            'display_name' => "15:20 - 17:00",
            'start_slot' => "15:20",
            'end_slot' => "17:00",
        ]);
        Slot::updateOrCreate(['id_slot' => 5],[
            'display_name' => "17:10 - 18:50",
            'start_slot' => "17:10",
            'end_slot' => "18:50",
        ]);
        Slot::updateOrCreate(['id_slot' => 6],[
            'display_name' => "19:00 - 20:40",
            'start_slot' => "19:00",
            'end_slot' => "20:40",
        ]);
        Slot::updateOrCreate(['id_slot' => 7],[
            'display_name' => "20:50 - 22:30",
            'start_slot' => "20:50",
            'end_slot' => "22:30",
        ]);
    }
}
