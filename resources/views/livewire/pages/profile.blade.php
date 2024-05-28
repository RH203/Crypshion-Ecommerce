<div>
  <section class="my-10">
    <div class="w-11/12 mx-auto lg:w-8/12 md:w-10/12">

      <header class="mb-10 text-center">
        <h1 class="text-4xl font-bold">My Profile</h1>
        <p class="mt-3 font-normal text-slate-500">Complete your profile so you can easily recognize it</p>
      </header>

      <div class="grid grid-cols-3 gap-5">


        <div class="p-5 bg-white shadow-lg rounded-xl">

          <header class="mb-5 ">
            <h1 class="text-xl font-semibold">Profile Account</h1>
          </header>
          <div class="grid-cols-1 gap-5 md:grid" wire:poll>
            <div class="w-full h-auto mx-auto mb-8 overflow-hidden lg:mb-0 rounded-xl lg:basis-4/12">
              <img src="{{ Auth::user()->avatar }}" class="w-full" alt="">
            </div>
            <div class="text-center md:text-start lg:basis-8/12">
              <div class="mb-3">
                <label for="" class="font-semibold text-gray-500">Fullname</label>
                <p class="text-md">{{ Auth::user()->name }}</p>
              </div>
              <div class="mb-3">
                <label for="" class="font-semibold text-gray-500">Email Address</label>
                <p class="text-md">{{ Auth::user()->email }}</p>
              </div>
              <div class="mb-3">
                <label for="" class="font-semibold text-gray-500">Phone Number</label>
                <p class="text-md">{{ Auth::user()->phone_number ?? '-' }}</p>
              </div>
              <div class="mb-3">
                <label for="" class="font-semibold text-gray-500">Address Detail</label>
                <p class="text-md">{{ Auth::user()->address ?? '-' }}</p>
              </div>
              <hr class="mb-3">
              <div class="mb-3">
                <label for="" class="font-semibold text-gray-500">Address</label>
                <p class="text-md">KOTA SURABAYA, JAWA TIMUR, 82918</p>
              </div>
              {{-- <h4 class="text-xl font-semibold">{{ Auth::user()->name }}</h4>
              <p>{{ Auth::user()->email }}</p>
              <p>{{ Auth::user()->phone_number ?? '-' }}</p>
              <p class="mt-3">{{ Auth::user()->address ?? '-' }}</p> --}}

              {{-- <p class="mt-3">Jl. Anonym Blok K. No.10 (Rumah warna biru)</p>
              <p>KOTA SURABAYA, JAWA TIMUR, 672332</p> --}}
            </div>
          </div>
        </div>
        <div class="col-span-2 p-5 bg-white shadow-lg rounded-xl">
          <header class="mb-5 ">
            <h1 class="text-xl font-semibold">Edit Profile</h1>
          </header>

          @if (!$isComplete)
            <div class="flex items-center justify-center py-3 mb-3 text-white bg-yellow-500 rounded-md">
              <iconify-icon icon="ph:warning-bold" class="text-2xl me-3"></iconify-icon>
              <h1>Your profile is not complete</h1>
            </div>
          @endif
          <div>
            <form wire:submit.prevent="updateProfile" method="POST" class="block gap-5 lg:flex">
              @csrf
              <div class="">
                <div class="grid grid-cols-2 gap-3">
                  <div class="mb-3">
                    <label for="name" class="text-sm text-slate-500">Fullname</label>
                    <input type="text" wire:model='name' name="name" id="name"
                      class="w-full px-3 py-1 border rounded-md" value="{{ Auth::user()->name }}">
                    @error('name')
                      <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                        {{ $message }}</small>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="email" class="text-sm text-slate-500">Email Address</label>
                    <input type="email" wire:model='email' name="email" readonly id="email"
                      class="w-full px-3 py-1 border rounded-md" value="{{ Auth::user()->email }}">
                    @error('email')
                      <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                        {{ $message }}</small>
                    @enderror
                  </div>
                </div>


                <div class="grid grid-cols-2 gap-3">
                  <div class="mb-3">
                    <label for="phone_number" class="text-sm text-slate-500">Phone Number (WA)</label>
                    <input type="number" wire:model='phone_number' name="phone_number" id="phone_number"
                      class="w-full px-3 py-1 border rounded-md" value="{{ Auth::user()->phone_number }}">
                    @error('phone_number')
                      <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                        {{ $message }}</small>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="province" class="text-sm text-slate-500">Province</label>
                    <select name="province" id="province"
                      class="w-full px-3 py-1 border rounded-md js-example-basic-single">
                      <option value="AL">Alabama</option>
                      <option value="WY">Wyoming</option>
                    </select>
                  </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                  <div class="mb-3">
                    <label for="regency" class="text-sm text-slate-500">Regence</label>
                    <input type="text" name="regency" id="regency" class="w-full px-3 py-1 border rounded-md">
                  </div>
                  <div class="mb-3">
                    <label for="distric" class="text-sm text-slate-500">Distric</label>
                    <input type="text" name="distric" id="distric" class="w-full px-3 py-1 border rounded-md">
                  </div>
                </div>


                <div class="mb-3">
                  <label for="zipCode" class="text-sm text-slate-500">ZIP Code</label>
                  <input type="text" name="zipCode" id="zipCode" class="w-full px-3 py-1 border rounded-md">
                </div>
                <div class="mb-3">
                  <label for="address" class="text-sm text-slate-500">Complete Address</label>
                  <textarea name="address" wire:model='address' id="address" cols="30" rows="5"
                    class="w-full px-3 border rounded-md"></textarea>
                  @error('address')
                    <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                      {{ $message }}</small>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="walletAddress" class="text-sm text-slate-500">EVM Wallet Address
                    <i>(optional)</i></label>
                  <input type="text" name="walletAddress" id="walletAddress"
                    class="w-full px-3 py-1 border rounded-md">
                </div>
                <label for="zipCode" class="text-sm text-slate-500">Photo Profile</label>
                <div class="grid grid-cols-5 gap-3">
                  <div class="col-span-4 mb-3">
                    {{-- <input type="text" name="" id=""> --}}
                    <input type="file" name="" id="photo-profile"
                      class="w-full px-3 py-1 border rounded-md">
                  </div>
                  <label for="photo-profile"
                    class="flex items-center justify-center w-full h-10 text-white rounded-md cursor-pointer bg-primaryBg">
                    Browse
                  </label>
                </div>


                <div class="mt-3">
                  <button type="submit"
                    class="px-8 py-2 text-sm font-normal text-white rounded-md bg-primaryBg ">Save
                  </button>
                  <a href="/profile/change-password" wire:navigate
                    class="px-8 py-2 text-sm font-normal border rounded-md text-primary border-primary">Change
                    Password</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>



@push('js')
  <script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });
  </script>
@endpush
