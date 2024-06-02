<div>
  <div class="mb-10">
    <livewire:components.breadcrumb page="Show Orders" />
    <section class="flex gap-5">
      <div class="p-5 bg-white shadow-lg rounded-xl basis-8/12">
        <div class="flex items-center justify-between">
          <h2 class="text-lg font-semibold">Products</h2>
          @foreach ($customerData as $item)
            <p
              class="px-2 text-xs {{ $item->status == 'Waiting' ? 'text-black bg-yellow-500' : '' }}{{ $item->status == 'Packaged' ? 'text-white bg-primaryBg' : '' }}{{ $item->status == 'Delivered' ? 'text-white bg-black' : '' }}{{ $item->status == 'Completed' ? 'text-white bg-green-600' : '' }} rounded-full">
              {{ $item->status }}</p>
          @endforeach
        </div>
        @foreach ($datas as $product)
          <div class="my-4">
            <div class="flex gap-4">
              <div class="w-32 h-32 overflow-hidden rounded-md">
                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="object-cover w-full h-full">
              </div>
              <div>
                <h3 class="text-sm font-semibold">{{ Str::limit($product->product->title, 60, '...') }}</h3>
                <p class="text-xs">{{ $product->product->category->title }}</p>
                <p class="inline-block px-2 text-xs border border-slate-500 text-slate-500">
                  {{ $product->color }}
                </p>
                <p class="inline-block px-2 text-xs border border-slate-500 text-slate-500">
                  {{ $product['size'] }}
                </p>
                <p class="text-xs">Qty : {{ $product->quantity }}x</p>
                <p class="text-md">Rp <span
                    class="font-semibold">{{ number_format($product->price, 0, ',', '.') }}</span>
                </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>



      <div class="p-5 bg-white shadow-xl rounded-xl basis-4/12">
        <div class="mb-3">
          <h2 class="text-lg font-semibold">Customer</h2>
        </div>
        @foreach ($customerData as $item)
          <div>
            <div class="flex gap-3">
              <div class="w-20 h-20 overflow-hidden rounded-lg">
                <img src="{{ asset('storage/file/avatar/' . $item->user->avatar) }}" alt="">
              </div>
              <div class="text-sm">
                <p class="font-semibold">{{ $item->user->name }}</p>
                <p class="text-slate-500">{{ $item->user->phone_number }}</p>
                <p class="text-slate-500">{{ $item->user->email }}</p>
              </div>
            </div>
          </div>
        @endforeach

        <div class=" mt-7">
          <h2 class="text-lg font-semibold">Address</h2>
        </div>
        @foreach ($customerData as $item)
          <div class="text-sm">
            <p>{{ $item->user->address }}</p>
            <p>{{ $item->user->village->name }}, {{ $item->user->district->name }}, {{ $item->user->regency->name }},
              {{ $item->user->province->name }}
            </p>
          </div>
        @endforeach

        <div class=" mt-7">
          <h2 class="text-lg font-semibold">Delivery</h2>
        </div>
        @foreach ($customerData as $item)
          <div class="flex gap-3">
            <div class="text-7xl">
              <iconify-icon icon="hugeicons:delivery-truck-02"></iconify-icon>
            </div>

            <div class="text-sm">
              <p>{{ $item->order_type }}</p>
              <p>Estimation : {{ $item->estimation }}</p>
              <p>Rp {{ number_format($item->cost, 0, ',', '.') }}</p>
            </div>
          </div>
        @endforeach



        <div class="mb-3 mt-7">
          <h2 class="text-lg font-semibold">Payment Detail</h2>
        </div>
        @foreach ($customerData as $item)
          <div class="text-sm">
            <div class="flex justify-between mb-2 text-slate-800">
              <h4 class="text-slate-500">Order Code</h4>
              <h4 class="font-bold">{{ $item->code }}</h4>
            </div>
            <div class="flex justify-between mb-2 text-slate-800">
              <h4 class="text-slate-500">Quantity Product</h4>
              <h4 class="font-bold">{{ $totalQty }}</h4>
            </div>
            <div class="flex justify-between mb-2 text-slate-800">
              <h4 class="text-slate-500">Subtotal Product</h4>
              <h4 class="font-bold">Rp {{ number_format($subTotalProducts, 0, ',', '.') }}</h4>
            </div>
            {{-- <div class="flex justify-between mb-2 text-slate-800">
              <h4 class=" text-slate-500">Total Delivery</h4>
              <h4 class="font-bold">Rp {{ number_format($dataDelivery['cost'], 0, ',', '.') }}
              </h4>
            </div> --}}
            <div class="flex justify-between mb-2 text-slate-800">
              <h4 class=" text-slate-500">Tax</h4>
              <h4 class="font-bold">Rp {{ number_format($tax, 0, ',', '.') }}</h4>
            </div>
            <div class="flex justify-between mb-2 text-slate-800">
              <h4 class=" text-slate-500">Total</h4>
              <h4 class="font-bold" id="totalPrice">Rp. {{ number_format($total, 0, ',', '.') }}</h4>
            </div>
            <div class="flex justify-between mb-4 text-slate-800">
              <h4 class=" text-slate-500">Payment Method</h4>
              <h4 class="font-bold">{{ $item->payment_method }}</h4>
            </div>
            <div class="flex gap-2 text-center">
              @if ($item->status == 'Waiting')
                <a href="#" wire:click.prevent="confirm('{{ $item->code }}')"
                  class="inline-block w-full py-2 font-semibold text-white bg-green-600 rounded-md">Confirm</a>
                <a href="#"
                  class="inline-block w-full py-2 font-semibold text-white bg-red-600 rounded-md">Reject</a>
              @endif
              @if ($item->status == 'Packaged')
                <a href="#" wire:click.prevent="delivered('{{ $item->code }}')"
                  class="inline-block w-full py-2 font-semibold text-white bg-green-600 rounded-md">Delivered</a>
              @endif
              @if ($item->status == 'Delivered')
                <a href="#" wire:click.prevent="completed('{{ $item->code }}')"
                  class="inline-block w-full py-2 font-semibold text-white bg-green-600 rounded-md">Completed</a>
              @endif

            </div>
          </div>
        @endforeach


      </div>
    </section>
  </div>
</div>
