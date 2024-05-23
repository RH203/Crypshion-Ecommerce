<div class="mb-20">
  <livewire:components.breadcrumb page="Detail Products" />
  <section class="grid grid-cols-3 gap-5 p-5 bg-white rounded-lg shadow-lg">

    <div>
      @if (session('product_' . $id . '.first_image') || session('showImagePath'))
        <div class="w-full mt-0 overflow-hidden rounded-lg bg-slate-200 h-80">
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

    <div class="col-span-2">
      <h1 class="text-3xl font-semibold">{{ session('product_' . $id . '.title') }}</h1>
      <div class="my-3">
        <span class="text-slate-500">{{ session('product_' . $id . '.stock') }} Stock</span>
        <span class="mx-2">|</span>
        <span class="text-slate-500">135 Sold</span>
        <span class="mx-2">|</span>
        <span class="text-slate-500">56 Reviews</span>
      </div>

      <div class="font-semibold">
        <h3>{{ session('product_' . $id . '.category.title') }}</h3>
      </div>

      <div class="flex items-center mt-3">
        <div id="icon" class="text-4xl">
          <iconify-icon icon="material-symbols:star-rounded" class="text-yellow-500 "></iconify-icon>
          <iconify-icon icon="material-symbols:star-rounded" class="text-yellow-500 "></iconify-icon>
          <iconify-icon icon="material-symbols:star-rounded" class="text-yellow-500 "></iconify-icon>
          <iconify-icon icon="material-symbols:star-half-rounded" class="text-yellow-500 "></iconify-icon>
          <iconify-icon icon="ic:round-star-border" class="text-yellow-500 "></iconify-icon>
        </div>
      </div>
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
    </div>
  </section>
</div>
