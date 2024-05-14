<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ $title ?? env('APP_NAME') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>



  @livewire('components.sub-navbar')
  @livewire('components.navbar')

  <main class="md:container-md">
    {{ $slot }}
  </main>


  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
  <script src="/node_modules/preline/dist/preline.js"></script>
</body>

</html>
