<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="p-10">

    <div class="mb-10">
      <a href="{{ route("products.index") }}" class="border-none outline-none bg-gray-400 p-3 rounded-md cursor-pointer text-white">Get back</a>
    </div>

    <form action="{{ route("products.update", $data["id"]) }}" method="POST" class="border border-gray-200 rounded-md p-8">
      @csrf
      @method("PUT")
      <h1 class="text-2xl font-bold mb-5 text-[#222]">Edit category</h1>
      <div class="flex flex-col space-y-2 mb-5">
        <label for="name">Name</label>
        <input 
          type="text" 
          id="name"
          name="name"
          value="{{ $data["name"] }}"
          placeholder="Input category name here..." 
          class="w-full border border-[#ccc] rounded-md p-3">
        @error('name')
          <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex flex-col space-y-2 mb-5">
        <label for="price">Price</label>
        <input 
          type="number" 
          id="price"
          name="price"
          value="{{ $data["price"] }}"
          placeholder="Input product price here..." 
          class="w-full border border-[#ccc] rounded-md p-3">
        @error('price')
          <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex flex-col space-y-2 mb-5">
        <label for="stocks">Stocks</label>
        <input 
          type="number" 
          id="stocks"
          name="stocks"
          value="{{ $data["stocks"] }}"
          placeholder="Input product stocks here..." 
          class="w-full border border-[#ccc] rounded-md p-3">
        @error('stocks')
          <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex flex-col space-y-2 mb-5">
        <label for="category">Category</label>
        <select 
          id="category"
          name="category"
          value="{{ $data["category_id"] }}"
          class="w-full border border-[#ccc] rounded-md p-3">
          <option value="">Choose category</option>
          @foreach ($categories as $category)
              <option 
                value="{{ $category->id }}"
                {{ $data["category_id"] === $category["id"] ? "selected" : "" }}>
                {{ $category->name }}
              </option>
          @endforeach
        </select>
        @error('category')
          <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex flex-col space-y-2 mb-5">
        <label for="brand">Brands</label>
        <select 
          id="brand"
          name="brand"
          value="{{ $data["brand_id"] }}"
          class="w-full border border-[#ccc] rounded-md p-3">
          <option value="">Choose brand</option>
          @foreach ($brands as $brand)
              <option 
                value="{{ $brand->id }}"
                {{ $data["brand_id"] === $brand["id"] ? "selected" : "" }}>
                {{ $brand->name }}
              </option>
          @endforeach
        </select>
        @error('brand')
          <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex flex-col space-y-2 mb-5">
        <label for="description">Description</label>
        <textarea 
          id="description"
          rows="6"
          name="description"
          value="{{ $data["description"] }}"
          class="w-full border border-[#ccc] rounded-md p-3">{{ $data["description"] }}</textarea>
        @error('description')
          <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit" class="bg-blue-500 py-3 px-4 rounded-md text-white w-max cursor-pointer hover:bg-blue-600 duration-200">Submit updated product</button>
    </form>
  </section>
</x-admin-layout>




