<div>
  <header class="my-10 mb-10 text-center">
    <h1 class="text-4xl font-bold">Checkout</h1>
    <p class="mt-3 font-normal text-slate-500">Happy shopping at crypshion</p>
  </header>

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
            <button type="button"
              class="inline-flex items-center text-sm font-semibold border border-transparent rounded-lg gap-x-2 disabled:opacity-50 disabled:pointer-events-none"
              data-hs-overlay="#hs-medium-modal">
              <iconify-icon icon="lucide:edit" class="text-xl text-slate-500"></iconify-icon>
            </button>
          </div>
          <div class="flex items-center">
            <div>
              {{ session('deliveryType') }}
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
                <div class="h-full overflow-hidden rounded-lg basis-3/12 md:h-40 bg-slate-200">
                  <img src="{{ asset('storage/' . $data->image) }}" alt="" width="w-full object-cover"
                    class="object-cover">
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
              <h4 class="font-bold">{{ session('totalQty') }}</h4>
            </div>
            <div class="flex justify-between mb-2 text-slate-800">
              <h4 class="text-slate-500">Subtotal Product</h4>
              <h4 class="font-bold">Rp {{ number_format(session('subTotalProducts'), 0, ',', '.') }}</h4>
            </div>
            <div class="flex justify-between mb-2 text-slate-800">
              <h4 class=" text-slate-500">Total Delivery</h4>
              <h4 class="font-bold">Rp {{ number_format(session('deliveryCost'), 0, ',', '.') }}</h4>
            </div>
            <div class="flex justify-between mb-2 text-slate-800">
              <h4 class=" text-slate-500">Tax</h4>
              <h4 class="font-bold">Rp {{ number_format(session('tax'), 0, ',', '.') }}</h4>
            </div>
            <div class="flex justify-between mb-2 text-slate-800">
              <h4 class=" text-slate-500">Total</h4>
              <h4 class="font-bold" id="totalPrice">Rp. {{ number_format(session('total'), 0, ',', '.') }}</h4>
              {{-- Dsini Debug --}}
            </div>
          </div>
          <div class="mt-2">
            <select name="selectPayment" id="" class="w-full py-2">
              <option value="online">Online Payment</option>
            </select>
          </div>
          <div class="mt-8">
            <button type="button" id="checkout-btn" {{--  DEBUG  --}}
              class="block w-full py-3 font-semibold text-center text-white rounded-lg bg-primaryBg">
              Pay Now
            </button>
          </div>
        </div>
      </div>
  </section>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    var payButton = document.getElementById('checkout-btn');
    payButton.addEventListener('click', () => {
      window.snap.pay('{{ $snap_token }}', {
        onSuccess: function(result) {
          console.log("Payment success!");
          console.log(result);
          Livewire.dispatch('paymentSuccess');
        },
        onPending: function(result) {
          console.log("Waiting for payment!")
          console.log(result);
        },
        onError: function(result) {
          console.log("Payment failed!");
          console.log(result);
        },
        onClose: function() {
          console.log('Popup closed without finishing payment');
          Livewire.dispatch('paymentCancel');
        }
      });
    });
  })
</script>
