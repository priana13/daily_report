<tr class="border-b-2 border-r-2 border-white dark:border-white/10"

    x-data="{ isEdit: @entangle('isEdit') }"

>

    <td class="whitespace-nowrap  px-6 py-2 font-medium bg-blue-50">
        
        <select wire:model="tugas"
          x-show="isEdit"
        
        class="border-0 border-gray-300 text-gray-900 text-sm rounded-md block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Pilih Tugas</option>

            @foreach($list_tugas as $tugas)

              <option value="{{ $tugas->id }}">{{ $tugas->judul }}</option>

            @endforeach   
          </select>         
        
          <span x-show="!isEdit" class="text-slate-900">
            {{ $nomor }}.  {{ $laporan->judul }} tes
          </span>     

    </td>
    <td class="whitespace-nowrap  px-6 py-2 text-center bg-blue-50">

        <select wire:model="kategori" x-show="isEdit" class="border-0 border-gray-300 text-gray-900 text-sm rounded-md block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Kategori</option>

            @foreach($list_kategori as $kategori)

              <option value="{{ $kategori->id }}">{{ $kategori->title }}</option>

            @endforeach                 

          </select>

            <span x-show="!isEdit" class="text-slate-900">
                {{ $laporan->kategori->title }}
            </span>

    </td>
    <td class="whitespace-nowrap  px-6 py-2 text-center bg-blue-50">

        <select wire:model="status"  x-show="isEdit" class="border-0 border-gray-300 text-gray-900 text-sm rounded-md block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Status</option>
            <option value="Selesai">Selesai</option>
            <option value="Progress">Progress</option>   
            <option value="Next">Next</option>                
          </select>

      <span x-show="!isEdit" class="bg-{{ $warna }}-200 text-{{ $warna }}-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-{{ $warna }}-900 dark:text-{{ $warna }}-300 text-slate-900" >
        {{ $laporan->status }}
      </span>
        
    </td>
    <td class="whitespace-nowrap  px-6 py-2 bg-blue-50">

        <textarea wire:model="deskripsi"  
        x-show="isEdit"                
        rows="1" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border-0 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Catatan..."></textarea>

    
        <div x-show="!isEdit" class="text-sm text-gray-900 ">
            {!! $laporan->deskripsi !!} 
        </div>
       

    </td>
    <td class="whitespace-nowrap  px-6 py-2 bg-blue-50">
          
        <button
            type="button"
            wire:confirm="Kamu yakin ingin menghapus data ini?"
            wire:click="deleteData({{ $laporan->id }})"
            class="inline-block rounded text-danger px-2 py-1 text-xs font-medium uppercase leading-normal text-white dark:text-dark transition duration-150 ease-in-out focus:bg-danger-accent-300 focus:shadow-danger-2 focus:outline-none focus:ring-0 motion-reduce:transition-none dark:shadow-black/30 dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-danger-800">
            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
            
        </button>

   
        <button
            type="button"
            x-on:click="isEdit = true"
            x-show="isEdit" 
            wire:click="update"
            class="inline-block rounded bg-warning px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white dark:text-dark shadow-warning-3 transition duration-150 ease-in-out hover:bg-warning-accent-300 hover:shadow-warning-2 focus:bg-warning-accent-300 focus:shadow-warning-2 focus:outline-none focus:ring-0 active:bg-warning-600 active:shadow-warning-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
            Update
        </button>

        <button
            type="button"
            x-on:click="isEdit = false"
            x-show="isEdit" 
            class="inline-block rounded bg-secondary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white dark:text-dark shadow-secondary-3 transition duration-150 ease-in-out hover:bg-secondary-accent-300 hover:shadow-secondary-2 focus:bg-secondary-accent-300 focus:shadow-secondary-2 focus:outline-none focus:ring-0 active:bg-secondary-600 active:shadow-secondary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
            Batal
        </button>
            
        <button
            type="button"
            x-on:click="isEdit = true"
            x-show="!isEdit"          
            class="inline-block rounded text-danger px-2 py-1 text-xs font-medium uppercase leading-normal text-white dark:text-dark transition duration-150 ease-in-out focus:bg-danger-accent-300 focus:shadow-danger-2 focus:outline-none focus:ring-0 motion-reduce:transition-none dark:shadow-black/30 dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
            
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-800">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg> 
        </button>

    </td>

  </tr>