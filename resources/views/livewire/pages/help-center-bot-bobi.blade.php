<div class="w-10/12 mx-auto flex flex-col mb-20">
  {{-- Title Start --}}
  <div class="w-full flex justify-center items-center mt-4">
    <p class="text-5xl text-blueNavy font-semibold">Ask Bobi</p>
  </div>
  <hr class="border-gray-800 mt-4">
  {{-- Title End --}}

  <div
    class="mx-auto mt-10 h-96 w-4/5 bg-gray-300 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-40 border border-gray-100 p-7 overflow-auto">
    <!-- Chat Bubble -->
    <ul class="space-y-5">
      <!-- Initial Chat Bot Message -->
      <li class="max-w-lg flex gap-x-2 sm:gap-x-4 me-11">
        <img class="inline-block size-9 rounded-full bg-white" src="/img/logo/logo.ico" alt="Image Description">

        <!-- Card -->
        <div class="bg-white border border-gray-200 rounded-2xl p-4 space-y-3">
          <h2 class="font-medium text-gray-800">
            How can we help?
          </h2>
          <div class="space-y-1.5">
            <p class="mb-1.5 text-sm text-gray-800">
              You can ask questions like:
            </p>
            <ul class="list-disc list-outside space-y-1.5 ps-3.5">
              <li class="text-sm text-gray-800">
                Having trouble with a payment?
              </li>
              <li class="text-sm text-gray-800">
                Having problems with shipping?
              </li>
              <li class="text-sm text-gray-800">
                Found a bug in the system?
              </li>
            </ul>
          </div>
        </div>
        <!-- End Card -->
      </li>
      <!-- End Initial Chat Bot Message -->

      @foreach ($history as $historyUser)
        @if ((is_array($historyUser) && isset($historyUser['type']) && $historyUser['type'] == 'user'))
          <li class="flex ms-auto gap-x-2 sm:gap-x-4">
            <div class="grow text-end space-y-3">
              <div class="inline-block bg-blue-600 rounded-2xl p-4 shadow-sm">
                <p class="text-sm text-white">{{ $historyUser }}</p>
              </div>
            </div>
            <span class="flex-shrink-0 inline-flex items-center justify-center size-[38px] rounded-full bg-gray-600">
              <iconify-icon icon="fa6-regular:user" class="leading-none size-4 text-white"></iconify-icon>
            </span>
          </li>
        @endif
      @endforeach


      {{-- Bot Response Start --}}

      @foreach ($history as $historyBots)
        @if ((is_array($historyBots) && isset($historyBots['type']) && $historyBots['type'] == 'bot'))
          <li class="max-w-lg flex gap-x-2 sm:gap-x-4 me-11">
            {{-- Image Bot --}}
            <img class="inline-block size-9 rounded-full" src="/img/logo/logo.ico" alt="Image Description">
            {{-- Image Bot --}}

            <div class="bg-white border border-gray-200 rounded-2xl p-4 space-y-3">
              <p class="text-sm text-gray-800">
                {{ $historyBots }}
              </p>
            </div>

            {{-- Bot Response End --}}
          </li>
        @endif
      @endforeach

    </ul>


  </div>

  {{-- Form Start --}}
  <div class="mx-auto mb-10 shadow-sm w-4/5">
    <form class="relative flex rounded-lg shadow-sm" wire:submit.prevent="submit">
      <input type="text" wire:model="question" id="hs-search-box-with-loading-5"
        name="hs-search-box-with-loading-5"
        class="py-3 px-4 ps-11 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
        placeholder="Ask Bobi" autocomplete="off">

      {{-- Icon Search --}}
      <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
        <svg class="flex-shrink-0 size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
          width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"></circle>
          <path d="m21 21-4.3-4.3"></path>
        </svg>
      </div>
      {{-- Icon Search --}}

      <button type="submit"
        class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        <span class="sr-only">Loading...</span>
        Search
      </button>
    </form>
  </div>
  {{-- Form End --}}
</div>
