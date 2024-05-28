<section class="my-10">
  <div class="w-11/12 mx-auto md:w-7/12 lg:w-5/12">
    <div class="p-5 bg-white shadow-lg rounded-xl">
      <header class="flex items-center justify-between mb-5">
        <h1 class="text-xl font-semibold">Change Password</h1>
      </header>
      <div class="">
        <form wire:submit.prevent='changePassword' class="block gap-5 ">
          <div class="text-start">
            <div class="mb-3">
              <label for="currentPassword" class="text-sm text-slate-500">Current Password</label>
              <input type="password" wire:model='currentPassword' name="currentPassword" id="currentPassword"
                class="w-full px-3 py-1 border rounded-md">
              @error('currentPassword')
                <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                  {{ $message }}</small>
              @enderror
            </div>
            <div class="mb-3">
              <label for="newPassword" class="text-sm text-slate-500">New Password</label>
              <input type="password" wire:model='newPassword' name="newPassword" id="newPassword"
                class="w-full px-3 py-1 border rounded-md">
              @error('newPassword')
                <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                  {{ $message }}</small>
              @enderror
            </div>
            <div class="mb-3">
              <label for="confirmPassword" class="text-sm text-slate-500">Confirm Password</label>
              <input type="password" name="confirmPassword" wire:model='confirmPassword' id="confirmPassword"
                class="w-full px-3 py-1 border rounded-md">
              @error('confirmPassword')
                <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
                  {{ $message }}</small>
              @enderror
            </div>
            <div class="mb-3">
              <button type="submit"
                class="px-8 py-2 text-sm font-normal text-white rounded-md bg-primaryBg ">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
