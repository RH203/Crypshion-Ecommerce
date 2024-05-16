<div class="shadow-md card-product rounded-xl group">
  <a href="#" class="inline">
    <div class="overflow-hidden bg-slate-200 rounded-xl h-96 img-product">
      <img src="{{ $image }}" alt="product"
        class="w-full transition duration-500 ease-linear group-hover:scale-110">
    </div>
    <div class="p-4 content">
      <h4 class="text-xl font-semibold text-slate-800">{{ $title }}</h4>
      <p class="my-2 text-sm font-light text-slate-500">{{ $description }}</p>
      <div class="flex items-center">
        <div id="icon">
          <iconify-icon icon="material-symbols:star-rounded" class="text-xl text-yellow-500"></iconify-icon>
          <iconify-icon icon="material-symbols:star-rounded" class="text-xl text-yellow-500"></iconify-icon>
          <iconify-icon icon="material-symbols:star-rounded" class="text-xl text-yellow-500"></iconify-icon>
          <iconify-icon icon="material-symbols:star-half-rounded" class="text-xl text-yellow-500"></iconify-icon>
          <iconify-icon icon="ic:round-star-border" class="text-xl text-yellow-500"></iconify-icon>
        </div>
        <small class="mb-1 text-yellow-500 ms-3">3.5</small>
      </div>
      <div class="text-xl font-semibold text-slate-800">Rp. {{ $price }}</div>
      <div class="flex mt-3">
        <div class="basis-8/12 me-2">
          <a href="" class="flex items-center justify-center w-full h-12 text-white bg-blue-500 rounded-lg">Buy
            Now</a>
        </div>
        <div class="basis-4/12">
          <a href=""
            class="flex items-center justify-center w-full h-12 text-blue-500 border border-blue-500 rounded-lg"><iconify-icon
              icon="bi:cart" class="text-2xl"></iconify-icon></a>
        </div>
      </div>
    </div>
  </a>
</div>
