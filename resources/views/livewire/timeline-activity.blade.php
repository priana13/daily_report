<div>

  <h3 class="mb-6 ms-3 text-2xl font-bold text-neutral-700 dark:text-neutral-300">
    Aktivitas Terbaru
  </h3>

<ol class="border-s-2 border-info-100 ms-8">
  <!--First item-->

  @foreach ($activities as $row)

      
  <li class="">
    <div class="flex-start md:flex">
      <div
        class="-ms-[13px] flex h-[25px] w-[25px] items-center justify-center rounded-full bg-info-100 text-info-700">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="h-4 w-4">
          <path
            fill-rule="evenodd"
            d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"
            clip-rule="evenodd" />
        </svg>
      </div>
      <div
        class="mb-10 ms-0 block w-[60%] rounded-tr-lg px-6 pb-6 dark:bg-neutral-700 dark:shadow-black/10">
        <div class="">          
          <a
            href="/member/main-page?tanggal={{ $row->tanggal }}"
            class="text-normal mb-2 text-info transition duration-150 ease-in-out hover:text-info-600 focus:text-info-600 active:text-info-700 dark:border-info-300 dark:text-info-300 dark:hover:text-info-200 dark:focus:text-info-200 dark:active:text-info-200"
            >{{ date('d M Y' , strtotime($row->tanggal)) }}</a
          >
        </div>

        @foreach( $this->getListItem($row->tanggal) as $item)

        <div>

         {{ $loop->iteration }}. {!! $item->tugas->judul !!} - {{ $item->deskripsi }}

        </div>

        @endforeach
      
      </div>
    </div>
  </li>

  @endforeach 
 
</ol>


</div>