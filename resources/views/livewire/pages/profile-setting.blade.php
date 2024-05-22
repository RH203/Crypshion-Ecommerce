<div>
  <section class="my-10">
    <div class="w-11/12 mx-auto md:w-7/12 lg:w-5/12">
      <div class="p-5 bg-white shadow-lg rounded-xl">
        <header class="flex items-center justify-between mb-5">
          <h1 class="text-xl font-semibold">Profile Settings</h1>
        </header>
        <div class="">
          <form wire:submit.prevent="updateProfile" method="POST" class="block gap-5 lg:flex">
            @csrf
            <div class="text-start basis-8/12">
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
                <input type="text" name="province" id="province" class="w-full px-3 py-1 border rounded-md">
              </div>
              <div class="mb-3">
                <label for="regency" class="text-sm text-slate-500">Regence</label>
                <input type="text" name="regency" id="regency" class="w-full px-3 py-1 border rounded-md">
              </div>
              <div class="mb-3">
                <label for="distric" class="text-sm text-slate-500">Distric</label>
                <input type="text" name="distric" id="distric" class="w-full px-3 py-1 border rounded-md">
              </div>
              <div class="mb-3">
                <label for="zipCode" class="text-sm text-slate-500">ZIP Code</label>
                <input type="text" name="zipCode" id="zipCode" class="w-full px-3 py-1 border rounded-md">
              </div>
              <div class="mb-3">
                <label for="name" class="text-sm text-slate-500">Complete Address</label>
                <input type="text" wire:model='address' name="address" id="name"
                  class="w-full px-3 py-1 border rounded-md" value="{{ Auth::user()->address }}">
                @error('address')
                  <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                    {{ $message }}</small>
                @enderror
              </div>
              <div class="mb-3">
                <label for="walletAddress" class="text-sm text-slate-500">EVM Wallet Address <i>(optional)</i></label>
                <input type="text" name="walletAddress" id="walletAddress"
                  class="w-full px-3 py-1 border rounded-md">
              </div>
              <div class="mb-3">
                <button type="submit" class="px-8 py-2 text-sm font-normal text-white rounded-md bg-primaryBg ">Save
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
  </section>
</div>
