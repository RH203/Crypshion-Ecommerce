<div wire:poll>

  <livewire:components.breadcrumb page="Dashboard" />

  <section class="mb-5">
    <div class="grid grid-cols-3 gap-5">
      <div class="p-5 bg-white rounded-lg shadow-lg">
        <h3 class="mb-3 text-xl">Total Sales</h3>
        <div class="flex justify-between">
          <h1 class="text-6xl font-semibold text-primary">{{ $totalSales }}</h1>
          <iconify-icon icon="mdi:cart-sale" class="text-6xl text-slate-300"></iconify-icon>
        </div>
      </div>
      <div class="p-5 bg-white rounded-lg shadow-lg">
        <h3 class="mb-3 text-xl">Total Orders</h3>
        <div class="flex justify-between">
          <h1 class="text-6xl font-semibold text-primary">{{ $totalOrders }}</h1>
          <iconify-icon icon="hugeicons:truck-delivery" class="text-6xl text-slate-300"></iconify-icon>
        </div>
      </div>
      <div class="p-5 bg-white rounded-lg shadow-lg">
        <h3 class="mb-3 text-xl">Total Subscribe</h3>
        <div class="flex justify-between">
          <h1 class="text-6xl font-semibold text-primary">{{ $totalSubscribe }}</h1>
          <iconify-icon icon="material-symbols:feedback-outline" class="text-6xl text-slate-300"></iconify-icon>
        </div>
      </div>
    </div>
  </section>


  <section class="">
    <div class="grid grid-cols-3 gap-5">
      <div class="col-span-2 p-5 bg-white rounded-lg shadow-lg">
        <h3 class="mb-3">Income</h3>
        <h1 class="text-5xl text-primary">Rp. <span
            class="font-semibold">{{ number_format($totalIncome, 0, ',', '.') }}</span></h1>

      </div>

      <div class="p-5 bg-white rounded-lg shadow-lg">
        <h3 class="mb-3">User Active</h3>
        <div class="overflow-auto h-72">
          @foreach ($loggedInUsers as $user)
            @if ($user->user->id !== 1)
              <div class="flex mb-3">
                <div class="relative">
                  <div class="overflow-hidden rounded-full w-14 h-14">
                    <img src="{{ asset('storage/file/avatar/' . $user->user->avatar) }}" alt=""
                      class="object-cover w-full h-full">
                  </div>
                  <div class="absolute right-0 w-3 h-3 bg-green-600 border-2 border-white rounded-full bottom-1 z-99">
                  </div>
                </div>
                <div class="ms-2">
                  <h3 class="font-semibold">{{ $user->user->name }}</h3>
                  <small class="text-slate-500">{{ $user->user->email }}</small>
                </div>
              </div>
            @endif
          @endforeach

        </div>
      </div>
    </div>
  </section>
</div>
