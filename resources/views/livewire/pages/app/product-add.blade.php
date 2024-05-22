<div>
  <livewire:components.breadcrumb page="Add Products" />

  <section class="my-10">
    <form wire:submit.prevent='store' method="POST">
      <div class="grid grid-cols-3 gap-5">
        <div class="col-span-2 p-5 bg-white rounded-lg shadow-lg">
          <div class="mb-4">
            <label for="title" class="text-slate-500">Title Product</label>
            <input type="text" wire:model='title' name="title" id="title"
              class="w-full px-3 py-2 bg-white border rounded-lg">
            @error('title')
              <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                {{ $message }}</small>
            @enderror
          </div>
          <div class="mb-4">
            <label for="description" class="text-slate-500">Description</label>
            <textarea name="description" wire:model='description' id="description" cols="30" rows="7"
              class="w-full px-3 py-2 bg-white border rounded-lg"></textarea>
            @error('description')
              <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                {{ $message }}</small>
            @enderror
          </div>

          <div class="mb-4">
            <label for="category" class="text-slate-500">Category</label>
            <select name="category_id" wire:model='category_id' id="category"
              class="w-full px-3 py-2 bg-white border rounded-lg">
              {{-- <option value="" selected disabled>Choose Category</option> --}}
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
              @endforeach
            </select>
            @error('category_id')
              <small class="italic text-red-600"><iconify-icon
                  icon="quill:warning-alt"></iconify-icon>{{ $message }}</small>
            @enderror
          </div>

          <div class="mb-4">
            <label for="" class="block mb-4 text-slate-500">Size</label>
            {{-- Size T-Shirt start  --}}
            <div class="flex gap-2 mb-5">
              @foreach (['S', 'M', 'L', 'XL', 'XXL', 'XXXL'] as $size)
                <div class="relative">
                  <input type="checkbox" name="sizes" wire:model="sizes" id="{{ $size }}"
                    value="{{ $size }}" class="absolute right-1">
                  <label for="{{ $size }}"
                    class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">{{ $size }}</label>
                </div>
              @endforeach
            </div>
            {{-- Size T-Shirt end  --}}



            {{-- Size Shoe start  --}}
            {{-- <div class="flex flex-wrap gap-2 mb-5">
              <div class="relative mb-3">
                <input type="checkbox" name="" id="35" class="absolute right-1">
                <label for="35"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">35</label>
              </div>
              <div class="relative mb-3">
                <input type="checkbox" name="" id="36" class="absolute right-1">
                <label for="36"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">36</label>
              </div>
              <div class="relative mb-3">
                <input type="checkbox" name="" id="37" class="absolute right-1">
                <label for="37"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">37</label>
              </div>
              <div class="relative mb-3">
                <input type="checkbox" name="" id="38" class="absolute right-1">
                <label for="38"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">38</label>
              </div>
              <div class="relative mb-3">
                <input type="checkbox" name="" id="39" class="absolute right-1">
                <label for="39"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">39</label>
              </div>
              <div class="relative mb-3">
                <input type="checkbox" name="" id="40" class="absolute right-1">
                <label for="40"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">40</label>
              </div>
              <div class="relative mb-3">
                <input type="checkbox" name="" id="41" class="absolute right-1">
                <label for="41"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">41</label>
              </div>
              <div class="relative mb-3">
                <input type="checkbox" name="" id="42" class="absolute right-1">
                <label for="42"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">42</label>
              </div>
              <div class="relative mb-3">
                <input type="checkbox" name="" id="43" class="absolute right-1">
                <label for="43"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">43</label>
              </div>
            </div> --}}
            {{-- Size Shoe end  --}}
          </div>

          <div class="mb-4">
            <button type="submit" class="px-5 py-2 text-white rounded-md bg-primaryBg">Save</button>
          </div>


        </div>
        <div class="bg-white rounded-lg shadow-lg">

        </div>
      </div>
    </form>
  </section>


</div>
