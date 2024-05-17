<div>
  {{-- @livewire('components.navbar') --}}
  <div class="flex">
    <aside class="h-screen p-4 px-10 bg-white shadow-lg basis-3/12">
      <div class="flex justify-center mb-5">
        <img src="/img/logo/secon-logo.png" alt="" class="w-8/12">
      </div>
      <ul>
        <li class="">
          <a href=""
            class="flex items-center px-4 py-4 mb-2 bg-white rounded-md hover:bg-primaryBg hover:text-white">
            <iconify-icon icon="ic:outline-dashboard" class="text-2xl me-3"></iconify-icon>
            Dashboard</a>
        </li>
        <li class="">
          <a href=""
            class="flex items-center px-4 py-4 mb-2 bg-white rounded-md hover:bg-primaryBg hover:text-white">
            <iconify-icon icon="tabler:shopping-bag" class="text-2xl me-3"></iconify-icon>
            Products</a>
        </li>
        <li class="">
          <a href=""
            class="flex items-center px-4 py-4 mb-2 bg-white rounded-md hover:bg-primaryBg hover:text-white">
            <iconify-icon icon="hugeicons:truck-delivery" class="text-2xl me-3"></iconify-icon>
            Orders</a>
        </li>
        <li class="">
          <a href=""
            class="flex items-center px-4 py-4 mb-2 bg-white rounded-md hover:bg-primaryBg hover:text-white">
            <iconify-icon icon="majesticons:radio-list-line" class="text-2xl me-3"></iconify-icon>
            Category</a>
        </li>
        <li class="">
          <a href=""
            class="flex items-center px-4 py-4 mb-2 bg-white rounded-md hover:bg-primaryBg hover:text-white">
            <iconify-icon icon="material-symbols:feedback-outline" class="text-2xl me-3"></iconify-icon>
            Feedback</a>
        </li>
        <li class="">
          <a href=""
            class="flex items-center px-4 py-4 mb-2 bg-white rounded-md hover:bg-primaryBg hover:text-white">
            <iconify-icon icon="material-symbols:help-outline" class="text-2xl me-3"></iconify-icon>
            Help Center</a>
        </li>
      </ul>
    </aside>

    <main class="block basis-9/12">
      <nav class="px-10 py-3 text-white bg-primaryBg">
        <div class="flex items-center justify-between mx-auto">
          <div>
            <button class="text-xl">
              <iconify-icon icon="ri:menu-2-fill" class="font-extrabold"></iconify-icon>
            </button>
          </div>
          <div class="flex items-center">
            <h4 class="me-3">Welcome, <span class="font-semibold">Irfan Yasin</span></h4>
            <div class="w-12 h-12 overflow-hidden border-2 border-white rounded-full">
              <img src="/img/user/user-1.png" class="w-full" alt="">
            </div>
          </div>
        </div>
      </nav>



      <section class="px-10 mt-10 mb-5">
        <div class="grid grid-cols-3 gap-5">
          <div class="p-5 bg-white rounded-lg shadow-lg">
            <h3 class="mb-3 text-xl">Total Sales</h3>
            <div class="flex justify-between">
              <h1 class="text-6xl font-semibold">20</h1>
              <iconify-icon icon="mdi:cart-sale" class="text-6xl text-slate-300"></iconify-icon>
            </div>
          </div>
          <div class="p-5 bg-white rounded-lg shadow-lg">
            <h3 class="mb-3 text-xl">Total Orders</h3>
            <div class="flex justify-between">
              <h1 class="text-6xl font-semibold">10</h1>
              <iconify-icon icon="hugeicons:truck-delivery" class="text-6xl text-slate-300"></iconify-icon>
            </div>
          </div>
          <div class="p-5 bg-white rounded-lg shadow-lg">
            <h3 class="mb-3 text-xl">Total Feedback</h3>
            <div class="flex justify-between">
              <h1 class="text-6xl font-semibold">20</h1>
              <iconify-icon icon="material-symbols:feedback-outline" class="text-6xl text-slate-300"></iconify-icon>
            </div>
          </div>
        </div>
      </section>


      <section class="px-10">
        <div class="grid grid-cols-3 gap-5">
          <div class="col-span-2 p-5 bg-white rounded-lg shadow-lg">
            <h3 class="mb-3">Statistic Sales</h3>
          </div>
          <div class="p-5 bg-white rounded-lg shadow-lg">
            <h3 class="mb-3">Category Orders</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quaerat maiores natus quos nobis,
              beatae itaque soluta tempora modi laborum nesciunt consequuntur commodi magnam inventore, quam nisi
              dolorem quasi fugiat?</p>
          </div>
        </div>
      </section>



    </main>

  </div>

</div>
