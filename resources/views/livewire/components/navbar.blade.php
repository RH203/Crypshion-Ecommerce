<header class="flex flex-wrap w-full py-4 text-sm sm:justify-start sm:flex-nowrap">
  <nav class="max-w-[85rem] w-full mx-auto px-4 flex flex-wrap basis-full items-center justify-between"
    aria-label="Global">
    <a class="flex-none text-xl font-semibold sm:order-1 dark:text-white" href="#">
      <img src="/img/logo/secon-logo.png" alt="Logo" class="w-32">
    </a>
    <div class="flex items-center sm:order-3 gap-x-2">
      {{-- <button type="button"
        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
        Button
      </button> --}}
      <div class="flex items-center">
        <a href="/login" wire:navigate class="hidden mb-2 font-semibold lg:block">Login</a>
        {{-- <a href="" class="inline-block mx-3">
          <iconify-icon icon="teenyicons:search-outline" class="text-xl"></iconify-icon>
        </a> --}}
        <a href="/cart" wire:navigate class="inline-block ms-3">
          <iconify-icon icon="bi:cart" class="text-xl"></iconify-icon>
        </a>
      </div>
      <button type="button"
        class="sm:hidden hs-collapse-toggle p-2.5 inline-flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-white dark:hover:bg-white/10"
        data-hs-collapse="#navbar-alignment" aria-controls="navbar-alignment" aria-label="Toggle navigation">
        <svg class="flex-shrink-0 hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24"
          height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round">
          <line x1="3" x2="21" y1="6" y2="6" />
          <line x1="3" x2="21" y1="12" y2="12" />
          <line x1="3" x2="21" y1="18" y2="18" />
        </svg>
        <svg class="flex-shrink-0 hidden hs-collapse-open:block size-4" xmlns="http://www.w3.org/2000/svg"
          width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 6 6 18" />
          <path d="m6 6 12 12" />
        </svg>
      </button>
    </div>
    <div id="navbar-alignment"
      class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow sm:grow-0 sm:basis-auto sm:block sm:order-2">
      <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:mt-0 sm:ps-5">
        <a class="font-medium text-slate-600" href="/" wire:navigate aria-current="page">Home</a>
        <a class="font-medium text-slate-600" href="#">
          <div class="hs-dropdown [--trigger:hover] relative inline-flex">
            <button id="hs-dropdown-hover-event" type="button"
              class="inline-flex items-center text-sm font-medium text-gray-800 rounded-lg shadow-sm hs-dropdown-toggle gap-x-2 disabled:opacity-50 disabled:pointer-events-nonedark:border-neutral-700 ">
              Shop
              <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="m6 9 6 6 6-6" />
              </svg>
            </button>
            <div
              class="hs-dropdown-menu transition-[opacity,margin] z-10 duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
              aria-labelledby="hs-dropdown-hover-event">
              <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                href="#">
                Newsletter
              </a>
              <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                href="#">
                Purchases
              </a>
              <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                href="#">
                Downloads
              </a>
              <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                href="#">
                Team Account
              </a>
            </div>
          </div>
        </a>
        <a class="font-medium text-slate-600 hover:text-gray-400" href="#">Product</a>
        <a class="font-medium text-slate-600 hover:text-gray-400" href="#">About</a>
        <a class="font-medium text-slate-600 hover:text-gray-400" href="/contact" wire:navigate>Contact</a>
        <a class="font-medium text-slate-600 hover:text-gray-400 lg:hidden" href="/login" wire:navigate>Login</a>
      </div>
    </div>
  </nav>
</header>
