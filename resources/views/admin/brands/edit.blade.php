<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="p-10">

    <div class="mb-10">
      <a href="{{ route("brands.index") }}" class="border-none outline-none bg-gray-400 p-3 rounded-md cursor-pointer text-white">Get back</a>
    </div>

    <form action="{{ route("brands.update", $data["id"]) }}" method="POST" class="border border-gray-200 rounded-md p-8">
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
          placeholder="Input brand name here..." 
          class="w-full border border-[#ccc] rounded-md p-3">
        @error('name')
          <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit" class="bg-blue-500 py-3 px-4 rounded-md text-white w-max cursor-pointer hover:bg-blue-600 duration-200">Submit updated brand</button>
    </form>
  </section>
</x-admin-layout>




