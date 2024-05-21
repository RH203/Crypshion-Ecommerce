<div>
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
    <div class="grid grid-cols-3 gap-5">

      <livewire:components.card-product image="/img/product/img-9.jpg" title="Baju Renang"
        description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
          ipsum
          dolor..."
        price="500.000" />
      <livewire:components.card-product image="/img/product/img-9.jpg" title="Baju Renang"
        description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
          ipsum
          dolor..."
        price="500.000" />
      <livewire:components.card-product image="/img/product/img-9.jpg" title="Baju Renang"
        description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
          ipsum
          dolor..."
        price="500.000" />
      <livewire:components.card-product image="/img/product/img-9.jpg" title="Baju Renang"
        description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
          ipsum
          dolor..."
        price="500.000" />

    </div>
  </section>
</div>
