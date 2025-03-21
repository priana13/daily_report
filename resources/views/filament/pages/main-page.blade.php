<x-filament-panels::page>

@vite(['resources/css/app.css', 'resources/js/app.js'])

{{-- <div>
    <p>Nama: Priana (Backend)</p>
</div> --}}


<!-- Filter Secrion -->
<div class="flex justify-between items-center">

    <div>
        <button
            type="button"
            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-200 focus:bg-primary-accent-200 focus:outline-none focus:ring-0 active:bg-primary-accent-200 motion-reduce:transition-none dark:bg-primary-300 dark:hover:bg-primary-400 dark:focus:bg-primary-400 dark:active:bg-primary-400">
            Sebelumnya
        </button>
        <button
            type="button"
            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
            Hari Ini
        </button>
    </div>

    <h2 class="text-xl">Tanggal : 19 Maret 2025</h2>
    
</div>

<!-- Filter Secrion -->

<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full lg:px-8">
        <div class="overflow-hidden">
          <table
            class="min-w-full text-center text-sm font-light text-surface dark:text-white">
            <thead
              class="border-b border-neutral-200 bg-primary-100 font-medium dark:border-white/10">
              <tr>
                <th scope="col" class=" px-6 py-4">Tugas</th>
                <th scope="col" class=" px-6 py-4">Kategori</th>
                <th scope="col" class=" px-6 py-4">Status</th>
                <th scope="col" class=" px-6 py-4">Catatan</th>
              </tr>
            </thead>
            <tbody>

            @foreach($data_laporan as $laporan)

              <tr class="border-b border-neutral-200 dark:border-white/10">
                <td class="whitespace-nowrap  px-6 py-4 font-medium">
                    {{ $laporan->judul }}
                </td>
                <td class="whitespace-nowrap  px-6 py-4">
                    {{ $laporan->kategori->title }}
                </td>
                <td class="whitespace-nowrap  px-6 py-4">
                    {{ $laporan->status }}
                </td>
                <td class="whitespace-nowrap  px-6 py-4">
                    {{ $laporan->deskripsi }}
                </td>
              </tr>

            @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>




</x-filament-panels::page>
