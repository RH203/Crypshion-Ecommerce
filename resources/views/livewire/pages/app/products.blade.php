<div class="mb-20">
  <livewire:components.breadcrumb page="Products" />

  <section class="flex items-center justify-between mb-5">
    <a href="/app/products/create" wire:navigate
      class="inline-block px-5 py-2 font-semibold text-white rounded-md bg-primaryBg">
      Add Product
    </a>
    <div class="relative">
      <input type="text" name="" id=""
        class="px-5 py-2 pl-10 text-lg border rounded-md placeholder:font-light" placeholder="Search...">
      <iconify-icon icon="lucide:search" class="absolute text-xl text-slate-400 left-3 top-3"></iconify-icon>
    </div>
  </section>


  <section class="">
    <div class="grid grid-cols-4 gap-5">
      @foreach ($products as $product)
        <livewire:components.card-product
          image="{{ isset($product->first_image) ? asset('storage/' . $product->first_image) : '' }}"
          title="{{ Str::limit($product->title, 55) }}" description="{{ Str::limit($product->description, 64) }}"
          price="{{ isset($product->first_price) ? number_format($product->first_price, 0, ',', '.') : '' }}"
          url="/app/products/{{ $product->id }}/show" />
      @endforeach

    </div>
  </section>
</div>
