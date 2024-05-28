<div>
  <div class="w-10/12 mx-auto flex flex-col">
    {{-- Title Start --}}
    <div class="w-full flex justify-center items-center mt-4">
      <p class="text-5xl text-blueNavy font-semibold">Ask Bobi</p>
    </div>
    <hr class="border-gray-800 mt-4">
    {{-- Title End --}}
    <div
      class="mx-auto mt-10 h-96 w-4/5  bg-gray-300 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-40 border border-gray-100 p-10 overflow-auto ">
      <!-- Chat Bubble -->
      <ul class="space-y-5">
        <!-- Chat -->
        <li class="max-w-lg flex gap-x-2 sm:gap-x-4">
          <!-- Card -->
          <div
            class="bg-white border border-gray-200 rounded-2xl p-4 space-y-3 dark:bg-neutral-900 dark:border-neutral-700">
            <h2 class="font-medium text-gray-800 dark:text-white">
              How can we help?
            </h2>
            <div class="space-y-1.5">
              <p class="mb-1.5 text-sm text-gray-800 dark:text-white">
                You can ask questions like:
              </p>
              <ul class="list-disc list-outside space-y-1.5 ps-3.5">
                <li class="text-sm text-gray-800 dark:text-white">
                  What's Preline UI?
                </li>

                <li class="text-sm text-gray-800 dark:text-white">
                  How many Starter Pages & Examples are there?
                </li>

                <li class="text-sm text-gray-800 dark:text-white">
                  Is there a PRO version?
                </li>
              </ul>
            </div>
          </div>
          <!-- End Card -->
        </li>
        <!-- End Chat -->

        <!-- Chat -->
        <li class="max-w-lg ms-auto flex justify-end gap-x-2 sm:gap-x-4">
          <div class="grow text-end space-y-3">
            <!-- Card -->
            <div class="inline-block bg-blue-600 rounded-2xl p-4 shadow-sm">
              <p class="text-sm text-white">
                what's preline ui?
              </p>
            </div>
            <!-- End Card -->
          </div>
        </li>
        <!-- End Chat -->

        <!-- Chat Bubble -->
        <li class="max-w-lg flex gap-x-2 sm:gap-x-4">
          <!-- Card -->
          <div
            class="bg-white border border-gray-200 rounded-2xl p-4 space-y-3 dark:bg-neutral-900 dark:border-neutral-700">
            <p class="text-sm text-gray-800 dark:text-white">
              Preline UI is an open-source set of prebuilt UI components based on the utility-first Tailwind CSS
              framework.
            </p>
            <div class="space-y-1.5">
              <p class="text-sm text-gray-800 dark:text-white">
                Here're some links to get started
              </p>
              <ul>
                <li>
                  <a class="text-sm text-blue-600 decoration-2 hover:underline font-medium dark:text-blue-500 dark:hover:text-blue-400"
                    href="../docs/index.html">
                    Installation Guide
                  </a>
                </li>
                <li>
                  <a class="text-sm text-blue-600 decoration-2 hover:underline font-medium dark:text-blue-500 dark:hover:text-blue-400"
                    href="../docs/frameworks.html">
                    Framework Guides
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- End Card -->
        </li>
        <!-- End Chat Bubble -->
      </ul>
      <!-- End Chat Bubble -->
    </div>

    {{-- Form Start --}}
    <div class="mx-auto mb-10 shadow-sm w-4/5">
      <div class="relative flex rounded-lg shadow-sm">
        <input type="text" id="hs-search-box-with-loading-5" name="hs-search-box-with-loading-5"
          class="py-3 px-4 ps-11 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
          placeholder="Input search">
        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
          <svg class="flex-shrink-0 size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.3-4.3"></path>
          </svg>
        </div>
        <button type="button"
          class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          <span
            class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
            role="status" aria-label="loading">
            <span class="sr-only">Loading...</span>
          </span>
          Search
        </button>
      </div>
    </div>
  </div>

</div>

@script
@endscript
