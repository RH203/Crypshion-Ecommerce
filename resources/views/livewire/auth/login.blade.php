 <form wire:submit.prevent='login' method="POST" class="mt-5">
   @error('loginInvalid')
     <div class="px-4 py-4 mb-5 text-white bg-red-500 rounded-md alert-notificaation">
       <div class="flex items-center justify-center">
         <iconify-icon icon="quill:warning-alt"></iconify-icon> &nbsp; &nbsp;
         <h4>{{ $message }}</h4>
       </div>
     </div>
   @enderror
   <div class="mb-10">
     <input type="email" name="name" wire:model='email'
       class="w-full px-5 py-3 border-[#23A6F0] border-b-2 bg-transparent rounded-xl placeholder:font-light placeholder:text-slate-400 focus:outline-0"
       placeholder="Email Address">
     @error('email')
       <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
         {{ $message }}</small>
     @enderror
   </div>
   <div class="mb-5">
     <input type="password" name="password" wire:model='password'
       class="w-full px-5 py-3 border-[#23A6F0] border-b-2 bg-transparent rounded-xl placeholder:font-light placeholder:text-slate-400 focus:outline-0"
       placeholder="Password">
     @error('password')
       <small class="italic text-red-600"><iconify-icon icon="quill:warning-alt"></iconify-icon>
         {{ $message }}</small>
     @enderror
   </div>
   <div class="mb-5 text-end">
     <a href="" class="hover:text-[#23A6F0] hover:font-semibold text-black">Forgot Password?</a>
   </div>
   <div class="mb-5">
     <button type="button" onclick="sayHello()"
       class="h-14 w-full rounded-lg font-bold text-white text-xl bg-[#23A6F0]">Sign In</button>
   </div>
   <div class="text-center">
     <span>Don't have an account? <a href="/register" wire:navigate class="text-[#23A6F0] font-bold">Sign
         Up</a></span>
   </div>
 </form>
