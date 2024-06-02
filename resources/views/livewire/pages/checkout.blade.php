<div>
  <header class="my-10 mb-10 text-center">
    <h1 class="text-4xl font-bold">Checkout</h1>
    <p class="mt-3 font-normal text-slate-500">Pay attention to your order to see if it is correct</p>
  </header>

  <section class="mt-10">
    <div class="w-full mx-auto md:w-10/12">
      <div class="block gap-5 lg:flex">
        {{-- Product start --}}
        <div class="p-5 mb-5 bg-white shadow-lg rounded-xl lg:mb-0 md:basis-8/12">
          <header>
            <h3 class="text-xl font-bold">Product</h3>
          </header>

          @foreach ($datas as $product)
            <div class="flex items-center justify-between my-5">
              <div class="flex">
                <div class="h-full overflow-hidden rounded-lg basis-4/12 w-72 md:h-40 bg-slate-200">
                  <img src="{{ asset('storage/' . $product->image) }}" alt="" class="object-cover w-full">
                </div>
                <div class="basis-8/12 text-slate-800 ms-5">
                  <div class="w-full mb-1">
                    <h4 class="font-semibold text-md">{{ Str::limit($product->product->title, 70) }}
                    </h4>
                  </div>
                  <p class="text-sm text-slate-500">{{ $product->product->category->title }}</p>
                  <div>
                    <span
                      class="inline-block px-5 py-0 text-sm border md:px-7 text-slate-500 border-slate-500">{{ $product['size'] }}</span>
                    <span
                      class="inline-block px-5 py-0 text-sm border md:px-7 text-slate-500 border-slate-500">{{ $product->color }}</span>
                  </div>
                  <div class="my-1 text-sm text-slate-500">Qty : <span>{{ $product->quantity }}</span> x</div>
                  <div class="md:text-xl text-md">
                    Rp. <span class="font-semibold">{{ number_format($product->price, 0, ',', '.') }}</span>
                  </div>
                </div>
              </div>
            </div>
            <hr class="border">
          @endforeach
        </div>
        {{-- Product end --}}



        {{-- Detail order start --}}
        <div class="lg:basis-4/12">
          <div class="p-5 bg-white shadow-lg rounded-xl">
            <div class="mb-10">
              <header class="mb-3">
                <h3 class="text-xl font-bold">Shipping Address</h3>
              </header>
              <div>
                <p class="my-2 text-slate-500">{{ Auth::user()->address }}</p>
                <hr>
                <p class="my-2 uppercase text-slate-500">{{ $village->name }},
                  {{ $district->name }}, {{ $regency->name }}, {{ $province->name }},
                  {{ Auth::user()->zip_code }}
                </p>
              </div>
            </div>
            <div class="mb-10">
              <header class="mb-3">
                <h3 class="text-xl font-bold">Delivery Type</h3>
              </header>
              <div>
                <div class="flex items-center">
                  <div class="text-7xl me-6">
                    <iconify-icon icon="hugeicons:delivery-truck-02"></iconify-icon>
                  </div>
                  <div>
                    <p class="text-lg font-semibold">{{ session('deliveryType') }}</p>
                    <p class="text-slate-500">Estimation : {{ session('deliveryEstimation') }} day</p>
                    <p class=" text-slate-500">Rp. {{ number_format(session('deliveryCost'), 0, ',', '.') }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="">
              <header class="mb-3">
                <h3 class="text-xl font-bold">Payment Detail</h3>
              </header>
              <div>
                <div class="flex justify-between mb-2 text-slate-800">
                  <h4 class="text-slate-500">Quantity Product</h4>
                  <h4 class="font-bold">{{ session('totalQty') }}</h4>
                </div>
                <div class="flex justify-between mb-2 text-slate-800">
                  <h4 class="text-slate-500">Subtotal Product</h4>
                  <h4 class="font-bold">Rp {{ number_format(session('subTotalProducts'), 0, ',', '.') }}</h4>
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
                <div class="flex justify-between mb-4 text-slate-800">
                  <h4 class=" text-slate-500">Payment Method</h4>
                  <h4 class="font-bold">{{ session('paymentMethod') }}</h4>
                </div>
                <div class="flex justify-between text-slate-800">
                  <button type="button" id="checkout-btn"
                    class="flex items-center justify-center w-full py-2 font-semibold text-center text-white rounded-lg bg-primaryBg "><iconify-icon
                      icon="tdesign:money"></iconify-icon> &nbsp; Pay Now </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- Detail order end --}}
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
