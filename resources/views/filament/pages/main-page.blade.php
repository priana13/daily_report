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
            wire:click="prevDate"
            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-200 focus:bg-primary-accent-200 focus:outline-none focus:ring-0 active:bg-primary-accent-200 motion-reduce:transition-none dark:bg-primary-300 dark:hover:bg-primary-400 dark:focus:bg-primary-400 dark:active:bg-primary-400">
            Sebelumnya
        </button>
        <button
            type="button"
            wire:click="today"
            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
            Hari Ini
        </button>
    </div>

    <h2 class="text-xl">Tanggal : <strong>{{ date('d M Y' , strtotime($tanggal)) }}</strong> </h2>
    
</div>

<!-- Filter Secrion -->

<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full lg:px-8">
        <div class="overflow-hidden">
          <table
            class="min-w-full text-sm font-light text-surface dark:text-white">
            <thead
              class="border-b border-neutral-200 bg-primary-100 font-medium dark:border-white/10">
              <tr>
                <th scope="col" class=" px-6 py-4 text-left">Tugas</th>
                <th scope="col" class=" px-6 py-4">Kategori</th>
                <th scope="col" class=" px-6 py-4">Status</th>
                <th scope="col" class=" px-6 py-4 text-left">Catatan</th>
              </tr>
            </thead>
            <tbody>

            @foreach($data_laporan as $laporan)

              <tr class="border-b border-neutral-200 dark:border-white/10">
                <td class="whitespace-nowrap  px-6 py-4 font-medium">
                    {{ $laporan->judul }}
                </td>
                <td class="whitespace-nowrap  px-6 py-4 text-center">
                    {{ $laporan->kategori->title }}
                </td>
                <td class="whitespace-nowrap  px-6 py-4 text-center">
                    {{ $laporan->status }}
                </td>
                <td class="whitespace-nowrap  px-6 py-4">
                    {!! $laporan->deskripsi !!}
                </td>
              </tr>

            @endforeach


            <tr class="border-b border-neutral-200 dark:border-white/10">
              <td class="whitespace-nowrap  px-6 py-4 font-medium">
                {{-- <input type="text" wire:model="judul" id="judul" class="border-0 text-gray-900 text-sm rounded-md block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ketik Tugas" required autocomplete="off" />
                
                @error('judul') <span class="text-red-500">{{ $message }}</span> @enderror --}}

                <select wire:model="tugas" id="kategori" class="border-0 border-gray-300 text-gray-900 text-sm rounded-md block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected>Tugas</option>

                  @foreach($list_tugas as $tugas)

                    <option value="{{ $tugas->id }}">{{ $tugas->judul }}</option>

                  @endforeach                 

                </select>

                @error('tugas') <span class="text-red-500">{{ $message }}</span> @enderror



              </td>
              <td class="whitespace-nowrap  px-6 py-4 text-center">
                <select wire:model="kategori" id="kategori" class="border-0 border-gray-300 text-gray-900 text-sm rounded-md block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected>Kategori</option>

                  @foreach($list_kategori as $kategori)

                    <option value="{{ $kategori->id }}">{{ $kategori->title }}</option>

                  @endforeach                 

                </select>

                @error('kategori') <span class="text-red-500">{{ $message }}</span> @enderror

              </td>
              <td class="whitespace-nowrap  px-6 py-4 text-center">
                <select wire:model="status" id="status" class="border-0 border-gray-300 text-gray-900 text-sm rounded-md block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected>Status</option>
                  <option value="Selesai">Selesai</option>
                  <option value="Progress">Progress</option>   
                  <option value="Next">Next</option>                
                </select>

                @error('status') <span class="text-red-500">{{ $message }}</span> @enderror

              </td>
              <td class="whitespace-nowrap  px-6 py-4">
                {{-- <input type="text" id="first_name" class="border-0 border-gray-300 text-gray-900 text-sm rounded-md block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Catatan" required autocomplete="off" /> --}}

                <textarea wire:model="deskripsi"                  
                rows="1" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border-0 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Catatan..."></textarea>

                @error('deskripsi') <span class="text-red-500">{{ $message }}</span> @enderror

              </td>
            </tr>

            <tr class="border-b border-neutral-200 dark:border-white/10">

              <td class="whitespace-nowrap  px-6 py-4 font-medium text-center" colspan="4">

                <button
                    type="button"
                    wire:click="saveData"
                    class="inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-success-3 transition duration-150 ease-in-out hover:bg-success-accent-300 hover:shadow-success-2 focus:bg-success-accent-300 focus:shadow-success-2 focus:outline-none focus:ring-0 active:bg-success-600 active:shadow-success-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                    Simpan
                </button>

              </td>

            </tr>    



            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>




</x-filament-panels::page>
