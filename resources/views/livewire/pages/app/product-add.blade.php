<div>
  <livewire:components.breadcrumb page="Add Products" />

  <section class="my-10">
    <form wire:submit.prevent='store' method="POST" enctype="multipart/form-data">
      <div class="grid grid-cols-3 gap-5">
        <div class="col-span-2 p-5 bg-white rounded-lg shadow-lg">
          {{-- Title input start --}}
          <div class="mb-4">
            <label for="title" class="text-slate-500">Title Product</label>
            <input type="text" wire:model='title' name="title" id="title"
              class="w-full px-3 py-2 bg-white border rounded-lg" required>
            @error('title')
              <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                {{ $message }}</small>
            @enderror
          </div>
          {{-- Title input end --}}


          {{-- Description input start --}}
          <div class="mb-4">
            <label for="description" class="text-slate-500">Description</label>
            <textarea name="description" wire:model='description' id="description" cols="30" rows="7"
              class="w-full px-3 py-2 bg-white border rounded-lg" required></textarea>
            @error('description')
              <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                {{ $message }}</small>
            @enderror
          </div>
          {{-- Description input end --}}

          {{-- Category input start --}}
          <div class="mb-4">
            <label for="category" class="text-slate-500">Category</label>
            <select name="category_id" wire:model.live='category_id' id="category"
              class="w-full px-3 py-2 bg-white border rounded-lg" required>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
              @endforeach
            </select>
            @error('category_id')
              <small class="italic text-red-600"><iconify-icon
                  icon="quill:warning-alt"></iconify-icon>{{ $message }}</small>
            @enderror
          </div>
          {{-- Category input end --}}

          {{-- Size input start --}}
          <div class="mb-4">
            <label for=""
              class="block mb-4 text-slate-500">{{ $category_id == 5 || $category_id == 6 ? 'Price' : 'Size / Type' }}</label>
            {{-- Size T-Shirt start  --}}
            @if ($category_id == 1 || $category_id == 4)
              <div class="flex flex-wrap gap-2 mb-5">
                @foreach (['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL'] as $size)
                  <div class="relative mb-3">
                    <input type="checkbox" name="sizes" wire:model.live="sizes" id="{{ $size }}"
                      value="{{ $size }}" class="absolute right-1">
                    <label for="{{ $size }}"
                      class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">{{ $size }}</label>
                  </div>
                @endforeach
              </div>
            @endif
            {{-- Size T-Shirt end  --}}
            {{-- Size Trousers start  --}}
            @if ($category_id == 2)
              <div class="flex flex-wrap gap-2 mb-5">
                @foreach (['26 - 27', '28 - 29', '30 - 31', '32 - 34', '34 - 36', '38 - 40', '42 - 44', '46 - 48'] as $size)
                  <div class="relative mb-3">
                    <input type="checkbox" name="sizes" wire:model.live="sizes" id="{{ $size }}"
                      value="{{ $size }}" class="absolute right-1">
                    <label for="{{ $size }}"
                      class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">{{ $size }}</label>
                  </div>
                @endforeach
              </div>
            @endif
            {{-- Size Trousers end  --}}
            {{-- Size shoe start  --}}
            @if ($category_id == 3)
              <div class="flex flex-wrap gap-2 mb-5">
                @foreach (['33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46'] as $size)
                  <div class="relative mb-3">
                    <input type="checkbox" name="sizes" wire:model.live="sizes" id="{{ $size }}"
                      value="{{ $size }}" class="absolute right-1">
                    <label for="{{ $size }}"
                      class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">{{ $size }}</label>
                  </div>
                @endforeach
              </div>
            @endif
            {{-- Size shoe end  --}}

            {{-- Size had start  --}}
            @if ($category_id == 5)
              <div class="flex flex-wrap gap-2 mb-5">
                @foreach (['5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '19'] as $size)
                  <div class="relative mb-3">
                    <input type="checkbox" name="sizes" wire:model.live="sizes" id="{{ $size }}"
                      value="{{ $size }}" class="absolute right-1">
                    <label for="{{ $size }}"
                      class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">{{ $size }}</label>
                  </div>
                @endforeach
              </div>
            @endif
            {{-- Size had end  --}}

            {{-- Size had start  --}}
            @if ($category_id == 6)
              <div class="flex flex-wrap gap-2 mb-5">
                @foreach (['XS', 'S', 'M', 'L', 'XL', 'XXL'] as $size)
                  <div class="relative mb-3">
                    <input type="checkbox" name="sizes" wire:model.live="sizes" id="{{ $size }}"
                      value="{{ $size }}" class="absolute right-1">
                    <label for="{{ $size }}"
                      class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">{{ $size }}</label>
                  </div>
                @endforeach
              </div>
            @endif
            {{-- Size had end  --}}
          </div>
          {{-- Size input end --}}


          {{-- Color input start --}}
          <div class="mb-4">
            <label for="title" class="text-slate-500">Color</label>
            <div class="flex items-center gap-2">
              <input type="text" wire:model.debounce.300ms="newTag" wire:keydown.enter="addTag"
                class="w-full px-3 py-2 bg-white border rounded-lg" placeholder="Press enter to continue..."
                onkeydown="return event.key !== 'Enter';">
            </div>
            <ul class="flex flex-wrap mt-2 space-x-2">
              @foreach ($colors as $index => $tag)
                <li class="flex items-center px-2 py-1 mb-2 space-x-1 bg-gray-200 rounded-lg">
                  <span>{{ $tag }}</span>
                  <button type="button" wire:click="removeTag({{ $index }})"
                    class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </li>
              @endforeach
            </ul>
          </div>
          {{-- Color input end --}}

          {{-- Image input start --}}
          <div class="mb-4">
            <label for="image" class="text-slate-500">Image</label>
            <input type="file" name="images" multiple wire:model='images' id="image"
              class="w-full px-3 py-2 bg-white border rounded-lg" accept=".png,.jpg,.jpeg" required>
            <small class="text-xs italic">File Type : JPG, PNG, JPEG</small>
            @error('images.*')
              <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                {{ $message }}</small>
            @enderror

            <div class="mt-2">
              <div class="grid grid-cols-8 gap-2">
                @if ($images)
                  @foreach ($images as $image)
                    <div class="h-20 overflow-hidden rounded-md bg-slate-300">
                      <img src="{{ $image->temporaryUrl() }}" class="object-cover w-full h-full" alt="Preview">
                    </div>
                  @endforeach
                @endif
              </div>
            </div>
          </div>
          {{-- Image input end --}}

          {{-- Stock input start --}}
          <div class="mb-5">
            <label for="stock" class="text-slate-500">Stock Product</label>
            <input type="number" name="stock" wire:model='stock' id="stock"
              class="w-full px-3 py-2 bg-white border rounded-lg" required>
            @error('stock')
              <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                {{ $message }}</small>
            @enderror
          </div>
          {{-- Stock input end --}}

          {{-- Button submit start --}}
          <div class="mb-4">
            <button type="submit" class="px-5 py-2 text-white rounded-md bg-primaryBg">Save</button>
          </div>
          {{-- Button submit end --}}

        </div>


        <div class="p-5 bg-white rounded-lg shadow-lg">
          <header class="mb-4 text-lg font-semibold">
            <h3>Product Size Price</h3>
          </header>
          {{-- Price input start --}}
          @foreach ($sizes as $size)
            <div class="mb-3">
              <label for="price_{{ $size }}" class="text-slate-500">Price size {{ $size }}</label>
              <input type="number" wire:model="prices.{{ $size }}" name="price_{{ $size }}"
                id="price_{{ $size }}" class="w-full px-3 py-2 bg-white border rounded-lg" required>
            </div>
          @endforeach
          {{-- Price input end --}}
        </div>
      </div>
    </form>
  </section>
</div>
