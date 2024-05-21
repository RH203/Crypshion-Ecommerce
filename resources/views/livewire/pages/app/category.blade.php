<div>
  <livewire:components.breadcrumb page="Category" />
  <section class="">
    <div class="grid grid-cols-3 gap-5">
      <div class="col-span-2 p-5 bg-white rounded-lg shadow-lg">
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
                    <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100 ">
                      <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap">John
                        Brown</td>
                      <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">New York No. 1
                        Lake Park</td>
                      <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                        <a href=""
                          class="inline-flex items-center text-lg font-semibold text-blue-600 border border-transparent rounded-lg gap-x-2 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                          <iconify-icon icon="iconamoon:trash-light"></iconify-icon>
                        </a>
                      </td>
                    </tr>

                    <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100 ">
                      <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap ">Jim
                        Green</td>
                      <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">London No. 1 Lake
                        Park</td>
                      <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                        <a href=""
                          class="inline-flex items-center text-lg font-semibold text-blue-600 border border-transparent rounded-lg gap-x-2 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                          <iconify-icon icon="iconamoon:trash-light"></iconify-icon>
                        </a>

                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 bg-white rounded-lg shadow-lg">
        <form action="">
          <div class="mb-3 overflow-hidden rounded-lg">
            <img src="/img/user/avatar.png" class="w-full" alt="img category">
            <input type="file" name="" id="browse" hidden>
            <label for="browse"
              class="block w-full py-2 mt-3 text-center border rounded-md cursor-pointer border-primary text-primary">Browse
              Photo</label>
          </div>
          <div class="mb-3">
            <input type="text" name="title" id="" class="w-full px-3 py-2 border" placeholder="Title">
          </div>
          <div>
            <button type="submit" class="w-full py-2 text-center text-white rounded-md bg-primaryBg">Add
              Category</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
