

<section class="flex flex-col w-[270px] bg-[#222] shadow-sm h-screen sticky top-0">
  <h1 class="text-3xl text-white text-center py-3 font-bold">EHS Admin</h1>

  <section class="flex-1 flex flex-col">
    <section class="mt-7 flex flex-col space-y-2">
      <a href="/admin/dashboard" class="flex items-center space-x-2 pl-7 py-2 hover:bg-blue-800 cursor-pointer">
        <img src="{{ asset("assets/icons/Home.svg") }}" alt="home" class="w-10 h-10">
        <p class="text-white font-medium text-lg">Dashboard</p>
      </a>
      <a href="/admin/products" class="flex items-center space-x-2 pl-7 py-2 hover:bg-blue-800 cursor-pointer {{ request()->is("admin/products*") ? "bg-blue-800" : "" }}">
        <img src="{{ asset("assets/icons/Store.svg") }}" alt="home" class="w-10 h-10">
        <p class="text-white font-medium text-lg">Products</p>
      </a>
      <a href="/admin/categories" class="flex items-center space-x-2 pl-7 py-2 hover:bg-blue-800 cursor-pointer {{ request()->is("admin/categories*") ? "bg-blue-800" : "" }}">
        <img src="{{ asset("assets/icons/Product.svg") }}" alt="home" class="w-10 h-10">
        <p class="text-white font-medium text-lg">Categories</p>
      </a>
      <a href="/admin/brands" class="flex items-center space-x-2 pl-7 py-2 hover:bg-blue-800 cursor-pointer {{ request()->is("admin/brands*") ? "bg-blue-800" : "" }}">
        <img src="{{ asset("assets/icons/Price Tag.svg") }}" alt="home" class="w-10 h-10">
        <p class="text-white font-medium text-lg">Brands</p>
      </a>
      <a href="/admin/orders" class="flex items-center space-x-2 pl-7 py-2 hover:bg-blue-800 cursor-pointer">
        <img src="{{ asset("assets/icons/shopping Chart.svg") }}" alt="home" class="w-10 h-10">
        <p class="text-white font-medium text-lg">Orders</p>
      </a>
      <a href="/admin/customer-supports" class="flex items-center space-x-2 pl-7 py-2 hover:bg-blue-800 cursor-pointer">
        <img src="{{ asset("assets/icons/Costumer Support.svg") }}" alt="home" class="w-10 h-10">
        <p class="text-white font-medium text-lg">Customer Supports</p>
      </a>
      <a href="/admin/settings" class="flex items-center space-x-2 pl-7 py-2 hover:bg-blue-800 cursor-pointer">
        <img src="{{ asset("assets/icons/Setting.svg") }}" alt="home" class="w-10 h-10">
        <p class="text-white font-medium text-lg">Settings</p>
      </a>
    </section>
    <div class="flex items-center pl-10 space-x-2 py-2 bg-red-500 mt-auto cursor-pointer">
      <img src="{{ asset("assets/icons/back.png") }}" alt="logout" class="w-8 h-8">
      <p class="text-white font-medium text-lg">Logout</p>
    </div>
  </section>
</section>