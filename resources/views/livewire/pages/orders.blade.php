<div class="my-10">

  <div class="w-11/12 mx-auto md:w-10/12">

    <header class="text-center">
      <h1 class="text-4xl font-bold">My Orders</h1>
      <p class="mt-3 font-normal text-slate-500">Monitoring the order process until completion</p>
    </header>

    <section class="p-5 mt-10 bg-white rounded-lg shadow-lg">
      <div class="grid grid-cols-2 gap-3">
        @if ($products && $products->isNotEmpty())
          @foreach ($products as $product)
            <div class="flex gap-4">
              <div class="h-48 overflow-hidden rounded-lg basis-4/12 md:h-40 bg-slate-200">
                <img src="{{ asset('storage/' . $product->image) }}" alt="" width="w-full object-cover">
              </div>
              <div class="basis-8/12">
                <h3>{{ Str::limit($product->product->title, 60) }}</h3>
              </div>
            </div>
          @endforeach
        @else
          <p>No products found.</p>
        @endif


      </div>
    </section>

  </div>
</div>
