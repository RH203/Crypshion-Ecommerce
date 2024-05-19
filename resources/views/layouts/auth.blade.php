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

  {{-- Font Google Poppins --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  {{-- Vite --}}
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
