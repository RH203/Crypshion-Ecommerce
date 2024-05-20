<div>
<div class="w-11/12 mx-auto md:w-10/12">
    <div class="flex items-center justify-between my-5 breadcrumb">
        <h3 class="text-xl font-semibold">Shop</h3>
            <ol class="flex items-center whitespace-nowrap">
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
        href="#">
        Home
      </a>
      <svg class="flex-shrink-0 mx-2 overflow-visible text-gray-400 size-4 dark:text-neutral-600"
        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m9 18 6-6-6-6"></path>
      </svg>
    </li>

    <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
      aria-current="page">
      Shop
    </li>
  </ol>
</div>


{{-- Product List --}}
<section class="my-36 md:my-40">
    <div class="w-11/12 mx-auto md:w-10/12">
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
            <livewire:components.card-product image="/img/product/img-1.png" title="Baju Renang"
                description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
            ipsum
            dolor..."
                price="500.000" />
            <livewire:components.card-product image="/img/product/img-2.png" title="Baju Kantor"
                description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
            ipsum
            dolor..."
                price="200.000" />
            <livewire:components.card-product image="/img/product/img-3.png" title="Baju Renang"
                description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
            ipsum
            dolor..."
                price="500.000" />
            <livewire:components.card-product image="/img/product/img-4.png" title="Baju Renang"
                description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
            ipsum
            dolor..."
                price="500.000" />
            <livewire:components.card-product image="/img/product/img-5.png" title="Baju Renang"
                description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
            ipsum
            dolor..."
                price="500.000" />
            <livewire:components.card-product image="/img/product/img-6.png" title="Baju Renang"
                description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
            ipsum
            dolor..."
                price="500.000" />
            <livewire:components.card-product image="/img/product/img-7.png" title="Baju Renang"
                description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
            ipsum
            dolor..."
                price="500.000" />
            <livewire:components.card-product image="/img/product/img-8.png" title="Baju Renang"
                description="Lorem ipsum dolor sit amet elit. Recusandae, Lorem,
            ipsum
            dolor..."
                price="500.000" />
        </div>
    </div>
</section>
{{-- Product List --}}


<!-- Pagination -->
<nav class="flex items-center -space-x-px">
  <button type="button" class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm first:rounded-s-lg last:rounded-e-lg border border-gray-200 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
    <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="m15 18-6-6 6-6"></path>
    </svg>
    <span class="hidden sm:block">Previous</span>
  </button>
  <button type="button" class="min-h-[38px] min-w-[38px] flex justify-center items-center bg-gray-200 text-gray-800 border border-gray-200 py-2 px-3 text-sm first:rounded-s-lg last:rounded-e-lg focus:outline-none focus:bg-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-600 dark:border-neutral-700 dark:text-white dark:focus:bg-neutral-500" aria-current="page">1</button>
  <button type="button" class="min-h-[38px] min-w-[38px] flex justify-center items-center border border-gray-200 text-gray-800 hover:bg-gray-100 py-2 px-3 text-sm first:rounded-s-lg last:rounded-e-lg focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">2</button>
  <button type="button" class="min-h-[38px] min-w-[38px] flex justify-center items-center border border-gray-200 text-gray-800 hover:bg-gray-100 py-2 px-3 text-sm first:rounded-s-lg last:rounded-e-lg focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">3</button>
  <button type="button" class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm first:rounded-s-lg last:rounded-e-lg border border-gray-200 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
    <span class="hidden sm:block">Next</span>
    <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="m9 18 6-6-6-6"></path>
    </svg>
  </button>
</nav>
<!-- End Pagination -->
</div>