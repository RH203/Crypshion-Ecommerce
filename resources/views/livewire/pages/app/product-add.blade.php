<div>
  <livewire:components.breadcrumb page="Add Products" />

  <section class="my-10">
    <form action="">

      <div class="grid grid-cols-3 gap-5">
        <div class="col-span-2 p-5 bg-white rounded-lg shadow-lg">
          <div class="mb-4">
            <label for="" class="text-slate-500">Title Product</label>
            <input type="text" class="w-full px-3 py-2 bg-white border rounded-lg">
          </div>
          <div class="mb-4">
            <label for="" class="text-slate-500">Description</label>
            <textarea name="" id="" cols="30" rows="7"
              class="w-full px-3 py-2 bg-white border rounded-lg"></textarea>
          </div>

          <div class="mb-4">
            <label for="" class="text-slate-500">Category</label>
            <select name="" id="" class="w-full px-3 py-2 bg-white border rounded-lg">
              <option value="T-Shirt">T-Shirt</option>
              <option value="Jacket">Jacket</option>
              <option value="Shoe">Shoe</option>
            </select>
          </div>

          <div class="mb-4">
            <label for="" class="block mb-4 text-slate-500">Size</label>
            {{-- Size T-Shirt start  --}}
            <div class="flex gap-2 mb-5">
              <div class="relative">
                <input type="checkbox" name="" id="S" class="absolute right-1">
                <label for="S"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">S</label>
              </div>
              <div class="relative">
                <input type="checkbox" name="" id="M" class="absolute right-1">
                <label for="M"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">M</label>
              </div>
              <div class="relative">
                <input type="checkbox" name="" id="L" class="absolute right-1">
                <label for="L"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">L</label>
              </div>
              <div class="relative">
                <input type="checkbox" name="" id="xl" class="absolute right-1">
                <label for="xl"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">XL</label>
              </div>
              <div class="relative">
                <input type="checkbox" name="" id="xxl" class="absolute right-1">
                <label for="xxl"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">XXL</label>
              </div>
              <div class="relative">
                <input type="checkbox" name="" id="xxxl" class="absolute right-1">
                <label for="xxxl"
                  class="px-8 py-1 font-light border-2 label-size hover:cursor-pointer checked:border-blue-600">XXXL</label>
              </div>
            </div>
            {{-- Size T-Shirt end  --}}



            {{-- Size Shoe start  --}}
            <div class="flex flex-wrap gap-2 mb-5">
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
            </div>
            {{-- Size Shoe end  --}}
          </div>




        </div>

        <div class="bg-white rounded-lg shadow-lg">

        </div>
      </div>
    </form>
  </section>


</div>
