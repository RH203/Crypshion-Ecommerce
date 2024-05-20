<div>
  <section class="my-10">
    <div class="w-11/12 mx-auto lg:w-5/12 md:w-7/12">

      @if (!$isComplete)
        <div class="flex items-center justify-center py-3 mb-3 text-white bg-yellow-500 rounded-md">
          <iconify-icon icon="ph:warning-bold" class="text-2xl me-3"></iconify-icon>
          <h1>Your profile is not complete</h1>
        </div>
      @endif

      <div class="p-5 bg-white shadow-lg rounded-xl">
        <header class="flex items-center justify-between mb-5">
          <h1 class="text-xl font-semibold">Profile Account</h1>
          <a href="/profile/settings" wire:navigate class="text-xl text-slate-500">
            <iconify-icon icon="lucide:edit"></iconify-icon>
          </a>
        </header>
        <div class="block gap-5 md:flex">
          <div class="w-32 h-auto mx-auto mb-8 overflow-hidden lg:mb-0 rounded-xl lg:basis-4/12">
            <img src="{{ Auth::user()->avatar }}" class="w-full" alt="">
          </div>
          <div class="text-center md:text-start lg:basis-8/12">
            <h4 class="text-xl font-semibold">{{ Auth::user()->name }}</h4>
            <p>{{ Auth::user()->email }}</p>
            <p>{{ Auth::user()->phone_number ?? '-' }}</p>
            <p class="mt-3">{{ Auth::user()->address ?? '-' }}</p>

            {{-- <p class="mt-3">Jl. Anonym Blok K. No.10 (Rumah warna biru)</p>
            <p>KOTA SURABAYA, JAWA TIMUR, 672332</p> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
