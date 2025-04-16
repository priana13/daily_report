<x-filament-panels::page>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Filter Secrion -->
<div class="flex justify-between items-center">

    <div>
        <button
            type="button"
            wire:click="prevDate"
            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-200 focus:bg-primary-accent-200 focus:outline-none focus:ring-0 active:bg-primary-accent-200 motion-reduce:transition-none dark:bg-primary-300 dark:hover:bg-primary-400 dark:focus:bg-primary-400 dark:active:bg-primary-400">
            Sebelumnya
        </button>
        <button
            type="button"
            wire:click="thisMonth"
            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
            Bulan Ini
        </button>
    </div>

    <h2 class="text-xl">Bulan : <strong>{{ date('M Y' , strtotime($tanggal)) }}</strong> </h2>
    
</div>



<div class="grid grid-cols-7 gap-4 mt-4">
    {{-- Kosongkan kolom sampai hari pertama --}}
    @for($i = 1; $i < $hari_pertama; $i++)
        <div></div>
    @endfor

    {{-- Isi tanggal --}}
    @for($tgl = 1; $tgl <= $jumlah_hari; $tgl++)

        @php
            // Cek apakah hari ini Minggu (7 = Minggu)
            $hari_ini = \Carbon\Carbon::create($tahun, $bulan, $tgl)->dayOfWeekIso;
            $tanggal = \Carbon\Carbon::create($tahun, $bulan, $tgl)->format('Y-m-d');

            // dd($hari_ini);
            $is_minggu = $hari_ini == 7;


            if (isset( $data_laporan[$tgl] )){
                $warna = 'bg-success-300 dark:bg-success-300';
                $act = $data_laporan[$tgl];

            }else{

                $warna = 'bg-primary-100';
                $act = 0;
            }



        @endphp


        <a
            href="/member/main-page?tanggal={{ $tanggal }}"
            target="_blank"
            class="inline-block rounded {{ $hari_ini == 7 ? 'bg-danger-300 dark:bg-danger-300' : $warna }} px-6 py-4 font-medium hover:shadow-lg uppercase leading-normal text-primary-700 dark:text-primary-900 transition duration-150 ease-in-out  focus:bg-primary-accent-200 focus:outline-none focus:ring-0 motion-reduce:transition-none dark:focus:bg-primary-400 relative">
            <span class="absolute top-2 left-2 text-gray-400 dark:text-gray-600 text-xs">{{ $tgl }}</span>
            <span>{{ $act }}</span>
             
        </a>
    @endfor
</div>

<livewire:timeline-activity />

</x-filament-panels::page>
