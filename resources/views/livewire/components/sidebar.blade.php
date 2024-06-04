<aside class="h-screen p-4 px-10 transition-all duration-500 bg-white shadow-lg basis-3/12">
  <div class="flex justify-center h-24 mb-5">
    <img src="/img/logo/secon-logo.png" alt="" class="w-9/12">
  </div>
  <ul>
    <li>
      <a href="/app/dashboard" wire:navigate
        class="flex items-center px-4 py-4 mb-2 bg-white rounded-md hover:bg-primaryBg hover:text-white {{ Request::is('app/dashboard') ? 'active' : '' }}">
        <iconify-icon icon="ic:outline-dashboard" class="text-2xl me-3"></iconify-icon>
        Dashboard</a>
    </li>
    <li>
      <a href="/app/products" wire:navigate
        class="flex items-center px-4 py-4 mb-2 bg-white rounded-md hover:bg-primaryBg {{ Request::is('app/products') ? 'active' : '' }}{{ Request::is('app/products/*') ? 'active' : '' }} hover:text-white">
        <iconify-icon icon="tabler:shopping-bag" class="text-2xl me-3"></iconify-icon>
        Products</a>
    </li>
    <li>
      <a href="/app/orders" wire:navigate
        class="flex items-center px-4 py-4 mb-2 bg-white rounded-md hover:bg-primaryBg {{ Request::is('app/orders') ? 'active' : '' }}{{ Request::is('app/orders/*') ? 'active' : '' }} hover:text-white">
        <iconify-icon icon="hugeicons:truck-delivery" class="text-2xl me-3"></iconify-icon>
        Orders</a>
    </li>
    <li>
      <a href="/app/category" wire:navigate
        class="flex items-center px-4 py-4 mb-2 bg-white rounded-md hover:bg-primaryBg {{ Request::is('app/category') ? 'active' : '' }} hover:text-white">
        <iconify-icon icon="majesticons:radio-list-line" class="text-2xl me-3"></iconify-icon>
        Category</a>
    </li>
    <li>
      <a href="/app/feedback" wire:navigate
        class="flex items-center px-4 py-4 mb-2 bg-white rounded-md hover:bg-primaryBg {{ Request::is('app/feedback') ? 'active' : '' }} hover:text-white">
        <iconify-icon icon="material-symbols:feedback-outline" class="text-2xl me-3"></iconify-icon>
        Feedback</a>
    </li>
    <li>
      <a href="/app/subscribes" wire:navigate
        class="flex items-center px-4 py-4 mb-2 bg-white rounded-md hover:bg-primaryBg {{ Request::is('app/help-center') ? 'active' : '' }} hover:text-white">
        <iconify-icon icon="material-symbols:help-outline" class="text-2xl me-3"></iconify-icon>
        Subscribes</a>
    </li>
  </ul>
</aside>
