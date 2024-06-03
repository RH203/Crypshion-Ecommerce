<div>
  <div class="w-11/12 mx-auto md:w-10/12">
    <div class="flex items-center justify-between my-5 breadcrumb">
      <h3 class="text-xl font-semibold">Shop</h3>
      <ol class="flex items-center whitespace-nowrap">
        <li class="inline-flex items-center">
          <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
            href="#">
            Home
          </a>
          <svg class="flex-shrink-0 mx-2 overflow-visible text-gray-400 size-4 dark:text-neutral-600"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
          </svg>
        </li>
        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
          aria-current="page">
          Shop
        </li>
      </ol>
    </div>

    <div class="grid grid-cols-2 gap-4 mt-5 bg-white-200 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
      <div class="relative flex justify-center h-52 bg-white-400">
        <img src="/img/product2/col-md-4 (4).png" alt="">
        <div class="absolute flex items-center justify-center w-full h-full ">
          <p class="font-bold text-white">
            CLOTHS <span class="block font-normal">
              5 items
            </span>
          </p>
        </div>
      </div>
      <div class="relative flex justify-center h-52 bg-white-400">
        <img src="/img/product2/col-md-4 (3).png" alt="">
        <div class="absolute flex items-center justify-center w-full h-full ">
          <p class="font-bold text-white">
            CLOTHS <span class="block font-normal">
              5 items
            </span>
          </p>
        </div>
      </div>
      <div class="relative flex justify-center h-52 bg-white-400">
        <img src="/img/product2/col-md-4 (2).png" alt="">
        <div class="absolute flex items-center justify-center w-full h-full ">
          <p class="font-bold text-white">
            CLOTHS <span class="block font-normal">
              5 items
            </span>
          </p>
        </div>
      </div>
      <div class="relative flex justify-center h-52 bg-white-400">
        <img src="/img/product2/col-md-4 (1).png" alt="">
        <div class="absolute flex items-center justify-center w-full h-full ">
          <p class="font-bold text-white">
            CLOTHS <span class="block font-normal">
              5 items
            </span>
          </p>
        </div>
      </div>
      <div class="relative flex justify-center h-52 bg-white-400">
        <img src="/img/product2/col-md-4 (5).png" alt="">
        <div class="absolute flex items-center justify-center w-full h-full ">
          <p class="font-bold text-white">
            CLOTHS <span class="block font-normal">
              5 items
            </span>
          </p>
        </div>
      </div>
      <div class="relative flex justify-center h-52 bg-white-400">
        <img src="/img/product2/col-md-4 (5).png" alt="">
        <div class="absolute flex items-center justify-center w-full h-full ">
          <p class="font-bold text-white">
            CLOTHS <span class="block font-normal">
              5 items
            </span>
          </p>
        </div>
      </div>
    </div>

    {{-- Filter and search star --}}
    <section class="my-12">
      <div class="flex items-center justify-end">
        <div class="relative">
          <input type="search" wire:model.live='search' name="search" id=""
            class="w-full px-3 py-2 pl-10 border-2 rounded-lg border-primary md:w-80" placeholder="Search...">
          <iconify-icon icon="uil:search" class="absolute text-2xl left-3 top-2 text-slate-500"></iconify-icon>
        </div>
      </div>
    </section>
    {{-- Filter and search end --}}

    {{-- Product List --}}
    <section class="">
      <div class="grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-5">
        @foreach ($products as $product)
          <livewire:components.card-product image="{{ asset('storage/' . $product->first_image) }}"
            title="{{ Str::limit($product->title, 45) }}" description="{{ Str::limit($product->description, 60) }}"
            rating="{{ isset($averageRatings[$product->id]) ? $averageRatings[$product->id] : 0 }}"
            sold="{{ isset($soldQuantities[$product->id]) ? $soldQuantities[$product->id] : 0 }}"
            price="{{ isset($product->first_price) ? number_format($product->first_price, 0, ',', '.') : '' }}"
            productId="{{ $product->id }}" url="/products/{{ $product->id }}/show" />
        @endforeach
      </div>
    </section>
    {{-- Product List --}}


    <!-- Pagination -->
    <nav class="flex items-center justify-center my-20 -space-x-px">
      <button type="button"
        class="min-h-[42px] min-w-[42px] py-2.5 px-3 inline-flex justify-center items-center gap-x-1.5 text-base first:rounded-s-lg last:rounded-e-lg border-2 border-gray-700 text-gray-700 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-400 dark:text-gray-400 dark:hover:bg-white/10 dark:focus:bg-white/10">
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="m15 18-6-6 6-6"></path>
        </svg>
        <span class="hidden sm:block">Previous</span>
      </button>
      <button type="button"
        class="min-h-[42px] min-w-[42px] flex justify-center items-center bg-gray-200 text-gray-700 border-2 border-gray-700 py-2.5 px-3 text-base first:rounded-s-lg last:rounded-e-lg focus:outline-none focus:bg-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-gray-400 dark:text-gray-400 dark:focus:bg-neutral-600"
        aria-current="page">1</button>
      <button type="button"
        class="min-h-[42px] min-w-[42px] flex justify-center items-center border-2 border-gray-700 text-gray-700 hover:bg-gray-200 py-2.5 px-3 text-base first:rounded-s-lg last:rounded-e-lg focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-400 dark:text-gray-400 dark:hover:bg-white/10 dark:focus:bg-white/10">2</button>
      <button type="button"
        class="min-h-[42px] min-w-[42px] flex justify-center items-center border-2 border-gray-700 text-gray-700 hover:bg-gray-200 py-2.5 px-3 text-base first:rounded-s-lg last:rounded-e-lg focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-400 dark:text-gray-400 dark:hover:bg-white/10 dark:focus:bg-white/10">3</button>
      <button type="button"
        class="min-h-[42px] min-w-[42px] py-2.5 px-3 inline-flex justify-center items-center gap-x-1.5 text-base first:rounded-s-lg last:rounded-e-lg border-2 border-gray-700 text-gray-700 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-400 dark:text-gray-400 dark:hover:bg-white/10 dark:focus:bg-white/10">
        <span class="hidden sm:block">Next</span>
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="m9 18 6-6-6-6"></path>
        </svg>
      </button>
    </nav>
    <!-- End Pagination -->

  </div>
