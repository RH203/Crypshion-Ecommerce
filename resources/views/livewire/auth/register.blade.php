<form wire:submit.prevent='register' method="POST" class="mt-3">
  @csrf
  @error('confirmPasswordInvalid')
    <div class="px-4 py-4 mb-5 text-white bg-red-500 rounded-md alert-notificaation">
      <div class="flex items-center justify-center">
        <iconify-icon icon="quill:warning-alt"></iconify-icon> &nbsp; &nbsp;
        <h4>{{ $message }}</h4>
      </div>
    </div>
  @enderror
  <div class="mb-7">
    <input type="text" name="name" wire:model='name'
      class="w-full px-5 py-3 bg-white border shadow-lg border-primary rounded-xl placeholder:font-light placeholder:text-slate-400 focus:outline-0"
      placeholder="Fullname">
    @error('name')
      <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
        {{ $message }}</small>
    @enderror
  </div>
  <div class="mb-7">
    <input type="email" name="email" wire:model='email'
      class="w-full px-5 py-3 bg-white border shadow-lg border-primary rounded-xl placeholder:font-light placeholder:text-slate-400 focus:outline-0"
      placeholder="Email Address">
    @error('email')
      <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
        {{ $message }}</small>
    @enderror
  </div>
  <div class="mb-7">
    <input type="password" name="password" wire:model='password'
      class="w-full px-5 py-3 bg-white border shadow-lg border-primary rounded-xl placeholder:font-light placeholder:text-slate-400 focus:outline-0"
      placeholder="Password">
    @error('password')
      <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
        {{ $message }}</small>
    @enderror
  </div>
  <div class="mb-5">
    <input type="password" name="confirmPassword" wire:model='confirmPassword'
      class="w-full px-5 py-3 bg-white border shadow-lg border-primary rounded-xl placeholder:font-light placeholder:text-slate-400 focus:outline-0"
      placeholder="Confirm Password">
    @error('confirmPassword')
      <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
        {{ $message }}</small>
    @enderror
  </div>
  <div class="mb-5">
    <button type="submit" class="h-14 shadow-lg w-full rounded-lg font-bold text-white text-xl bg-[#23A6F0]">Sign
      Up</button>
  </div>
  <div class="text-center">
    <span>Already have an account? <a href="/login" wire:navigate class="text-[#23A6F0] font-bold">Sign
        In</a></span>
  </div>
</form>
