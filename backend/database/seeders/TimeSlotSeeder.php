<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $start = Carbon::createFromTime(10, 0);
        $end = Carbon::createFromTime(22, 0);

        while ($start < $end) {
            $slotEnd = (clone $start)->addMinutes(30);

            TimeSlot::firstOrCreate([
                'start_time' => $start->format('H:i'),
                'end_time' => $slotEnd->format('H:i'),
            ]);

            $start = $slotEnd;
        }
    }
}
