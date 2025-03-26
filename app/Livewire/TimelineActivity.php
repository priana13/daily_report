<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LaporanHarian;
use Illuminate\Support\Facades\DB;

class TimelineActivity extends Component
{
    public int $qty = 5;

    public function render()
    {
        $activities = LaporanHarian::mine()
                        ->select([
                            'tanggal',
                            DB::raw('count(*) as total')
                        ])
                        ->orderBy('tanggal' , 'desc')
                        ->take($this->qty)   
                        ->groupBy('tanggal')                     
                        ->get();

        return view('livewire.timeline-activity' , compact('activities'));

    }
    
    public function getListItem($tanggal){

        $data = LaporanHarian::mine()->whereDate('tanggal' , $tanggal)                                         
                    ->get();


        return $data;
    }
    
}
