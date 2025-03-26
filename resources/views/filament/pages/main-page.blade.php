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
              class="border-b border-neutral-200 bg-primary-200 font-medium dark:border-white/10">
              <tr>
                <th scope="col" class=" px-6 py-4 text-left border-r-2 border-white">Tugas</th>
                <th scope="col" class=" px-6 py-4 border-r-2 border-white">Kategori</th>
                <th scope="col" class=" px-6 py-4 border-r-2 border-white">Status</th>
                <th scope="col" class=" px-6 py-4 text-left border-r-2 border-white">Catatan</th>
                <th scope="col" class=" px-6 py-4 text-left border-r-2 border-white"></th>
              </tr>
            </thead>
            <tbody>

            @foreach($data_laporan as $laporan)

               @php 

               $warna = ($laporan->status == 'Selesai') ? 'green' : 'yellow';

               @endphp

              <tr class="border-b-2 border-r-2 border-white dark:border-white/10">
                <td class="whitespace-nowrap  px-6 py-2 font-medium bg-blue-50">
                  {{ $loop->iteration }}.  {{ $laporan->judul }}
                </td>
                <td class="whitespace-nowrap  px-6 py-2 text-center bg-blue-50">
                    {{ $laporan->kategori->title }}
                </td>
                <td class="whitespace-nowrap  px-6 py-2 text-center bg-blue-50">
                  <span class="bg-{{ $warna }}-200 text-{{ $warna }}-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-{{ $warna }}-900 dark:text-{{ $warna }}-300">
                    {{ $laporan->status }}
                  </span>
                    
                </td>
                <td class="whitespace-nowrap  px-6 py-2 bg-blue-50">
                    {!! $laporan->deskripsi !!}
                </td>
                <td class="whitespace-nowrap  px-6 py-2 bg-blue-50">
                      
                  <button
                      type="button"
                      wire:click="deleteData({{ $laporan->id }})"
                      class="inline-block rounded text-danger px-2 py-1 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out focus:bg-danger-accent-300 focus:shadow-danger-2 focus:outline-none focus:ring-0 motion-reduce:transition-none dark:shadow-black/30 dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-danger-800">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                      </svg>
                      
                  </button>

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
