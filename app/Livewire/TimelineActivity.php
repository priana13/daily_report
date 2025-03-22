<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LaporanHarian;

class TimelineActivity extends Component
{
    public int $qty = 5;

    public function render()
    {
        $activities = LaporanHarian::mine()->orderBy('tanggal' , 'desc')->take($this->qty)->get();

        return view('livewire.timeline-activity' , compact('activities'));
    }
}
