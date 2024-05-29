<div>
  <header class="my-10 mb-10 text-center">
    <h1 class="text-4xl font-bold">My Cart</h1>
    <p class="mt-3 font-normal text-slate-500">Happy shopping at crypshion</p>
  </header>
  <form wire:submit.prevent='checkout' method="POST">
    @csrf
    @if ($isCart)
      <section class="">
        <div class="w-11/12 mx-auto md:w-10/12">
          <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
            <div class="p-8 bg-white shadow-md rounded-xl">
              <div class="flex items-center justify-between mb-8">
                <h3 class="text-xl font-bold">Shipping Address</h3>
                <a href="/profile" wire:navigate class="block">
                  <iconify-icon icon="lucide:edit" class="text-xl text-slate-500"></iconify-icon>
                </a>
              </div>
              <p class="my-2 text-lg text-slate-500">Jl. Kalikepiting No. 45, Blok N. No.2</p>
              <hr>
              <p class="my-2 text-lg uppercase text-slate-500"> {{ $village->name }},
                {{ $district->name }}, {{ $regency->name }}, {{ $province->name }},
                {{ $zipCode->zip_code }}</p>
            </div>
            <div class="p-8 bg-white shadow-md rounded-xl">
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold">Delivery Type</h3>
                <button type="button"
                  class="inline-flex items-center text-sm font-semibold border border-transparent rounded-lg gap-x-2 disabled:opacity-50 disabled:pointer-events-none"
                  data-hs-overlay="#hs-medium-modal">
                  <iconify-icon icon="lucide:edit" class="text-xl text-slate-500"></iconify-icon>
                </button>
              </div>
              <div class="flex items-center">
                <div class="text-7xl me-6">
                  <iconify-icon icon="hugeicons:delivery-truck-02"></iconify-icon>
                </div>
                <div>
                  <p class="text-lg font-semibold">
                    {{ !$dataDelivery['name'] ? 'Delivery' : $dataDelivery['name'] }}</p>
                  <p class="text-slate-500">Estimation :
                    {{ !$dataDelivery['estimation'] ? '0 day' : $dataDelivery['estimation'] }}</p>
                  <p class=" text-slate-500">Rp.
                    {{ !$dataDelivery['cost'] ? '0' : number_format($dataDelivery['cost'], 0, ',', '.') }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="my-10">
        <div class="w-11/12 mx-auto md:w-10/12">
          <div class="flex flex-col gap-5 lg:flex-row">
            <div class="p-4 bg-white shadow-md md:p-8 rounded-xl basis-12/12 lg:basis-8/12">
              <header>
                <h3 class="text-xl font-bold">Product Cart</h3>
              </header>

              @foreach ($datas as $data)
                <div class="flex items-center justify-between my-5">
                  <div class="flex">
                    <div class="w-40 h-full overflow-hidden rounded-lg md:h-40 bg-slate-200">
                      <img src="{{ asset('storage/' . $data->image) }}" alt="" width="w-full"
                        class="object-cover">
                    </div>
                    <div class="text-slate-800 ms-5">
                      <div class="w-10/12 mb-1 md:w-8/12">
                        <h4 class="font-semibold text-md">
                          {{ Str::limit($data->product->title, 60) }}
                        </h4>
                      </div>
                      <p class="text-sm text-slate-500">{{ $data->product->category->title }}</p>
                      <div>
                        <span
                          class="inline-block px-5 py-0 text-sm border md:px-7 text-slate-500 border-slate-500">{{ $data['size'] }}</span>
                        <span
                          class="inline-block px-5 py-0 text-sm border md:px-7 text-slate-500 border-slate-500">{{ $data->color }}</span>
                      </div>
                      <div class="my-1 text-sm text-slate-500">Qty :
                        <span>{{ $data->quantity }}</span> x
                      </div>
                      <div class="md:text-xl text-md">
                        Rp. <span class="font-semibold">{{ number_format($data->price, 0, ',', '.') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="text-end">
                    <a href="#" wire:click.prevent='destroyProduct({{ $data->id }})'
                      class="text-2xl text-red-600">
                      <iconify-icon icon="iconamoon:trash-light"></iconify-icon>
                    </a>
                  </div>
                </div>
                <hr class="border">
              @endforeach
            </div>

            <div class="h-full p-4 bg-white shadow-md md:p-8 rounded-xl basis-12/12 lg:basis-4/12">
              <header class="pb-4">
                <h3 class="text-xl font-bold">Order Details</h3>
              </header>
              <div class="mt-5">
                <div class="flex justify-between mb-2 text-slate-800">
                  <h4 class="text-slate-500">Quantity Product</h4>
                  <h4 class="font-bold">{{ $totalQty }}</h4>
                </div>
                <div class="flex justify-between mb-2 text-slate-800">
                  <h4 class="text-slate-500">Subtotal Product</h4>
                  <h4 class="font-bold">Rp {{ number_format($subTotalProducts, 0, ',', '.') }}</h4>
                </div>
                <div class="flex justify-between mb-2 text-slate-800">
                  <h4 class=" text-slate-500">Total Delivery</h4>
                  <h4 class="font-bold">Rp {{ number_format($dataDelivery['cost'], 0, ',', '.') }}
                  </h4>
                </div>
                <div class="flex justify-between mb-2 text-slate-800">
                  <h4 class=" text-slate-500">Tax</h4>
                  <h4 class="font-bold">Rp {{ number_format($tax, 0, ',', '.') }}</h4>
                </div>
                <div class="flex justify-between mb-2 text-slate-800">
                  <h4 class=" text-slate-500">Total</h4>
                  <h4 class="font-bold">Rp. {{ number_format($total, 0, ',', '.') }}</h4>
                </div>
              </div>
              <div class="mt-2">
                <select name="selectPayment" id="" wire:model.live='selectPayment' class="w-full py-2">
                  <option value="online">Online Payment</option>
                  <option value="crypto">Crypto Payment</option>
                </select>

                <div class="flex justify-between mt-4">
                  <img src="/img/payment/qris.png" alt="" class="h-4">
                  <img src="/img/payment/gopay.png" alt="" class="h-4">
                  <img src="/img/payment/shopeepay.png" alt="" class="h-4">
                  <img src="/img/payment/bca.png" alt="" class="h-4">
                  <img src="/img/payment/bni.webp" alt="" class="h-4">
                  <img src="/img/payment/briva.png" alt="" class="h-4">
                </div>
              </div>
              <div class="mt-8">
                @if ($selectPayment == 'online')
                  <button type="submit"
                    class="block w-full py-3 font-semibold text-center text-white rounded-lg bg-primaryBg">
                    Check Out
                  </button>
                @endif
                @if ($selectPayment == 'crypto')
                  <p class="hidden" id="hide-address">
                    Address : <span id="address"> Test </span>
                  </p>
                  <a href="#" wire:click.prevent="connectWallet" id="connect"
                    class="block py-3 mb-2 font-semibold text-center text-white rounded-lg bg-primaryBg">
                    Connect Wallet
                  </a>
                  <a href="#" id="checkout-crypto" class="hidden">
                    Check Out
                  </a>
                @endif
              </div>
            </div>
          </div>
      </section>
    @else
      <section class="my-20 text-center">
        <iconify-icon icon="material-symbols:shopping-cart-off-outline"
          class="text-9xl text-slate-500"></iconify-icon>
        <h3 class="text-2xl text-slate-500">No Product In The Cart</h3>
      </section>
    @endif


    {{-- Modal --}}
    <div id="hs-medium-modal"
      class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
      <div
        class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 md:max-w-2xl md:w-full md:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm pointer-events-auto rounded-xl">
          <div class="flex items-center justify-between px-4 py-3 border-b d">
            <h3 class="font-bold text-gray-800 e">
              Change Delivery Type
            </h3>
            <button type="button" wire:click="saveChanges"
              class="flex items-center justify-center text-sm font-semibold text-gray-800 border border-transparent rounded-full size-7 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
              data-hs-overlay="#hs-medium-modal">
              <span class="sr-only">Close</span>
              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
              </svg>
            </button>
          </div>
          <div class="p-4 overflow-y-auto">
            <p class="mt-1 text-gray-800">
            <div class="grid grid-cols-1 gap-2 md:grid-cols-3">
              <div class="">
                <input type="radio" wire:model="selectedDelivery" id="faster" value="faster"
                  name="delivery_type" class="hidden">
                <label for="faster"
                  class="block p-3 border-2 rounded-lg border-label checked:border-blue-600 hover:cursor-pointer">
                  <p class="text-lg font-semibold">Faster</p>
                  <p class="text-slate-500">Estimation : 2 - 4 day</p>
                  <p class=" text-slate-500">Rp. 35.000</p>
                </label>
              </div>
              <div class="">
                <input type="radio" wire:model="selectedDelivery" id="reguler" value="reguler"
                  name="delivery_type" class="hidden">
                <label for="reguler"
                  class="block p-3 border-2 rounded-lg border-label checked:border-blue-600 hover:cursor-pointer">
                  <p class="text-lg font-semibold">Reguler</p>
                  <p class="text-slate-500">Estimation : 4 - 7 day</p>
                  <p class="text-slate-500">Rp. 27.000</p>
                </label>
              </div>
              <div class="">
                <input type="radio" wire:model="selectedDelivery" id="economic" value="economic"
                  name="delivery_type" class="hidden">
                <label for="economic"
                  class="block p-3 border-2 rounded-lg border-label checked:border-blue-600 hover:cursor-pointer">
                  <p class="text-lg font-semibold">Economic</p>
                  <p class="text-slate-500">Estimation : 7 - 13 day</p>
                  <p class=" text-slate-500">Rp. 13.000</p>
                </label>
              </div>
            </div>
            </p>
          </div>
          <div class="flex items-center justify-end px-4 py-3 border-t gap-x-2 dark:border-neutral-700">
            <button type="button" wire:click.live='saveChanges'
              class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
              data-hs-overlay="#hs-medium-modal">
              Save changes
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
