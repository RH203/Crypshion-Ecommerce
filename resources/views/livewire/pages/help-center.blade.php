<div>
  <div class="w-10/12 mx-auto">
    <div class="w-full flex justify-center items-center mt-4">
      <p class="text-5xl text-blueNavy font-semibold">Browser topic</p>
    </div>
    <hr class="border-gray-800 mt-4">

    <div class="grid grid-cols-4 gap-5 my-20">
      @foreach ($datas as $key => $data)
        <livewire:components.card-help-center icon="{!! $data['icon'] !!}" title="{!! $titles[$key]['title'] !!}" />
      @endforeach
    </div>
  </div>

</div>
