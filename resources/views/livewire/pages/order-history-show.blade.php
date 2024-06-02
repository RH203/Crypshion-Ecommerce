<div>
  <section class="my-10">
    <div class="w-11/12 mx-auto md:w-10/12">


      <header class="text-center">
        <h1 class="text-4xl font-bold">Detail Order History</h1>
        <p class="mt-3 font-normal text-slate-500">Monitoring the order process until completion</p>
      </header>

      @if ($data->status === 'Canceled' || $data->status === 'Confirmed')
        <!-- Stepper -->
        <div class="container-fluid" wire:poll>
          <br /><br />
          <ul class="list-unstyled multi-steps">
            <li class="{{ $data->status == 'Waiting' ? 'is-active' : '' }}">Waiting</li>
            <li class="{{ $data->status == 'Packaged' ? 'is-active' : '' }}">Packaged</li>
            <li class="{{ $data->status == 'Delivered' ? 'is-active' : '' }}">Delivered</li>
            <li class="{{ $data->status == 'Completed' ? 'is-active' : '' }}">Completed</li>
          </ul>
        </div>
        <!-- End Stepper -->


        <section class="mt-10">
          <div class="w-full mx-auto md:w-10/12">
            <div class="block gap-5 lg:flex">
              {{-- Product start --}}
              <div class="p-5 mb-5 bg-white shadow-lg rounded-xl lg:mb-0 md:basis-8/12">
                <header>
                  <h3 class="text-xl font-bold">Product</h3>
                </header>

                @foreach ($products as $product)
                  <div class="flex items-center justify-between my-5">
                    <div class="flex">
                      <div class="h-full overflow-hidden rounded-lg basis-4/12 w-72 md:h-40 bg-slate-200">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="" width="w-full object-cover">
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
                          <p class="text-lg font-semibold">{{ $data->order_type }}</p>
                          <p class="text-slate-500">Estimation : {{ $data->estimation }}</p>
                          <p class=" text-slate-500">Rp. {{ number_format($data->cost, 0, ',', '.') }}</p>
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
                        <h4 class="text-slate-500">Order Code</h4>
                        <h4 class="font-bold">{{ $data->code }}</h4>
                      </div>
                      <div class="flex justify-between mb-2 text-slate-800">
                        <h4 class="text-slate-500">Quantity Product</h4>
                        <h4 class="font-bold">{{ $totalQty }}</h4>
                      </div>
                      <div class="flex justify-between mb-2 text-slate-800">
                        <h4 class="text-slate-500">Subtotal Product</h4>
                        <h4 class="font-bold">Rp {{ number_format($subTotalProducts, 0, ',', '.') }}</h4>
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
                      <div class="flex justify-between mb-4 text-slate-800">
                        <h4 class=" text-slate-500">Payment Method</h4>
                        <h4 class="font-bold">{{ $data->payment_method }}</h4>
                      </div>
                      <div class="flex justify-between text-slate-800">
                        @if ($data->status == 'Confirmed')
                          <a href="#" wire:click.prevent='giveRating("{{ $data->code }}")'
                            class="block w-full py-2 text-center text-white rounded-lg bg-primaryBg">Give Rate</a>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- Detail order end --}}
            </div>
          </div>
        </section>
      @else
        <div class="w-11/12 mx-auto mb-10 md:w-6/12">
          <div class="p-5 mt-10 bg-white shadow-lg rounded-xl">
            <section class="my-20 text-center">
              <iconify-icon icon="material-symbols:shopping-cart-off-outline"
                class="text-9xl text-slate-500"></iconify-icon>
              <h3 class="text-2xl text-slate-500">No Product</h3>
            </section>
          </div>
        </div>
      @endif
    </div>
  </section>
</div>
