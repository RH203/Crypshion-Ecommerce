<div class="my-10">
  <div class="w-11/12 mx-auto lg:w-6/12">
    <header class="text-center">
      <h1 class="text-4xl font-bold">Order Histories</h1>
      <p class="mt-3 font-normal text-slate-500">Monitoring the order process until completion</p>
    </header>

    <section class="p-5 mt-10 bg-white shadow-lg rounded-xl">
      <div class="gap-3">
        @if ($products && $products->isNotEmpty())
          @foreach ($products as $product)
            @if ($product->status == 'Canceled' || $product->status == 'Confirmed')
              <a href="/order-history/{{ $product->code }}" wire:navigate class="block">
                <div class="flex gap-4">
                  <div class="h-full overflow-hidden rounded-lg basis-4/12 md:h-40 bg-slate-200">
                    <img src="{{ asset('storage/' . $product->image) }}" alt=""
                      class="object-cover w-full h-full">
                  </div>
                  <div class="basis-8/12">
                    <h3 class="hidden md:block">{{ Str::limit($product->product->title, 70) }}</h3>
                    <h3 class="block md:hidden">{{ Str::limit($product->product->title, 45) }}</h3>
                    <p class="my-1 md:my-2 text-slate-500">{{ $product->estimation }}</p>
                    <div class="flex items-center justify-between">
                      <div class="text-lg md:text-2xl">
                        Rp. <span class="font-semibold">{{ number_format($product->price, 0, ',', '.') }}</span>
                      </div>
                      </h1>
                      <p
                        class="px-2 my-2 text-sm {{ $product->status == 'Confirmed' ? 'text-white bg-purple-600' : '' }}{{ $product->status == 'Canceled' ? 'text-white bg-red-600' : '' }} rounded-full">
                        {{ $product->status }}</p>
                    </div>
                    <p class="text-sm text-slate-500">{{ $product->code }}</p>

                  </div>
                </div>
                <hr class="my-4">
              </a>
            @endif
          @endforeach
        @else
          <section class="my-20 text-center">
            <iconify-icon icon="material-symbols:shopping-cart-off-outline"
              class="text-9xl text-slate-500"></iconify-icon>
            <h3 class="text-2xl text-slate-500">No Product Orders</h3>
          </section>
        @endif
      </div>
    </section>
  </div>
</div>
