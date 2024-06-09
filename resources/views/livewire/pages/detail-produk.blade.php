<div>

  <div class="w-11/12 mx-auto my-10 md:w-10/12">
    {{-- Detail product section start --}}
    <section class="grid grid-cols-1 gap-5 lg:grid-cols-5">
      {{-- Image display start --}}
      <div class="lg:col-span-2">
        @if (session('product_' . $id . '.first_image') || session('showImagePath'))
          <div class="w-full mt-0 overflow-hidden rounded-lg bg-slate-200 h-96">
            <img src="{{ asset('storage/' . (session('showImagePath') ?? session('product_' . $id . '.first_image'))) }}"
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

      <div class="lg:col-span-3">
        {{-- Stock, Sold and reviews start --}}
        <h1 class="text-3xl font-semibold">{{ session('product_' . $id . '.title') }}</h1>
        <div class="my-3">
          <span class="text-slate-500">{{ session('product_' . $id . '.stock') }} Stock</span>
          <span class="mx-2">|</span>
          <span class="text-slate-500">{{ $sold }} Sold</span>
          <span class="mx-2">|</span>
          <span class="text-slate-500">{{ $ratingProductCount->count() }} Ratings</span>
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
            @php
              $roundedRating = round($averageRatings);
            @endphp

            @for ($i = 1; $i <= 5; $i++)
              <iconify-icon icon="{{ $i <= $roundedRating ? 'solar:star-bold' : 'solar:star-line-duotone' }}"
                class="text-warning text-md text-primary"></iconify-icon>
            @endfor

          </div>
        </div>
        {{-- Raings end --}}

        {{-- Price start --}}
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
        {{-- Price end --}}

        {{-- Size start --}}
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

        {{-- Size end --}}



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



        {{-- Button start --}}
        @guest
          <div class="mt-5">
            <a href="/login" wire:navigate
              class="flex items-center px-10 py-3 font-semibold text-white rounded-lg w-52 bg-primaryBg">
              <iconify-icon icon="tdesign:cart" class="text-xl font-bold"></iconify-icon> &nbsp; Add to cart</a>
          </div>
        @endguest
        @auth
          @if (auth()->user()->hasRole('user'))
            <form wire:submit.prevent='addToCart' class="">
              <div class="flex gap-3 mt-3">
                <div>
                  @if ($isComplete)
                    <button type="submit"
                      class="flex items-center px-10 py-3 font-semibold text-white rounded-lg w-52 bg-primaryBg">
                      <iconify-icon icon="tdesign:cart" class="text-xl font-bold"></iconify-icon> &nbsp; Add to
                      cart</button>
                  @else
                    <a href="/profile" wire:navigate
                      class="flex items-center px-10 py-3 font-semibold text-white rounded-lg w-52 bg-primaryBg">
                      <iconify-icon icon="tdesign:cart" class="text-xl font-bold"></iconify-icon> &nbsp; Add to
                      cart</a>
                  @endif
                </div>

                <!-- Input Number -->
                <div class="inline-block px-3 py-3 bg-white border border-gray-200 rounded-lg" data-hs-input-number="">
                  <div class="flex items-center gap-x-1.5">
                    <button type="button"
                      class="inline-flex items-center justify-center text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-md shadow-sm size-6 gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                      wire:click="decrement">
                      <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                      </svg>
                    </button>
                    <input class="w-6 p-0 text-center text-gray-800 bg-transparent border-0 focus:ring-0" type="text"
                      value="1" name="quantity" wire:model='quantity' data-hs-input-number-input="">
                    <button type="button"
                      class="inline-flex items-center justify-center text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-md shadow-sm size-6 gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                      wire:click="increment">
                      <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                      </svg>
                    </button>
                  </div>
                </div>
                <!-- End Input Number -->
              </div>
            </form>
          @endif
        @endauth
        {{-- Button end --}}

      </div>

    </section>
    {{-- Detail product section end --}}

    {{-- Additional Information container Start --}}
    <div class="my-14">
      <div class="border-b border-gray-200">
        <nav class="-mb-0.5 flex justify-center space-x-6" aria-label="Tabs" role="tablist">
          <button type="button"
            class="inline-flex items-center px-1 py-4 text-sm text-gray-500 border-b-2 border-transparent hs-tab-active:font-semibold hs-tab-active:bg-transparent hs-tab-active:text-primary gap-x-2 whitespace-nowrap hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none active"
            id="horizontal-alignment-item-1" data-hs-tab="#horizontal-alignment-1"
            aria-controls="horizontal-alignment-1" role="tab">
            Description
          </button>
          <button type="button"
            class="inline-flex items-center px-1 py-4 text-sm text-gray-500 border-b-2 border-transparent hs-tab-active:font-semibold hs-tab-active:bg-transparent hs-tab-active:text-primary gap-x-2 whitespace-nowrap hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none"
            id="horizontal-alignment-item-2" data-hs-tab="#horizontal-alignment-2"
            aria-controls="horizontal-alignment-2" role="tab">
            Reviews <span>({{ $reviewCount }})</span>
          </button>
        </nav>
      </div>

      <div class="mt-3">
        <div id="horizontal-alignment-1" role="tabpanel" aria-labelledby="horizontal-alignment-item-1">
          <p class="text-gray-500">
            {{ session('product_' . $id . '.description') }}
            {{-- {{ $products->description }} --}}
          </p>
        </div>
        <div id="horizontal-alignment-2" class="hidden" role="tabpanel"
          aria-labelledby="horizontal-alignment-item-2">
          <div class="grid grid-cols-1 gap-3 lg:grid-cols-3">
            @foreach ($ratingProductCount as $review)
              @if ($review->review != null)
                <livewire:components.card-testimonial message="{{ $review->review }}"
                  image="{{ asset('storage/file/avatar/' . $review->user->avatar) }}"
                  name="{{ $review->user->name }}" label="Customer" rating="{{ $review->rating }}" />
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
    {{-- Additional Information container End --}}

    {{-- Best Seller Products Start --}}
    <div class="">
      <header>
        <h2 class="text-lg font-bold text-blueNavy">RECOMMENDATION PRODUCT</h2>
      </header>
      <hr class="my-5 border-gray-500">
      <div class="grid grid-cols-2 gap-2 md:gap-5 md:grid-cols-2 lg:grid-cols-5">
        {{-- @foreach ($products as $product)
          <livewire:components.card-product image="{{ asset('storage/' . $product->first_image) }}"
            title="{{ Str::limit($product->title, 45) }}" description="{{ Str::limit($product->description, 60) }}"
            price="{{ isset($product->first_price) ? number_format($product->first_price, 0, ',', '.') : '' }}"
            productId="{{ $product->id }}" url="/products/{{ $product->id }}/show" />
        @endforeach --}}
      </div>
    </div>
    {{-- Best Seller Products End --}}
  </div>

</div>
