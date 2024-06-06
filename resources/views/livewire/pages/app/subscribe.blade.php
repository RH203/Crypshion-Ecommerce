<div class="mb-20">
  <livewire:components.breadcrumb page="Subscribes" />
  <section class="">
    <div class="grid grid-cols-3 gap-4">
      @foreach ($data as $item)
        <div class="p-3 bg-white rounded-lg shadow-md">
          <div class="flex items-center justify-between">
            <span class="block font-semibold">Email</span>
            <span class="text-xs">{{ $item->created_at->diffForHumans() }}</span>
          </div>
          <span class="font-light text-slate-500">{{ $item->email }}</span>
        </div>
      @endforeach
    </div>
  </section>
</div>
