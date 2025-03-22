<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LaporanHarian;

class TimelineActivity extends Component
{
    public function render()
    {
        $activities = LaporanHarian::get();

        return view('livewire.timeline-activity' , compact('activities'));
    }
}
