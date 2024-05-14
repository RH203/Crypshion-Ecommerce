<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Crypshion - {{ $title ?? env('APP_NAME') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <main class="">
    <section class="h-screen overflow-y-hidden ">
      <div class="grid lg:grid-cols-2 mg:grid-cols-1">
        <div class="hidden lg:block">
          <img src="/img/auth-img-{{ Request::is('login') ? '1' : '2' }}.png" alt="" class="w-full">
        </div>
        <div class="{{ Request::is('login') ? 'pt-32' : 'pt-20' }}">
          <div class="w-10/12 mx-auto lg:w-6/12 md:w-8/12">
            <img src="/img/logo/logo.png" alt="Logo" class="w-4/12 mx-auto">
            {{ $slot }}
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="/node_modules/preline/dist/preline.js"></script>
</body>

</html>
