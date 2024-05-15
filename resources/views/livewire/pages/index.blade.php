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

    {{-- Editor pick section start --}}
    <section class="my-20 lg:my-40">
      <div class="w-10/12 mx-auto">
        <header class="mb-10 text-center">
          <h1 class="mb-4 text-4xl font-bold text-black uppercase">EDITOR'S PICK</h1>
          <p class="font-normal text-slate-500">Problems trying to resolve the conflict between </p>
        </header>
        <div class="gap-5 lg:flex">
          <div class="relative mb-5 overflow-hidden lg:mb-0 lg:basis-6/12 basis-full group ">
            <img src="/img/editor-pick-1.png" alt=""
              class="w-full h-full transition duration-500 ease-linear group-hover:scale-110">
            <div class="absolute px-20 py-4 text-xl font-bold uppercase bg-white left-8 bottom-8">
              Men
            </div>
          </div>
          <div class="relative mb-5 overflow-hidden lg:mb-0 lg:basis-3/12 basis-full lg:h-full h-96 group">
            <img src="/img/editor-pick-2.png" alt=""
              class="w-full transition duration-500 ease-linear group-hover:scale-110">
            <div class="absolute px-10 py-4 text-xl font-bold uppercase bg-white left-8 bottom-8">
              Woman
            </div>
          </div>
          <div class="lg:basis-3/12 basis-full">
            <div class="flex flex-col gap-5">
              <div class="relative overflow-hidden group">
                <img src="/img/editor-pick-3.png" alt=""
                  class="w-full transition duration-500 ease-linear group-hover:scale-110">
                <div class="absolute px-10 py-4 text-xl font-bold uppercase bg-white left-8 bottom-8">
                  Accessories
                </div>
              </div>
              <div class="relative overflow-hidden group">
                <img src="/img/editor-pick-4.png" alt=""
                  class="w-full transition duration-500 group-hover:scale-110 ease">
                <div class="absolute px-10 py-4 text-xl font-bold uppercase bg-white left-8 bottom-8">
                  Kids
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- Editor pick section end --}}




    {{-- Best seller product start --}}
    <section class="my-20 md:my-40">
      <div class="w-10/12 mx-auto">
        <header class="mb-10 text-center">
          <h4 class="text-2xl font-normal text-slate-500">Featured Products</h4>
          <h1 class="my-4 text-4xl font-bold text-black uppercase">BESTSELLER PRODUCTS</h1>
          <p class="font-normal text-slate-500">Problems trying to resolve the conflict between </p>
        </header>
        <div class="grid grid-cols-4 gap-5">

          <livewire:components.card-product image="/img/product/img-1.png" title="Baju Renang"
            description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
          ipsum
          dolor..."
            price="500.000" />
          <livewire:components.card-product image="/img/product/img-2.png" title="Baju Kantor"
            description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
          ipsum
          dolor..."
            price="200.000" />
          <livewire:components.card-product image="/img/product/img-3.png" title="Baju Renang"
            description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
          ipsum
          dolor..."
            price="500.000" />
          <livewire:components.card-product image="/img/product/img-4.png" title="Baju Renang"
            description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
          ipsum
          dolor..."
            price="500.000" />
          <livewire:components.card-product image="/img/product/img-5.png" title="Baju Renang"
            description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
          ipsum
          dolor..."
            price="500.000" />
        </div>
      </div>
    </section>
    {{-- Best seller product end --}}

  </div>
