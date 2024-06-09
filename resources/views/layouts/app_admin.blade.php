<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Metadata untuk SEO (opsional) -->
  <meta name="robots" content="index, follow">
  <meta name="googlebot" content="index, follow">
  <meta name="robots" content="noarchive">
  <meta name="robots" content="nosnippet">
  <meta name="robots" content="noindex, nofollow">
  <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">

  <title>Crypshion - {{ $title ?? env('APP_NAME') }}</title>

  <!-- Favicon -->
  <link rel="icon" href="/img/logo/logo.ico" type="image/x-icon">

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">

  {{-- Font Google Poppins --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  {{-- <link rel="stylesheet" href="/build/assets/app-BPwK3pI7.css"> --}}
  {{-- Vite --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FAFAFA] overflow-x-hidden">
  {{-- <div wire:offline>
    <div class="alert alert-warning">
      Anda sedang offline. Silakan periksa koneksi internet Anda.
    </div>
  </div> --}}

  <div class="flex">
    @livewire('components.sidebar')

    <main class="block h-screen overflow-auto transition-all duration-500 basis-9/12">

      <nav class="px-10 py-3 text-white bg-primaryBg">
        <div class="flex items-center justify-between mx-auto">
          <div>
            <button class="text-xl humberger-menu" type="button">
              <iconify-icon icon="ri:menu-2-fill" class="font-extrabold"></iconify-icon>
            </button>
          </div>
          <div class="flex items-center">
            {{-- Avatar start --}}
            @auth
              <div class="relative inline-flex mb-1 ms-3 hs-dropdown">
                <div class="flex items-center">
                  <h4 class="me-3">Welcome, <span class="font-semibold">{{ Auth::user()->name }}</span></h4>
                  <button id="hs-dropdown-with-header" type="button"
                    class="inline-flex items-center w-10 h-10 overflow-hidden text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-full shadow-sm hs-dropdown-toggle hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                    <img src="{{ Auth::user()->avatar }}" alt="avatar" class="w-full">
                  </button>
                </div>
                <div
                  class="hs-dropdown-menu z-10 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 "
                  aria-labelledby="hs-dropdown-with-header">
                  <div class="px-5 py-3 -m-2 bg-gray-200 rounded-t-lg">
                    <p class="text-sm text-gray-500">Signed in as</p>
                    <p class="text-sm font-medium text-gray-800">{{ Auth::user()->email }}</p>
                  </div>
                  <div class="py-2 mt-2 first:pt-0 last:pb-0">
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                      href="#" wire:navigate>
                      <iconify-icon icon="ph:user-bold" class="text-lg"></iconify-icon>
                      Profile
                    </a>
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                      href="#">
                      <iconify-icon icon="ant-design:setting-outlined" class="text-lg"></iconify-icon>
                      Settings
                    </a>
                    <form action="/logout"
                      class="w-full px-3 py-2 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                      <button type="submit" class="flex w-full items-center gap-x-3.5 ">
                        <iconify-icon icon="material-symbols:logout" class="text-lg"></iconify-icon>
                        Logout
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            @endauth
          </div>
        </div>
      </nav>

      <div class="px-10">
        {{ $slot }}
      </div>
    </main>
  </div>


  @livewireScripts
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <x-livewire-alert::scripts />

  <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
  <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>

  {{-- <script src="/build/assets/app-CvQSPBlQ.js"></script> --}}
  @stack('js')

</body>

</html>
