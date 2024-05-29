<div>
  <div class="w-10/12 mx-auto">
    {{-- Title Start --}}
    <div class="w-full flex justify-center items-center mt-4">
      <p class="text-5xl text-blueNavy font-semibold">Browser topic</p>
    </div>
    <hr class="border-gray-800 mt-4">
    {{-- Title End --}}

    <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-5 my-20 group">
      @foreach ($datas as $key => $data)
        <livewire:components.card-help-center icon="{!! $data['icon'] !!}" title="{!! $titles[$key]['title'] !!}"
          link="{{ $links[$key]['link'] }}" />
      @endforeach
    </div>
  </div>

</div>
