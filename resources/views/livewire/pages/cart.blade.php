<div>
  <header class="my-10 mb-10 text-center">
    <h1 class="text-4xl font-bold">My Cart</h1>
    <p class="mt-3 font-normal text-slate-500">Happy shopping at crypshion</p>
  </header>

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
            <p class="my-2 text-lg text-slate-500">{{ Auth::user()->address }}</p>
            <hr>
            <p class="my-2 text-lg uppercase text-slate-500"> {{ $village->name }},
              {{ $district->name }}, {{ $regency->name }}, {{ $province->name }},
              {{ $zipCode->zip_code }}</p>
          </div>
          <div class="p-8 bg-white shadow-md rounded-xl">
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-xl font-bold">Delivery Type</h3>
            </div>
            <div class="flex items-center">
              <div>
                <div class="grid grid-cols-1 gap-2 md:grid-cols-3">
                  @foreach ($deliveries as $delivery)
                    <div class="">
                      <input type="radio" wire:model.live="delivery" id="{{ $delivery->id }}"
                        value="{{ $delivery->id }}" name="delivery" class="hidden">
                      <label for="{{ $delivery->id }}"
                        class="block p-3 border-2 rounded-lg border-label checked:border-blue-600 hover:cursor-pointer">
                        <p class="text-lg font-semibold">{{ $delivery->name }}</p>
                        <p class="text-slate-500">Estimation : {{ $delivery->estimation }} day</p>
                        <p class=" text-slate-500">Rp. {{ number_format($delivery->cost, 0, ',', '.') }}</p>
                      </label>
                    </div>
                  @endforeach
                </div>
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
                  <div class="w-full overflow-hidden rounded-lg basis-3/12 md:h-full bg-slate-200">
                    <img src="{{ asset('storage/' . $data->image) }}" alt=""
                      class="object-cover w-full h-full">
                  </div>
                  <div class="basis-9/12 text-slate-800 ms-5">
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
                <h4 class="font-bold">Rp {{ number_format($deliveryCost, 0, ',', '.') }}</h4>
              </div>
              <div class="flex justify-between mb-2 text-slate-800">
                <h4 class=" text-slate-500">Tax</h4>
                <h4 class="font-bold">Rp {{ number_format($tax, 0, ',', '.') }}</h4>
              </div>
              <div class="flex justify-between mb-2 text-slate-800">
                <h4 class=" text-slate-500">Total</h4>
                <h4 class="font-bold" id="totalPrice">Rp. {{ number_format($total, 0, ',', '.') }}</h4>
                {{-- Dsini Debug --}}
              </div>
            </div>
            <div class="mt-2">
              <select name="selectPayment" id="" wire:model.live='selectPayment' class="w-full py-2">
                <option value="online">Online Payment</option>
                <option value="crypto">Crypto Payment</option>
              </select>
            </div>
            <div class="mt-8">
              @if ($selectPayment == 'online')
                <div class="flex justify-between mb-4">
                  <img src="/img/payment/qris.png" alt="" class="h-4">
                  <img src="/img/payment/gopay.png" alt="" class="h-4">
                  <img src="/img/payment/shopeepay.png" alt="" class="h-4">
                  <img src="/img/payment/bca.png" alt="" class="h-4">
                  <img src="/img/payment/bni.webp" alt="" class="h-4">
                  <img src="/img/payment/briva.png" alt="" class="h-4">
                </div>
                <a href="/checkout" {{--  DEBUG  --}}
                  class="block w-full py-3 font-semibold text-center text-white rounded-lg bg-primaryBg">
                  Check Out
                </a>
              @endif
              @if ($selectPayment == 'crypto')
                <p class="hidden" id="hide-address">
                  <span id="address" class="w-full px-2 py-1 overflow-hidden rounded-md bg-slate-300">
                    Test </span>
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
    <div class="w-11/12 mx-auto mb-10 md:w-6/12">
      <div class="p-5 mt-10 bg-white shadow-lg rounded-xl">
        <section class="my-20 text-center">
          <iconify-icon icon="material-symbols:shopping-cart-off-outline"
            class="text-9xl text-slate-500"></iconify-icon>
          <h3 class="text-2xl text-slate-500">No Product In The Cart</h3>
        </section>
      </div>
    </div>
  @endif

  {{-- Modal --}}


</div>

<script type="text/javascript">
  var total = <?php echo json_encode($total); ?>;

  // $(document).ready(function() {
  //   var payButton = document.getElementById('checkout-btn');
  //   payButton.addEventListener('click', () => {
  //     window.snap.pay('{{ $snap_token }}', {
  //       onSuccess: function(result) {
  //         console.log("Payment success!");
  //         console.log(result);
  //         Livewire.dispatch('paymentSuccess');
  //       },
  //       onPending: function(result) {
  //         console.log("Waiting for payment!")
  //         console.log(result);
  //       },
  //       onError: function(result) {
  //         console.log("Payment failed!");
  //         console.log(result);
  //       },
  //       onClose: function() {
  //         console.log('Popup closed without finishing payment');
  //         Livewire.dispatch('paymentCancel');
  //       }
  //     });
  //   });
  // })
</script>
