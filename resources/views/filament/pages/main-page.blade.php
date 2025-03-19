<x-filament-panels::page>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<div>
    <h1 class="mx-auto uppercase text-2xl">Laporan Hari Ini</h1>

</div>

<div>
    <p>Name: Priana</p>
    <p>Divisi: Backend</p>
</div>


<!-- This example requires Tailwind CSS v3.0+ -->



<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table
            class="min-w-full text-center text-sm font-light text-surface dark:text-white">
            <thead
              class="border-b border-neutral-200 bg-[#332D2D] font-medium text-white dark:border-white/10">
              <tr>
                <th scope="col" class=" px-6 py-4">Tugas</th>
                <th scope="col" class=" px-6 py-4">Kategori</th>
                <th scope="col" class=" px-6 py-4">Status</th>
                <th scope="col" class=" px-6 py-4">Catatan</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b border-neutral-200 dark:border-white/10">
                <td class="whitespace-nowrap  px-6 py-4 font-medium">1</td>
                <td class="whitespace-nowrap  px-6 py-4">Mark</td>
                <td class="whitespace-nowrap  px-6 py-4">Otto</td>
                <td class="whitespace-nowrap  px-6 py-4">@mdo</td>
              </tr>
              <tr class="border-b border-neutral-200 dark:border-white/10">
                <td class="whitespace-nowrap  px-6 py-4 font-medium">2</td>
                <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                <td class="whitespace-nowrap  px-6 py-4">Thornton</td>
                <td class="whitespace-nowrap  px-6 py-4">@fat</td>
              </tr>
              <tr class="border-b border-neutral-200 dark:border-white/10">
                <td class="whitespace-nowrap  px-6 py-4 font-medium">3</td>
                <td colspan="2" class="whitespace-nowrap  px-6 py-4">
                  Larry the Bird
                </td>
                <td class="whitespace-nowrap  px-6 py-4">@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>




</x-filament-panels::page>
