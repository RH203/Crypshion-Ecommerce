<div class="mb-10">
  <livewire:components.breadcrumb page="Orders" />
  <section class="">
    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 ">
              <thead>
                <tr>
                  <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">Customer
                  </th>
                  <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">Product
                  </th>
                  <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                    Address</th>
                  <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                    Status</th>
                  <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                    Time</th>
                  <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end">Action
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100 ">
                    <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap">
                      <div class="flex items-center gap-3">
                        <div class="w-20 h-20 overflow-hidden rounded-md">
                          <img src="{{ asset('storage/file/avatar/' . $product->user->avatar) }}"
                            alt="{{ $product->user->name }}" class="object-cover w-full h-full">
                        </div>
                        <div class="text-xs">
                          <p class="font-semibold">{{ $product->user->name }}</p>
                          <p class="font-light text-slate-500">{{ $product->user->phone_number }}</p>
                          <p class="font-light text-slate-500">{{ $product->user->email }}</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                      <div class="flex gap-3">
                        <div class="w-20 h-20 overflow-hidden rounded-md">
                          <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->image }}"
                            class="object-cover w-full h-full">
                        </div>
                        <div>
                          <h4 class="font-semibold">{{ Str::limit($product->product->title, 20, '...') }}</h4>
                          <p class="text-xs">{{ $product->product->category->title }}</p>
                          <p class="inline-block px-2 text-xs border border-slate-500 text-slate-500">
                            {{ $product->color }}
                          </p>
                          <p class="inline-block px-2 text-xs border border-slate-500 text-slate-500">
                            {{ $product['size'] }}
                          </p>
                          <p class="text-xs">Qty : {{ $product->quantity }}x</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                      <p class="text-xs">{{ $product->user->address }}</p>
                      <p class="text-xs">{{ $product->user->village->name }}, {{ $product->user->district->name }}</p>
                      <p class="text-xs">{{ $product->user->regency->name }}, {{ $product->user->province->name }}</p>
                    </td>

                    <td>
                      <p
                        class="inline-block px-2 text-xs text-center {{ $product->status == 'Waiting' ? 'text-black bg-yellow-500' : '' }}{{ $product->status == 'Packaged' ? 'text-white bg-primaryBg' : '' }}{{ $product->status == 'Delivered' ? 'text-white bg-black' : '' }}{{ $product->status == 'Completed' ? 'text-white bg-green-600' : '' }}{{ $product->status == 'Canceled' ? 'text-white bg-red-600' : '' }}{{ $product->status == 'Confirmed' ? 'text-white bg-purple-600' : '' }} rounded-full">
                        {{ $product->status }}</p>
                    </td>
                    <td>
                      <p class="text-xs text-center">{{ $product->created_at->diffForHumans() }}</p>
                    </td>
                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                      <a href="/app/orders/{{ $product->code }}" wire:navigate class="text-sm text-primary">
                        Detail
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
