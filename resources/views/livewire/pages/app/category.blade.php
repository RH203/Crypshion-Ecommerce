<div class="mb-20">
  <livewire:components.breadcrumb page="Category" />
  <section class="">
    <div class="flex gap-5">
      <div class="col-span-2 p-5 bg-white rounded-lg shadow-lg basis-8/12">
        <div class="flex flex-col">
          <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
              <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 ">
                  <thead>
                    <tr>
                      <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">Image
                      </th>

                      <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                        Title</th>
                      <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end">Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($datas as $data)
                      <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100 ">
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap">
                          <img src="{{ $data->image ? asset('storage/file/category/' . $data->image) : $data->image }}"
                            alt="" class="w-20">
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">{{ $data->title }}</td>
                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                          <a href="#" wire:click.prevent='edit({{ $data->id }})'
                            class="inline-flex items-center text-lg font-semibold text-yellow-600 border border-transparent rounded-lg gap-x-2 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                            <iconify-icon icon="lucide:edit"></iconify-icon>
                          </a>
                          <a href="#" wire:click.prevent='delete({{ $data->id }})'
                            class="inline-flex items-center text-lg font-semibold text-red-600 border border-transparent rounded-lg gap-x-2 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                            <iconify-icon icon="iconamoon:trash-light"></iconify-icon>
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
      </div>

      <div class="h-full p-5 bg-white rounded-lg shadow-lg basis-4/12">
        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="" enctype="multipart/form-data">
          <div class="mb-3 overflow-hidden rounded-lg">
            {{-- @if ($image) --}}
            <img
              src="{{ $image ? $image->temporaryUrl() : ($isEdit && $categoryId ? asset('storage/file/category/' . $currentImage) : '/img/user/avatar.png') }}"
              class="w-full" alt="img category">

            {{-- @endif --}}
            <input type="file" name="image" wire:model="image" id="browse" hidden>
            <label for="browse"
              class="block w-full py-2 mt-3 text-center border rounded-md cursor-pointer border-primary text-primary">Browse
              Photo</label>
            @error('image')
              <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                {{ $message }}</small>
            @enderror
          </div>
          <div class="mb-3">
            <input type="text" name="title" wire:model="title" class="w-full px-3 py-2 border" placeholder="Title">
            @error('title')
              <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                {{ $message }}</small>
            @enderror
          </div>
          <div>
            <button type="submit"
              class="w-full py-2 text-center text-white rounded-md bg-primaryBg">{{ $isEdit ? 'Update' : 'Add' }}
              Category</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

{{-- @push('js')
  <script>
    function readFile(input) {
      let file = input.files[0];
      let fileReader = new FileReader();
      fileReader.readAsText(file);
      fileReader.onload = function() {
        document.getElementById("result").src = URL.createObjectURL(file);
      };
      fileReader.onerror = function() {
        alert(fileReader.error);
      };
    }
  </script>
@endpush --}}
