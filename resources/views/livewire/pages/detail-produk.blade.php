<div>

  {{-- Breadcrumb Start --}}
  <div class="w-10/12 mx-auto mb-5">
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
      <li class="inline-flex items-center">
        <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
          href="#">
          App Center
          <svg class="flex-shrink-0 mx-2 overflow-visible text-gray-400 size-4 dark:text-neutral-600"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
          </svg>
        </a>
      </li>
      <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
        aria-current="page">
        Application
      </li>
    </ol>
  </div>

  {{-- Breadcrumb End --}}

  {{-- Product Start --}}
  <div class="w-10/12 mx-auto">
    {{-- Detail product section start --}}
    <section class="grid grid-cols-3 gap-5">
      {{-- Image display start --}}
      <div>
        @if (session('product_' . $id . '.first_image') || session('showImagePath'))
          <div class="w-full mt-0 overflow-hidden rounded-lg bg-slate-200 h-80">
            <img
              src="{{ asset('storage/' . (session('showImagePath') ?? session('product_' . $id . '.first_image'))) }}"
              alt="{{ session('product_' . $id . '.name') }}" class="object-cover w-full h-full">
          </div>
        @endif
        <div class="flex w-full gap-2 py-2 mt-1 overflow-auto scrollbar-menu flex-nowrap">
          @if (is_array(session('product_' . $id . '.images')))
            @foreach (session('product_' . $id . '.images') as $image)
              <a href="#" class="" wire:click.prevent='showImage("{{ $image }}")'>
                <div class="flex-shrink-0 w-16 h-16 overflow-hidden bg-white rounded-lg shadow-md product-images">
                  <img src="{{ asset('storage/' . $image) }}" alt="{{ session('product_' . $id . '.name') }}"
                    class="object-cover w-full h-full">
                </div>
              </a>
            @endforeach
          @endif
        </div>
      </div>
      {{-- Image display end --}}

      <div class="col-span-2">
        {{-- Stock, Sold and reviews start --}}
        <h1 class="text-3xl font-semibold">{{ session('product_' . $id . '.title') }}</h1>
        <div class="my-3">
          <span class="text-slate-500">{{ session('product_' . $id . '.stock') }} Stock</span>
          <span class="mx-2">|</span>
          <span class="text-slate-500">135 Sold</span>
          <span class="mx-2">|</span>
          <span class="text-slate-500">56 Reviews</span>
        </div>
        {{-- Stock, Sold and reviews end --}}

        {{-- Title start --}}
        <div class="font-semibold">
          <h3>{{ session('product_' . $id . '.category.title') }}</h3>
        </div>
        {{-- Title end --}}

        {{-- Ratings start --}}
        <div class="flex items-center mt-3">
          <div id="icon" class="text-4xl">
            <iconify-icon icon="material-symbols:star-rounded" class="text-yellow-500 "></iconify-icon>
            <iconify-icon icon="material-symbols:star-rounded" class="text-yellow-500 "></iconify-icon>
            <iconify-icon icon="material-symbols:star-rounded" class="text-yellow-500 "></iconify-icon>
            <iconify-icon icon="material-symbols:star-half-rounded" class="text-yellow-500 "></iconify-icon>
            <iconify-icon icon="ic:round-star-border" class="text-yellow-500 "></iconify-icon>
          </div>
        </div>
        {{-- Raings end --}}

        {{-- Size start --}}
        <div class="flex text-2xl">
          @if ($size)
            <h3>Rp <span class="font-semibold">{{ number_format($size, 0, ',', '.') }}</span></h3>
          @else
            <h3>Rp <span
                class="font-semibold">{{ number_format(session('product_' . $id . '.lowest_price'), 0, ',', '.') }}</span>
            </h3>
            <span class="mx-2">-</span>
            <h3>Rp <span
                class="font-semibold">{{ number_format(session('product_' . $id . '.highest_price'), 0, ',', '.') }}</span>
            </h3>
          @endif
        </div>
        {{-- Size end --}}

        {{-- Price start --}}
        <form wire:submit.prevent='selectSize' class="flex flex-wrap mt-4">
          @if (is_array(session('product_' . $id . '.prices')))
            @foreach (session('product_' . $id . '.prices') as $size => $price)
              <div class="mb-3">
                <input type="radio" name="size" id="{{ $size }}" value="{{ $price }}"
                  wire:model.live="size" class="hidden">
                <label for="{{ $size }}"
                  class="block px-5 py-1 text-sm border border-label-size hover:cursor-pointer border-slate-500 md:px-7 text-slate-500 me-2">
                  {{ $size }}
                </label>
              </div>
            @endforeach
          @endif
        </form>
        {{-- Price end --}}



        {{-- Color start --}}
        <form wire:submit.prevent='selectColor' class="flex flex-wrap">
          @if (is_array(session('product_' . $id . '.colors')))
            @foreach (session('product_' . $id . '.colors') as $color)
              <div class="mb-3">
                <input type="radio" name="color" id="{{ $color }}" value="{{ $color }}"
                  wire:model.live="color" class="hidden">
                <label for="{{ $color }}"
                  class="block px-5 py-1 text-sm border border-label-color hover:cursor-pointer border-slate-500 md:px-7 text-slate-500 me-2">
                  {{ $color }}
                </label>
              </div>
            @endforeach
          @endif
        </form>
        {{-- Color end --}}
      </div>




    </section>
    {{-- Detail product section end --}}

    {{-- Additional Information container Start --}}
    <div class="w-10/12 mx-auto my-14">
      <div class="border-b border-gray-200">
        <nav class="-mb-0.5 flex justify-center space-x-6" aria-label="Tabs" role="tablist">
          <button type="button"
            class="inline-flex items-center px-1 py-4 text-sm text-gray-500 border-b-2 border-transparent hs-tab-active:font-semibold hs-tab-active:bg-transparent hs-tab-active:text-blue-600 gap-x-2 whitespace-nowrap hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none active"
            id="horizontal-alignment-item-1" data-hs-tab="#horizontal-alignment-1"
            aria-controls="horizontal-alignment-1" role="tab">
            Description
          </button>
          <button type="button"
            class="inline-flex items-center px-1 py-4 text-sm text-gray-500 border-b-2 border-transparent hs-tab-active:font-semibold hs-tab-active:bg-transparent hs-tab-active:text-blue-600 gap-x-2 whitespace-nowrap hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none"
            id="horizontal-alignment-item-2" data-hs-tab="#horizontal-alignment-2"
            aria-controls="horizontal-alignment-2" role="tab">
            Additional Information
          </button>
          <button type="button"
            class="inline-flex items-center px-1 py-4 text-sm text-gray-500 border-b-2 border-transparent hs-tab-active:font-semibold hs-tab-active:bg-transparent hs-tab-active:text-blue-600 gap-x-2 whitespace-nowrap hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none"
            id="horizontal-alignment-item-3" data-hs-tab="#horizontal-alignment-3"
            aria-controls="horizontal-alignment-3" role="tab">
            Reviews <span>(0)</span>
          </button>
        </nav>
      </div>

      <div class="mt-3">
        <div id="horizontal-alignment-1" role="tabpanel" aria-labelledby="horizontal-alignment-item-1">
          <p class="text-gray-500">
            This is the <em class="font-semibold text-gray-800">first</em> item's tab body.
          </p>
        </div>
        <div id="horizontal-alignment-2" class="hidden" role="tabpanel"
          aria-labelledby="horizontal-alignment-item-2">
          <div class="w-10/12 mx-auto">

            <div class="grid grid-rows-1 lg:grid-rows-1 md:grid-rows-2 sm:grid-rows-1">

              <div class="grid gap-5 md:grid-cols-3 sm:grid-cols-1 md:gap-3">
                <!-- Image Product Start-->
                <div class="">
                  <img src="/img/detail-product/card-item.png" alt="" class="w-full h-72 lg:h-72 md:h-60">
                </div>
                <!-- Image Product End-->

                <!-- Description Product Start 1-->
                <div class="flex flex-col gap-3">
                  <header>
                    <h3 class="font-bold text-blueNavy">the quick fox jumps over</h3>
                  </header>

                  <div class="flex flex-col gap-3">
                    <p class="text-xs font-medium text-gray-500">Met minim Mollie non desert Alamo est sit cliquey
                      dolor
                      do met sent. RELIT official consequent door
                      ENIM RELIT Mollie. Excitation venial consequent sent nostrum met.</p>
                    <p class="text-xs font-medium text-gray-500">Met minim Mollie non desert Alamo est sit cliquey
                      dolor
                      do met sent. RELIT official consequent door
                      ENIM RELIT Mollie. Excitation venial consequent sent nostrum met.</p>
                    <p class="text-xs font-medium text-gray-500">Met minim Mollie non desert Alamo est sit cliquey
                      dolor
                      do met sent. RELIT official consequent door
                      ENIM RELIT Mollie. Excitation venial consequent sent nostrum met.</p>
                  </div>
                </div>
                <!-- Description Product End 1-->

                <!-- Description Product Start 2 -->
                <div class="flex flex-col gap-3">
                  <header>
                    <h3 class="font-bold text-blueNavy">the quick fox jumps over</h3>
                  </header>

                  <div class="flex flex-col gap-3">
                    <p class="text-xs font-medium text-gray-500">Met minim Mollie non desert Alamo est sit cliquey
                      dolor
                      do met sent. RELIT official consequent door
                      ENIM RELIT Mollie. Excitation venial consequent sent nostrum met.</p>
                    <p class="text-xs font-medium text-gray-500">Met minim Mollie non desert Alamo est sit cliquey
                      dolor
                      do met sent. RELIT official consequent door
                      ENIM RELIT Mollie. Excitation venial consequent sent nostrum met.</p>
                    <p class="text-xs font-medium text-gray-500">Met minim Mollie non desert Alamo est sit cliquey
                      dolor
                      do met sent. RELIT official consequent door
                      ENIM RELIT Mollie. Excitation venial consequent sent nostrum met.</p>
                  </div>
                </div>
                <!-- Description Product End 2 -->
              </div>
            </div>
          </div>
          <div id="horizontal-alignment-3" class="hidden" role="tabpanel"
            aria-labelledby="horizontal-alignment-item-3">
            <p class="text-gray-500">
              This is the <em class="font-semibold text-gray-800">third</em> item's tab body.
            </p>
          </div>
        </div>
      </div>
    </div>
    {{-- Additional Information container End --}}


  </div>
  {{-- Best Seller Products Start --}}
  <div class="w-10/12 mx-auto">
    <header>
      <h2 class="text-lg font-bold text-blueNavy">RECOMMENDATION PRODUCT</h2>
    </header>
    <hr class="my-5 border-gray-500">

    <div class="grid grid-rows-2 gap-5">
      <div class="grid grid-cols-2 gap-2 md:gap-5 md:grid-cols-2 lg:grid-cols-5">
        @foreach ($products as $product)
          <livewire:components.card-product image="{{ asset('storage/' . $product->first_image) }}"
            title="{{ Str::limit($product->title, 45) }}" description="{{ Str::limit($product->description, 60) }}"
            price="{{ isset($product->first_price) ? number_format($product->first_price, 0, ',', '.') : '' }}"
            productId="{{ $product->id }}" url="/products/{{ $product->id }}/show" />
        @endforeach
      </div>
    </div>
  </div>
  {{-- Best Seller Products End --}}
</div>
