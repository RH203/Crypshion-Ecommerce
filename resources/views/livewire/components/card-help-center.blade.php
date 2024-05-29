<a href={!! $link !!} wire:navigate.hover
  class="flex flex-row gap-3 items-center group shadow-lg bg-white border border-gray-200 rounded-xl p-4 md:p-5 text-blueNavy hover:bg-primaryBg hover:text-white transition duration-500 cursor-pointer">
  {!! $icon !!}
  <p class="font-semibold text-xl">{{ $title }}</p>
</a>
