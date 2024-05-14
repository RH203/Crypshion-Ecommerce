  <div>
    <!-- Slider -->
    <div data-hs-carousel='{
  "loadingClasses": "opacity-0",
  "isAutoPlay": true
}' class="relative">
      <div class="relative w-full overflow-hidden min-h-[500px]">
        <div
          class="absolute top-0 bottom-0 flex transition-transform duration-700 opacity-0 hs-carousel-body start-0 flex-nowrap">
          <div class="hs-carousel-slide">
            <div class="flex justify-center h-full">
              <span class="relative self-center text-4xl text-gray-800 transition duration-700 dark:text-white">
                <img src="/img/carousel-inner-1.png" alt="" class="w-full">
              </span>
            </div>
          </div>
          <div class="hs-carousel-slide">
            <div class="flex justify-center h-full ">
              <span class="self-center text-4xl text-gray-800 transition duration-700 dark:text-white">
                <img src="/img/carousel-inner-2.png" alt="" class="w-full">
              </span>
            </div>
          </div>
          <div class="hs-carousel-slide">
            <div class="flex justify-center h-full">
              <span class="self-center text-4xl text-gray-800 transition duration-700 dark:text-white">
                <img src="/img/carousel-inner-3.png" alt="" class="w-full">
              </span>
            </div>
          </div>
        </div>
      </div>

      <button type="button"
        class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 ">
        <span class="text-2xl" aria-hidden="true">
          <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="m15 18-6-6 6-6"></path>
          </svg>
        </span>
        <span class="sr-only">Previous</span>
      </button>
      <button type="button"
        class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 ">
        <span class="sr-only">Next</span>
        <span class="text-2xl" aria-hidden="true">
          <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
          </svg>
        </span>
      </button>

      <div class="absolute flex justify-center space-x-2 hs-carousel-pagination bottom-3 start-0 end-0">
        <span
          class="border border-gray-400 rounded-full cursor-pointer hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
        <span
          class="border border-gray-400 rounded-full cursor-pointer hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
        <span
          class="border border-gray-400 rounded-full cursor-pointer hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
      </div>
    </div>
    <!-- End Slider -->
  </div>
