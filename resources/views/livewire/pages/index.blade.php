  <div>
    <!-- Slider -->
    <div data-hs-carousel='{
  "loadingClasses": "opacity-0",
  "isAutoPlay": true
}' class="relative">
      <div class="relative w-full overflow-hidden md:min-h-[500px] h-80 bg-slate-200">
        <div
          class="absolute top-0 bottom-0 flex transition-transform duration-700 opacity-0 hs-carousel-body start-0 flex-nowrap">
          <div class="hs-carousel-slide">
            <div class="flex justify-center h-full">
              <div
                class="relative self-center w-full h-full text-4xl text-gray-800 transition duration-700 dark:text-white">
                <img src="/img/carousel-inner-3.png" alt="" class="object-cover w-full h-full">
              </div>
            </div>
          </div>
          <div class="hs-carousel-slide">
            <div class="flex justify-center h-full ">
              <span class="self-center w-full h-full text-4xl text-gray-800 transition duration-700 dark:text-white">
                <img src="/img/carousel-inner-2.png" alt="" class="object-cover w-full h-full">
              </span>
            </div>
          </div>
          <div class="hs-carousel-slide">
            <div class="flex justify-center h-full">
              <span class="self-center w-full h-full text-4xl text-gray-800 transition duration-700 dark:text-white">
                <img src="/img/carousel-inner-1.png" alt="" class="object-cover w-full h-full">
              </span>
            </div>
          </div>
        </div>
      </div>

      <button type="button"
        class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 ">
        <span class="text-2xl" aria-hidden="true">
          <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="m15 18-6-6 6-6"></path>
          </svg>
        </span>
        <span class="sr-only">Previous</span>
      </button>
      <button type="button"
        class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 ">
        <span class="sr-only">Next</span>
        <span class="text-2xl" aria-hidden="true">
          <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
          </svg>
        </span>
      </button>

      <div class="absolute flex justify-center space-x-2 hs-carousel-pagination bottom-3 start-0 end-0">
        <span
          class="border border-gray-400 rounded-full cursor-pointer hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
        <span
          class="border border-gray-400 rounded-full cursor-pointer hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
        <span
          class="border border-gray-400 rounded-full cursor-pointer hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
      </div>
    </div>
    <!-- End Slider -->


    {{-- Category product start --}}
    <section class="my-20">
      <div class="w-11/12 mx-auto md:w-10/12">
        <header class="mb-10 text-center">
          <h4 class="text-lg font-normal md:text-2xl text-slate-500">Choose Your Collection</h4>
          <h1 class="my-4 text-2xl font-bold text-black uppercase md:text-4xl">Category Products</h1>
        </header>
        <div class="grid grid-cols-2 gap-2 md:gap-5 lg:grid-cols-4 xl:grid-cols-6 md:grid-cols-3 ">
          @foreach ($category as $item)
            <livewire:components.card-category image="/img/category/{{ $item->image }}" title="{{ $item->title }}"
              url="/category/{{ $item->id }}" />
          @endforeach
        </div>
      </div>
    </section>
    {{-- Category product end --}}




    {{-- Best seller product start --}}
    <section class="my-36 md:my-40">
      <div class="w-11/12 mx-auto md:w-10/12">
        <header class="mb-10 text-center">
          <h4 class="text-lg font-normal md:text-2xl text-slate-500">Featured Products</h4>
          <h1 class="my-4 text-2xl font-bold text-black uppercase md:text-4xl">BESTSELLER PRODUCTS</h1>
          <p class="text-sm font-normal md:text-md text-slate-500">Problems trying to resolve the conflict between </p>
        </header>
        <div class="grid grid-cols-2 gap-2 md:gap-5 md:grid-cols-2 lg:grid-cols-5">

          @foreach ($products as $product)
            <livewire:components.card-product image="{{ asset('storage/' . $product->first_image) }}"
              title="{{ Str::limit($product->title, 45) }}" description="{{ Str::limit($product->description, 60) }}"
              rating="{{ $averageRatings[$product->id] ?? 0 }}" sold="{{ $soldQuantities[$product->id] }}"
              price="{{ isset($product->first_price) ? number_format($product->first_price, 0, ',', '.') : '' }}"
              productId="{{ $product->id }}" url="/products/{{ $product->id }}/show" />
          @endforeach
        </div>

        <div class="mt-10 text-center">
          <a href="/products" wire:navigate
            class="inline-block px-8 py-4 font-bold text-white uppercase border rounded-lg bg-primaryBg">Read
            More &rightarrow;</a>
        </div>
      </div>
    </section>
    {{-- Best seller product end --}}



    {{-- Editor pick section start --}}
    <section class="my-20">
      <div class="w-11/12 mx-auto md:w-10/12">
        <header class="mb-10 text-center">
          <h1 class="mb-4 text-xl font-bold text-black uppercase md:text-4xl">EDITOR'S PICK</h1>
          <p class="text-sm font-normal md:text-md text-slate-500">Problems trying to resolve the conflict between </p>
        </header>
        <div class="gap-5 lg:flex">

          <div class="relative mb-5 overflow-hidden lg:mb-0 lg:basis-6/12 basis-full group ">
            <img src="/img/editor-pick-1.png" alt=""
              class="w-full h-full transition duration-500 ease-linear group-hover:scale-110">
            <div class="absolute px-20 py-4 text-xl font-bold uppercase bg-white left-8 bottom-8">
              Men
            </div>
          </div>

          <div class="relative mb-5 overflow-hidden lg:mb-0 lg:basis-3/12 basis-full lg:h-full h-96 group">
            <img src="/img/editor-pick-2.png" alt=""
              class="w-full transition duration-500 ease-linear group-hover:scale-110">
            <div class="absolute px-10 py-4 text-xl font-bold uppercase bg-white left-8 bottom-8">
              Woman
            </div>
          </div>
          <div class="lg:basis-3/12 basis-full">
            <div class="flex flex-col gap-5">
              <div class="relative overflow-hidden group">
                <img src="/img/editor-pick-3.png" alt=""
                  class="w-full transition duration-500 ease-linear group-hover:scale-110">
                <div class="absolute px-10 py-4 text-xl font-bold uppercase bg-white left-8 bottom-8">
                  Accessories
                </div>
              </div>
              <div class="relative overflow-hidden group">
                <img src="/img/editor-pick-4.png" alt=""
                  class="w-full transition duration-500 group-hover:scale-110 ease">
                <div class="absolute px-10 py-4 text-xl font-bold uppercase bg-white left-8 bottom-8">
                  Kids
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- Editor pick section end --}}



    {{-- Promo section start --}}
    {{-- <section class="lg:pt-24 lg:py-0 md:py-10 py-24 bg-[#23856D] my-20">
      <div class="w-10/12 mx-auto">
        <div class="grid grid-cols-2">
          <div class="flex items-center text-white">
            <div>
              <p class="mb-2 font-light uppercase">Summer 2024</p>
              <h1 class="mb-5 font-bold text-7xl">Vita Classic <br> Produc</h1>
              <p class="font-light">We know how large objects will act, We know <br> how are objects will act, We know
              </p>
              <div class="mt-5">
                <a href="" class="inline-block px-8 py-3 font-semibold rounded-md bg-successBg">Read More
                  &rightarrow;</a>
              </div>
            </div>
          </div>
          <div class="hidden lg:block">
            <div class="flex justify-end ">
              <img src="/img/carousel-2.png" alt="" class="w-1/2">
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    {{-- Promo section end --}}



    {{-- No section start --}}
    <section class="my-20">
      <div class="w-11/12 mx-auto md:w-10/12">
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-2">
          <div class="">
            <img src="/img/carousel-3.png" alt="" class="w-full">
          </div>
          <div class="flex items-center">
            <div class="">
              <p class="font-semibold uppercase text-slate-400">Summer 2024</p>
              <h1 class="my-5 text-5xl font-bold text-slate-800">Part of the Neural <br>
                Universe</h1>
              <p class="text-xl font-normal text-slate-400">We know how large objects will act, <br>
                but things on a small scale.</p>
              <div class="mt-8">
                <a href="/products" wire:navigate
                  class="inline-block px-8 py-4 font-bold text-white uppercase rounded-lg bg-successBg">Buy Now</a>
                <a href=""
                  class="inline-block px-8 py-4 font-bold uppercase border rounded-lg text-success border-success">Read
                  More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- No section end --}}




    {{-- Testimonial section start --}}
    <section class="my-32">
      <div class="w-11/12 mx-auto md:w-10/12">
        <header class="mb-10 text-center">
          <h1 class="mb-4 text-xl font-bold text-black uppercase md:text-4xl">Testimonials</h1>
          <p class="text-sm font-normal md:text-md text-slate-500">What they say about Crypshion</p>
        </header>
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 md:grid-cols-2">
          <livewire:components.card-testimonial
            message="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam
          sequi vero, suscipit dolor voluptatum
          deserunt natus consequatur nam tempore quo!"
            image="/img/user/user-1.png" name="Irfan Yasin" label="Programmer" rating="5" />
          <livewire:components.card-testimonial
            message="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam
            sequi vero, suscipit dolor voluptatum
            deserunt natus consequatur nam tempore quo! Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Laborum, et."
            image="/img/user/user-2.png" name="Mario Achmad Taufik" label="Crypto Developer" rating="5" />
          <livewire:components.card-testimonial message="Lorem ipsum dolor sit amet consectetur, adipisicing elit."
            image="/img/user/user-3.png" name="Raihan Firdaus" rating="5" />
        </div>
      </div>
    </section>
    {{-- Testimonial section end --}}


    {{-- Subscribe section start --}}
    <section class="mt-32 bg-center bg-no-repeat bg-cover bg-subscribeBg">
      <div class="w-11/12 py-40 mx-auto md:w-10/12">
        <div class="text-center text-white">
          <h1 class="mb-5 text-3xl font-semibold capitalize md:text-5xl">Subscribe and learn <br> about us</h1>
          <p class="text-sm font-light md:text-md">Problems trying to resolve the conflict between <br>
            the two major realms of Classical physics: Newtonian mechanics </p>

          <div class="relative w-11/12 mx-auto my-8 md:w-6/12">
            <form wire:submit.prevent='subscribe'>
              <input type="email" wire:model='email' name="email" id=""
                class="w-full px-4 py-5 font-normal rounded-lg placeholder:font-light text-slate-800"
                placeholder="Your Email">
              <button type="submit"
                class="absolute flex items-center justify-center px-5 py-4 font-semibold text-white rounded-lg top-1 right-1 bg-primaryBg">Subscribe</button>
            </form>
          </div>

          <h1 class="mb-10 text-3xl font-semibold capitalize md:text-5xl">Designing Better Experience</h1>

          <div class="flex items-center justify-center text-2xl text-white">
            <a href="" class="inline-block">
              <iconify-icon icon="uil:twitter" class="mx-3"></iconify-icon>
            </a>
            <a href="" class="inline-block">
              <iconify-icon icon="uil:facebook" class="mx-3"></iconify-icon>
            </a>
            <a href="" class="inline-block">
              <iconify-icon icon="bi:instagram" class="mx-3"></iconify-icon>
            </a>
            <a href="" class="inline-block">
              <iconify-icon icon="bi:linkedin" class="mx-3"></iconify-icon>
            </a>
          </div>
        </div>
      </div>
    </section>
    {{-- Subscribe section end --}}





  </div>
