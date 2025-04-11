

<header class="flex items-center justify-between py-4 px-5 shadow-sm w-full">
  <section class="flex items-center">
    <h2 class="font-semibold text-2xl text-[#222]">
      {{ $title }}
    </h2>

  </section>
  <div class="flex items-center space-x-4">
    <div class="relative w-7 h-7">
      <img src="{{ asset("assets/icons/notification.svg") }}" alt="bell" class="w-full h-full">
      <div class="absolute top-0 right-0 w-3 h-3 rounded-full bg-red-500"></div>
    </div>
    <img src="{{ asset("assets/icons/mail.svg") }}" alt="bell" class="w-7 h-7">

    <div class="w-10 h-10 rounded-full">
      <img src="https://images.vexels.com/content/145908/preview/male-avatar-maker-2a7919.png" alt="avatar-sample" class="w-full h-full rounded-full object-cover">
    </div>
  </div>
</header>