<div class="relative p-5 shadow-md rounded-xl card">
  <div id="icon">
    <iconify-icon icon="material-symbols:star-rounded" class="text-xl text-yellow-500"></iconify-icon>
    <iconify-icon icon="material-symbols:star-rounded" class="text-xl text-yellow-500"></iconify-icon>
    <iconify-icon icon="material-symbols:star-rounded" class="text-xl text-yellow-500"></iconify-icon>
    <iconify-icon icon="material-symbols:star-half-rounded" class="text-xl text-yellow-500"></iconify-icon>
    <iconify-icon icon="ic:round-star-border" class="text-xl text-yellow-500"></iconify-icon>
  </div>
  <div class="mb-20">
    <p class="font-light text-slate-500">{{ $message }}</p>
  </div>
  <div class="absolute flex items-center mt-5 bottom-5">
    <div class="overflow-hidden rounded-full w-14 h-14 bg-slate-200">
      <img src="{{ $image }}" alt="" class="w-full">
    </div>
    <div class="ms-3">
      <h4 class="font-semibold">{{ $name }}</h4>
      <small class="font-normal text-slate-500">{{ $label }}</small>
    </div>
  </div>
</div>
