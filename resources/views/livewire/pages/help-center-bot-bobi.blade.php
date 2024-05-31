<div class="flex flex-col w-10/12 mx-auto mb-20">
  {{-- Title Start --}}
  <div class="flex items-center justify-center w-full mt-4">
    <p class="text-5xl font-semibold text-blueNavy">Ask Bobi</p>
  </div>
  <hr class="mt-4 border-gray-800">
  {{-- Title End --}}

  <div
    class="w-4/5 mx-auto mt-10 overflow-auto bg-gray-300 border border-gray-100 rounded-md h-96 bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-40 p-7">
    <!-- Chat Bubble -->
    <ul class="space-y-5">
      <!-- Initial Chat Bot Message -->
      <li class="flex max-w-lg gap-x-2 sm:gap-x-4 me-11">
        <img class="inline-block bg-white rounded-full size-9" src="/img/logo/logo.ico" alt="Image Description">
        <div class="p-4 space-y-3 bg-white border border-gray-200 rounded-2xl">
          <h2 class="font-medium text-gray-800">How can we help?</h2>
          <div class="space-y-1.5">
            <p class="mb-1.5 text-sm text-gray-800">You can ask questions like:</p>
            <ul class="list-disc list-outside space-y-1.5 ps-3.5">
              <li class="text-sm text-gray-800">Having trouble with a payment?</li>
              <li class="text-sm text-gray-800">Having problems with shipping?</li>
              <li class="text-sm text-gray-800">Found a bug in the system?</li>
            </ul>
          </div>
        </div>
      </li>
      <!-- End Initial Chat Bot Message -->

      @foreach ($history as $historyItem)
        @if ($historyItem['type'] === 'user')
          <li class="flex ms-auto gap-x-2 sm:gap-x-4" x-ref="user">
            <div class="space-y-3 grow text-end">
              <div class="inline-block p-4 bg-blue-600 shadow-sm rounded-2xl">
                <p class="text-sm text-white">{{ $historyItem['message'] }}</p>
              </div>
            </div>

            <span class="flex-shrink-0 inline-flex items-center justify-center size-[38px] rounded-full bg-gray-600">
              <img src="{{ asset('storage/file/avatar/' . Auth::user()->avatar) }}" alt="image profile" class="rounded-full"  />
            </span>
          </li>
        @elseif ($historyItem['type'] === 'bot')
          <li class="flex max-w-lg gap-x-2 sm:gap-x-4 me-11">
            <img class="inline-block rounded-full size-9" src="/img/logo/logo.ico" alt="Image Description">
            <div class="p-4 space-y-3 bg-white border border-gray-200 rounded-2xl">
              <p class="text-sm text-gray-800">{!! $historyItem['message'] !!}</p>
            </div>
          </li>
        @endif
      @endforeach
    </ul>
  </div>

  {{-- Form Start --}}
  <div class="w-4/5 mx-auto mb-10 shadow-sm">
    <form class="relative flex rounded-lg shadow-sm" wire:submit.prevent="submit">
      <input type="text" wire:model="question" id="hs-search-box-with-loading-5" name="hs-search-box-with-loading-5"
        class="block w-full px-4 py-3 text-sm border-gray-200 shadow-sm ps-11 rounded-s-lg focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
        placeholder="Ask Bobi" autocomplete="off">
      <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-4">
        <svg class="flex-shrink-0 text-gray-400 size-4 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
          width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"></circle>
          <path d="m21 21-4.3-4.3"></path>
        </svg>
      </div>
      <button type="submit"
        class="inline-flex items-center justify-center px-4 py-3 text-sm font-semibold text-white bg-blue-600 border border-transparent gap-x-2 rounded-e-md hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Search
      </button>
    </form>
  </div>
  {{-- Form End --}}
</div>
