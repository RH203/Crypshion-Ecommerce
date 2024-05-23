<div class="relative pb-12 shadow-md card-product rounded-xl group">
  <a href="{{ $url }}" wire:navigate class="inline">
    <div class="h-56 overflow-hidden bg-slate-200 rounded-xl img-product">
      <img src="{{ $image }}" alt="product"
        class="object-cover w-full h-full transition duration-500 ease-linear group-hover:scale-110">
    </div>
    <div class="p-4 content">
      <h4 class="text-sm font-semibold text-slate-800">{{ $title }}</h4>
      <p class="my-2 text-xs font-light text-slate-500">{{ $description }}</p>

      <div class="absolute w-full pr-8 bottom-4">
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <div id="icon" class="text-md">
              <iconify-icon icon="material-symbols:star-rounded" class="text-yellow-500 "></iconify-icon>
              <iconify-icon icon="material-symbols:star-rounded" class="text-yellow-500 "></iconify-icon>
              <iconify-icon icon="material-symbols:star-rounded" class="text-yellow-500 "></iconify-icon>
              <iconify-icon icon="material-symbols:star-half-rounded" class="text-yellow-500 "></iconify-icon>
              <iconify-icon icon="ic:round-star-border" class="text-yellow-500 "></iconify-icon>
            </div>
            {{-- <small class="mb-1 text-yellow-500 ms-1">3.5</small> --}}
          </div>
          <span class="hidden text-xs text-slate-500 md:block">
            100+ Sold
          </span>
        </div>
        <div class="flex justify-between font-sm mibold text-md text-slate-800">
          <span class="font-normal">
            Rp. {{ $price }}
          </span>

          @guest
            <a href="" class="right-0 flex items-center justify-center font-bold text-black"><iconify-icon
                icon="bi:cart" class="text-lg"></iconify-icon></a>
          @endguest
          @auth
            @if (!auth()->user()->hasRole('admin'))
              <a href="" class="right-0 flex items-center justify-center font-bold text-black"><iconify-icon
                  icon="bi:cart" class="text-lg"></iconify-icon></a>
            @endif
          @endauth
        </div>
      </div>
    </div>
  </a>
</div>
