<div class="mb-20">
  <livewire:components.breadcrumb page="Detail Products" />



  <div class="p-5 bg-white rounded-lg shadow-lg">
    <div>
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


      {{-- Description start --}}
      <section class="mt-8">
        <div class="w-full">
          <div class="w-full">
            <div class="border-b border-gray-200 ">
              <nav class="flex justify-center space-x-1" aria-label="Tabs" role="tablist">
                <button type="button"
                  class="inline-flex items-center px-3 py-4 text-sm text-gray-500 border-b-2 border-transparent hs-tab-active:font-semibold hs-tab-active:border-primary hs-tab-active:bg-transparent hs-tab-active:text-primary gap-x-2 whitespace-nowrap hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none active"
                  id="tabs-with-underline-item-1" data-hs-tab="#tabs-with-underline-1"
                  aria-controls="tabs-with-underline-1" role="tab">
                  Description
                </button>
                <button type="button"
                  class="inline-flex items-center px-3 py-4 text-sm text-gray-500 border-b-2 border-transparent hs-tab-active:font-semibold hs-tab-active:bg-transparent hs-tab-active:border-primary hs-tab-active:text-primary gap-x-2 whitespace-nowrap hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none"
                  id="tabs-with-underline-item-2" data-hs-tab="#tabs-with-underline-2"
                  aria-controls="tabs-with-underline-2" role="tab">
                  Reviews
                </button>
              </nav>
            </div>

            <div class="mt-3">
              <div id="tabs-with-underline-1" role="tabpanel" aria-labelledby="tabs-with-underline-item-1">
                <p class="text-gray-500">
                  {{ $product->description }}
                </p>
              </div>
              <div id="tabs-with-underline-2" class="hidden" role="tabpanel"
                aria-labelledby="tabs-with-underline-item-2">
                <p class="text-gray-500">
                <div class="grid grid-cols-3 gap-3">
                  <livewire:components.card-testimonial
                    message="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam
                  sequi vero, suscipit dolor voluptatum
                  deserunt natus consequatur nam tempore quo!"
                    image="/img/user/user-1.png" name="Irfan Yasin" label="Programmer" rating="5" />
                  <livewire:components.card-testimonial
                    message="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam
                  sequi vero, suscipit dolor voluptatum
                  deserunt natus consequatur nam tempore quo!"
                    image="/img/user/user-1.png" name="Irfan Yasin" label="Programmer" rating="5" />
                  <livewire:components.card-testimonial
                    message="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam
                  sequi vero, suscipit dolor voluptatum
                  deserunt natus consequatur nam tempore quo!"
                    image="/img/user/user-1.png" name="Irfan Yasin" label="Programmer" rating="5" />
                  <livewire:components.card-testimonial
                    message="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam
                  sequi vero, suscipit dolor voluptatum
                  deserunt natus consequatur nam tempore quo!"
                    image="/img/user/user-1.png" name="Irfan Yasin" label="Programmer" rating="5" />
                  <livewire:components.card-testimonial
                    message="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam
                  sequi vero, suscipit dolor voluptatum
                  deserunt natus consequatur nam tempore quo!"
                    image="/img/user/user-1.png" name="Irfan Yasin" label="Programmer" rating="5" />
                </div>
                </p>
              </div>
            </div>
          </div>
        </div>

      </section>
      {{-- Description end --}}
    </div>

  </div>
