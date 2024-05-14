<section class="h-screen overflow-y-hidden ">
  <div class="grid lg:grid-cols-2 mg:grid-cols-1">
    <div class="hidden lg:block">
      <img src="/img/auth-img-1.png" alt="" class="w-full">
    </div>
    <div class="pt-32">
      <div class="w-10/12 mx-auto lg:w-6/12 md:w-8/12">
        <img src="/img/logo/logo.png" alt="Logo" class="w-4/12 mx-auto">
        <form action="" class="mt-5">
          <div class="mb-10">
            <input type="text" name="name" id=""
              class="w-full px-5 py-3 border-[#23A6F0] border-b-2 bg-transparent rounded-xl placeholder:font-light placeholder:text-slate-400 focus:outline-0"
              placeholder="Username / Email Address">
          </div>
          <div class="mb-5">
            <input type="password" name="password" id=""
              class="w-full px-5 py-3 border-[#23A6F0] border-b-2 bg-transparent rounded-xl placeholder:font-light placeholder:text-slate-400 focus:outline-0"
              placeholder="Password">
          </div>
          <div class="mb-5 text-end">
            <a href="" class="hover:text-[#23A6F0] hover:font-semibold text-black">Forgot Password?</a>
          </div>
          <div class="mb-5">
            <button class="h-14 w-full rounded-lg font-bold text-white text-xl bg-[#23A6F0]">Sign In</button>
          </div>
        </form>
        <div class="text-center">
          <span>Don't have an account? <a href="/register" wire:navigate class="text-[#23A6F0] font-bold">Sign
              Up</a></span>
        </div>
      </div>
    </div>
  </div>

</section>
